<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'dashboard']);

Route::get('/buku', [BukuController::class, 'buku']);
Route::get('/tambah_buku', [BukuController::class, 'tambahbuku']);

Route::get('/kategori', [KategoriController::class, 'kategori']);
Route::get('/tambah_kategori', [KategoriController::class, 'tambahkategori']);

Route::get('/user', [UserController::class, 'user']);

Route::get('/riwayat_peminjaman', [RiwayatpeminjamanController::class, 'riwayatpeminjaman']);