<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterEmailController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Admin\GameAdminController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('/home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/picture', [ProfilePictureController::class, 'update'])->name('profile.picture.update')->middleware('auth');
});

require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/merchandise', function () {
    return view('merchandise');
})->name('merchandise');

Route::get('/register/email', [RegisterEmailController::class, 'show'])->name('register.email');
Route::post('/register/email', [RegisterEmailController::class, 'register'])->name('register.email.submit');

Route::get('/ofertas', [GameController::class, 'index'])->name('ofertas');

Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('games', GameAdminController::class);
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{game}', [CartController::class, 'add'])->name('cart.add');

// Portfolio demo only: opens the admin area as the demo admin without a password (404 when demo mode is off).
Route::get('/demo/admin', function () {
    abort_unless(config('demo.enabled'), 404);

    \Illuminate\Support\Facades\Auth::login(\App\Support\DemoMode::adminUser());

    return redirect()->route('ofertas');
})->name('demo.admin');
