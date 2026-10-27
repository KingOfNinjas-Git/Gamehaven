<?php

use App\Models\Game;
use App\Models\User;
use App\Support\DemoMode;
use Database\Seeders\GamesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

// The demo clean-up deletes files from the "public" disk, so every test here works on a fake one:
// it must never touch the real covers and profile pictures in storage/app/public.
beforeEach(fn () => Storage::fake('public'));

test('nothing changes when demo mode is off', function () {
    $this->get('/home')->assertOk()->assertDontSee('Demonstração de portefólio');
    expect(DemoMode::isDemoAdmin(User::factory()->create()))->toBeFalse();
});

test('the demo notice shows when demo mode is on', function () {
    config(['demo.enabled' => true]);

    $this->get('/home')->assertOk()->assertSee('Demonstração de portefólio')->assertSee('Não uses dados reais');
});

test('the demo admin is an admin and a normal account is not', function () {
    config(['demo.enabled' => true]);

    $admin = DemoMode::adminUser();

    expect($admin->is_admin)->toBeTruthy()
        ->and(DemoMode::isDemoAdmin($admin))->toBeTrue()
        ->and(DemoMode::adminUser()->id)->toBe($admin->id);
    expect(User::factory()->create()->is_admin)->toBeFalsy();
});

test('clean-up restores the shop and removes old visitor accounts', function () {
    config(['demo.enabled' => true]);
    (new GamesSeeder)->run();

    Game::first()->update(['title' => 'Changed by a visitor']);
    Game::create(['title' => 'Added by a visitor', 'cover_image' => 'game_covers/none.png', 'price' => 1]);
    $old = User::factory()->create(['created_at' => now()->subHours(5)]);
    $fresh = User::factory()->create();

    Cache::forget('demo-cleanup');
    DemoMode::cleanUp();

    expect(Game::count())->toBe(count(GamesSeeder::GAMES))
        ->and(Game::first()->title)->toBe(GamesSeeder::GAMES[0]['title'])
        ->and(User::find($old->id))->toBeNull()
        ->and(User::find($fresh->id))->not->toBeNull();
});

test('the one-click admin link works only in demo mode', function () {
    $this->get('/demo/admin')->assertNotFound();

    config(['demo.enabled' => true]);
    $this->get('/demo/admin')->assertRedirect(route('ofertas'));
    $this->assertAuthenticated();
    expect(auth()->user()->is_admin)->toBeTruthy();
});

it('asks search engines not to index the demo, but not a real shop', function () {
    config(['demo.enabled' => false]);
    $this->get('/')->assertHeaderMissing('X-Robots-Tag');

    config(['demo.enabled' => true]);
    $this->get('/')->assertOk()->assertHeader('X-Robots-Tag', 'noindex');
});

it('has a page title and a main heading that say what the site is', function () {
    $this->get('/')
        ->assertSee('<title>GameHaven | Jogos, consolas e merchandising</title>', false)
        ->assertSee('<h1 class="sr-only">', false);
});
