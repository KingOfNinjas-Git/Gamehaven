<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function game(array $attributes = []): Game
{
    return Game::create($attributes + ['title' => 'Test Game', 'cover_image' => 'game_covers/test.webp', 'price' => 10, 'category' => 'RPG']);
}

function admin(): User
{
    return User::factory()->create(['is_admin' => true]);
}

test('the public pages open', function (string $path) {
    $this->get($path)->assertOk();
})->with(['/', '/home', '/merchandise', '/ofertas', '/cart', '/login', '/register', '/register/email']);

test('the merchandise page lists the products and the unavailable ones', function () {
    $this->get('/merchandise')
        ->assertOk()
        ->assertSee('T-shirt (frente e verso)')
        ->assertSee('20,00€')
        ->assertSee('Indisponível');
});

test('the offers page can be filtered by category', function () {
    game(['title' => 'A role-playing game', 'category' => 'RPG']);
    game(['title' => 'A racing game', 'category' => 'Racing']);

    $this->get('/ofertas')->assertSee('A role-playing game')->assertSee('A racing game');
    $this->get('/ofertas?category=RPG')->assertSee('A role-playing game')->assertDontSee('A racing game');
    $this->get('/ofertas?category=Featured')->assertSee('A role-playing game')->assertSee('A racing game');
});

test('the discount is shown without losing its zeros', function () {
    expect(game(['discount' => 40])->discountLabel())->toBe('40')
        ->and(game(['discount' => 12.5])->discountLabel())->toBe('12.5')
        ->and(game(['discount' => 7])->discountLabel())->toBe('7');
});

test('a game goes into the cart once and the cart page shows the total', function () {
    $a = game(['title' => 'First', 'price' => 10]);
    $b = game(['title' => 'Second', 'price' => 5.5]);

    $this->post("/cart/add/{$a->id}")->assertRedirect();
    $this->post("/cart/add/{$a->id}");
    $this->post("/cart/add/{$b->id}");

    $this->get('/cart')->assertSee('First')->assertSee('Second')->assertSee('15.50€');
});

test('only administrators can add, edit and delete games', function () {
    $game = game();
    $user = User::factory()->create();

    $this->get('/admin/games/create')->assertRedirect('/login');
    $this->actingAs($user)->get('/admin/games/create')->assertForbidden();
    $this->actingAs($user)->delete("/admin/games/{$game->id}")->assertForbidden();
    expect(Game::count())->toBe(1);
});

test('an administrator can add a game with a cover', function () {
    Storage::fake('public');

    $this->actingAs(admin())
        ->post('/admin/games', ['title' => 'New Game', 'price' => 19.99, 'category' => 'RPG', 'cover_image' => UploadedFile::fake()->image('cover.jpg')])
        ->assertRedirect(route('ofertas'));

    $game = Game::firstWhere('title', 'New Game');
    expect($game)->not->toBeNull();
    Storage::disk('public')->assertExists($game->cover_image);
});

test('a new game needs a cover but an edited one does not', function () {
    Storage::fake('public');
    $game = game();

    $this->actingAs(admin())->post('/admin/games', ['title' => 'No cover', 'price' => 5])->assertSessionHasErrors('cover_image');

    $this->actingAs(admin())->put("/admin/games/{$game->id}", ['title' => 'Renamed', 'price' => 12])->assertRedirect(route('ofertas'));
    expect($game->fresh()->title)->toBe('Renamed')->and($game->fresh()->cover_image)->toBe('game_covers/test.webp');
});

test('replacing a cover deletes the old file, and deleting a game deletes its cover', function () {
    Storage::fake('public');
    $old = UploadedFile::fake()->image('old.jpg')->store('game_covers', 'public');
    $game = game(['cover_image' => $old]);

    $this->actingAs(admin())->put("/admin/games/{$game->id}", ['title' => 'Same', 'price' => 1, 'cover_image' => UploadedFile::fake()->image('new.jpg')]);
    Storage::disk('public')->assertMissing($old);
    Storage::disk('public')->assertExists($game->fresh()->cover_image);

    $current = $game->fresh()->cover_image;
    $this->actingAs(admin())->delete("/admin/games/{$game->id}")->assertRedirect(route('ofertas'));
    Storage::disk('public')->assertMissing($current);
    expect(Game::count())->toBe(0);
});

test('signing up with an e-mail logs the user in', function () {
    $this->post('/register/email', [
        'email' => 'new@example.com', 'password' => 'secret123', 'password_confirmation' => 'secret123',
        'nif' => '123456789', 'first_name' => 'Ana', 'surname' => 'Silva', 'phone' => '912345678', 'birthdate' => '31/12/1999',
    ])->assertRedirect('/home');

    $this->assertAuthenticated();
    expect(User::firstWhere('email', 'new@example.com')->name)->toBe('Ana Silva');
});

test('a sign-up with mistakes shows what is wrong and keeps what was typed', function () {
    $this->from('/register/email')
        ->post('/register/email', ['email' => 'not-an-email', 'password' => 'x', 'first_name' => 'Ana'])
        ->assertRedirect('/register/email');

    $this->get('/register/email')->assertSee('role="alert"', false)->assertSee('value="Ana"', false);
});

test('a wrong password explains itself and keeps the e-mail but not the password', function () {
    $user = User::factory()->create();

    $this->from('/login')->post('/login', ['email' => $user->email, 'password' => 'wrong'])->assertRedirect('/login');
    $this->assertGuest();

    $this->get('/login')
        ->assertSee('Estes dados não correspondem')
        ->assertSee('value="'.$user->email.'"', false);
});
