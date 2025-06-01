<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\peminjamanController;

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
})->middleware('login');

Route::get('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/buku', [BukuController::class, 'buku']);
Route::get('/tambah_buku', [BukuController::class, 'tambahbuku']);

Route::get('/kategori', [KategoriController::class, 'kategori']);
Route::get('/tambah_kategori', [KategoriController::class, 'tambahkategori']);

Route::get('/user', [UserController::class, 'user']);

Route::get('/peminjaman', [RiwayatpeminjamanController::class, 'peminjaman']);