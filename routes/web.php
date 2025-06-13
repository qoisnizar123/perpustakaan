<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarbukuController;
use App\Http\Controllers\PeminjamanbukuController;
use App\Http\Controllers\RiwayatpeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register', [LoginController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'profile'])->middleware('user');
    Route::get('/daftar_buku', [DaftarbukuController::class, 'daftarBuku'])->middleware('user');
    
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/buku', [BukuController::class, 'index']);
        Route::get('/tambah_buku', [BukuController::class, 'add']);
        Route::post('/tambah_buku', [BukuController::class, 'store']);
        Route::get('/edit_buku/{id}', [BukuController::class, 'edit']);
        Route::post('/edit_buku/{id}', [BukuController::class, 'update']);
        Route::get('/delete_buku/{id}', [BukuController::class, 'delete']);
        Route::get('/buku_destroy/{id}', [BukuController::class, 'destroy']);
        
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::get('/tambah_kategori', [KategoriController::class, 'add']);
        Route::post('/tambah_kategori', [KategoriController::class, 'store']);
        Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit']);
        Route::put('/edit_kategori/{id}', [KategoriController::class, 'update']);
        Route::get('/delete_kategori/{id}', [KategoriController::class, 'delete']);
        Route::get('/kategori_destroy/{id}', [KategoriController::class, 'destroy']);
        
        Route::get('/pengguna', [UserController::class, 'index']);
        Route::get('/pengguna_terdaftar', [UserController::class, 'penggunaTerdaftar']);
        Route::get('/detail_pengguna/{pengguna}', [UserController::class, 'show'])->name('detail_pengguna');
        Route::get('/pengguna_disetujui/{id}', [UserController::class, 'approve']);
        
        Route::get('peminjaman_buku', [PeminjamanbukuController::class, 'index']);
        Route::post('peminjaman_buku', [PeminjamanbukuController::class, 'store']);
        
        Route::get('/riwayat_peminjaman', [RiwayatpeminjamanController::class, 'index']);

        Route::get('/pengembalian_buku', [PeminjamanbukuController::class, 'pengembalianBuku']);
        Route::post('/pengembalian_buku', [PeminjamanbukuController::class, 'prosesPengembalian']);
    });
    
});