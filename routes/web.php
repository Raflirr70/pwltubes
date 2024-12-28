<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/belanja', function () {
    return view('belanja');
})->name('belanja');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/user', function () {
//     return view('user.index');
// });

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
