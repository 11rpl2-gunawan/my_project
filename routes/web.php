
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    // Route untuk menampilkan profile
    Route::get('/show', [ProfileController::class, 'show'])->name('show');

    // Route untuk mengedit profile (form edit)
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');

    // Route untuk update profile (submit form edit)
    Route::PATCH('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
