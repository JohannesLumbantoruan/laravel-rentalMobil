<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('loginAksi');
Route::middleware('auth:admin')->group(function()
{
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/ganti_password', [LoginController::class, 'gantiPassword'])->name('gantiPassword');
    Route::put('/ganti_password_aksi', [LoginController::class, 'gantiPasswordAksi'])->name('gantiPasswordAksi');
    Route::get('/mobil', [RentalController::class, 'mobil'])->name('mobil');
    Route::get('/mobil/cari', [RentalController::class, 'cariMobil'])->name('cariMobil');
    Route::get('/mobil/tambah', [RentalController::class, 'tambahMobil'])->name('tambahMobil');
    Route::post('/mobil/tambah_aksi', [RentalController::class, 'tambahMobilAksi'])->name('tambahMobilAksi');
    Route::get('/mobil/edit/{id}', [RentalController::class, 'editMobil'])->name('editMobil');
    Route::put('/mobil/edit_aksi/{id}', [RentalController::class, 'editMobilAksi'])->name('editMobilAksi');
    Route::get('/mobil/hapus/{id}', [RentalController::class, 'hapusMobil'])->name('hapusMobil');
    Route::get('/kostumer', [RentalController::class, 'kostumer'])->name('kostumer');
    Route::get('/kostumer/cari', [RentalController::class, 'cariKostumer'])->name('cariKostumer');
    Route::get('/kostumer/tambah', [RentalController::class, 'tambahKostumer'])->name('tambahKostumer');
    Route::post('/kostumer/tambah_aksi', [RentalController::class, 'tambahKostumerAksi'])->name('tambahKostumerAksi');
    Route::get('/kostumer/edit/{id}', [RentalController::class, 'editKostumer'])->name('editKostumer');
    Route::put('/kostumer/edit_aksi/{id}', [RentalController::class, 'editKostumerAksi'])->name('editKostumerAksi');
    Route::get('/kostumer/hapus/{id}', [RentalController::class, 'hapusKostumer'])->name('hapusKostumer');
    Route::get('/transaksi', [RentalController::class, 'transaksi'])->name('transaksi');
    Route::get('/transaksi/tambah', [RentalController::class, 'tambahTransaksi'])->name('tambahTransaksi');
    Route::post('/transaksi/tambah_aksi', [RentalController::class, 'tambahTransaksiAksi'])->name('tambahTransaksiAksi');
    Route::get('/transaksi/batalkan_transaksi/{id}', [RentalController::class, 'batalkanTransaksi'])->name('batalkanTransaksi');
    Route::get('/transaksi/selesaikan_transaksi/{id}', [RentalController::class, 'selesaikanTransaksi'])->name('selesaikanTransaksi');
    Route::post('/transaksi/selesaikan_transaksi_aksi/{id}', [RentalController::class, 'selesaikanTransaksiAksi'])->name('selesaikanTransaksiAksi');
    Route::get('/transaksi/laporan', [RentalController::class, 'laporan'])->name('laporan');
    Route::get('/transaksi/laporan_filter', [RentalController::class, 'laporanAksi'])->name('laporanAksi');
    Route::get('/transaksi/laporan_print', [RentalController::class, 'printLaporan'])->name('printLaporan');
    Route::get('/transaksi/laporan_pdf', [RentalController::class, 'pdfLaporan'])->name('pdfLaporan');
    Route::get('/transaksi/cari', [RentalController::class, 'cariTransaksi'])->name('cariTransaksi');
});