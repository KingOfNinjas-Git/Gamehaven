<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('profile page is displayed', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('/profile');

    $response->assertOk();
});

test('profile page needs a signed-in user', function () {
    $this->get('/profile')->assertRedirect('/login');
});

test('a profile picture can be uploaded and replaces the old one', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/profile/picture', ['profile_picture' => UploadedFile::fake()->image('first.jpg')])
        ->assertSessionHasNoErrors();
    $first = $user->fresh()->profile_picture;
    Storage::disk('public')->assertExists($first);

    $this->actingAs($user)
        ->post('/profile/picture', ['profile_picture' => UploadedFile::fake()->image('second.jpg')])
        ->assertSessionHasNoErrors();

    Storage::disk('public')->assertMissing($first);
    Storage::disk('public')->assertExists($user->fresh()->profile_picture);
});

test('a profile picture must be an image', function () {
    Storage::fake('public');
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/profile/picture', ['profile_picture' => UploadedFile::fake()->create('notes.pdf', 10, 'application/pdf')])
        ->assertSessionHasErrors('profile_picture');

    expect($user->fresh()->profile_picture)->toBeNull();
});
