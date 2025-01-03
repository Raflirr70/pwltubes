<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangGudangController;
use App\Http\Controllers\JualBarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiController;
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
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/pesanan', [TransaksiController::class, 'pesanan'])->name('pesanan');
Route::post('/pesanan/terima', [TransaksiController::class, 'terima'])->name('pesananterima');
Route::post('/pesanan/delete', [TransaksiController::class, 'delete'])->name('pesanandelete');

Route::get('/logpesanan', [TransaksiController::class, 'log'])->name('logpesanan');

Route::get('/tambahpegawai', [UserController::class, 'view'])->name('tambahpegawai');
Route::get('/users/pdf', [UserController::class, 'generatePDF'])->name('users.pdf');

Route::get('/indexbarang', [BarangController::class, 'indexbarang'])->name('indexbarang');
Route::get('/addbarang', [BarangController::class, 'create'])->name('barang.create');
Route::post('/addjumlah', [BarangController::class, 'store'])->name('barang.store');
Route::get('/addjumlah', [BarangGudangController::class, 'create'])->name('jumlah.create');
Route::post('/indexbarang', [BarangGudangController::class, 'store'])->name('jumlah.store');
Route::get('/indexbaranggudang', [BarangGudangController::class, 'indexbaranggudang'])->name('indexbaranggudang');

Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/tokos', [TokoController::class, 'index'])->name('toko.index');
Route::get('/barang', [TokoController::class, 'barang'])->name('barang');


Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('jualbarang', [JualBarangController::class, 'create'])
//         ->name('jualbarang');
Route::get('jualbarang', [JualBarangController::class, 'create'])
        ->name('jualbarang');
Route::post('jualbarang', [JualBarangController::class, 'store'])->name('jualbarang.store');




require __DIR__.'/auth.php';
