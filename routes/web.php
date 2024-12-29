<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/belanja', function () {
    $barangs = \App\Models\Barang::all();
    return view('belanja', compact('barangs'));
})->name('belanja');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('user.admin');
});
// Route::get('/user', function () {
//     return view('user.index');
// });

Route::get('/barang', [TokoController::class, 'barang'])->name('barang');


Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/tokos', [TokoController::class, 'index'])->name('toko.index');


Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
