<?php

use App\Http\Controllers\Admin\GameAdminController;
use App\Http\Controllers\Auth\RegisterEmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Middleware\IsAdmin;
use App\Support\DemoMode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// The shop: pages for everyone
Route::view('/', 'home');
Route::view('/home', 'home')->name('home');
Route::view('/merchandise', 'merchandise')->name('merchandise');
Route::get('/ofertas', [GameController::class, 'index'])->name('ofertas');

// The cart (kept in the session)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{game}', [CartController::class, 'add'])->name('cart.add');

// Accounts: log in, log out, passwords and e-mail verification (Laravel Breeze), plus our own "Criar Conta" with e-mail
require __DIR__.'/auth.php';

Route::get('/register/email', [RegisterEmailController::class, 'show'])->name('register.email');
Route::post('/register/email', [RegisterEmailController::class, 'register'])->name('register.email.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/picture', [ProfilePictureController::class, 'update'])->name('profile.picture.update');
});

// Adding, editing and deleting games (administrators only; the list is the /ofertas page)
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('games', GameAdminController::class)->except(['index', 'show']);
});

// Portfolio demo only: opens the admin area as the demo admin without a password (404 when demo mode is off).
Route::get('/demo/admin', function () {
    abort_unless(config('demo.enabled'), 404);

    Auth::login(DemoMode::adminUser());

    return redirect()->route('ofertas');
})->name('demo.admin');
