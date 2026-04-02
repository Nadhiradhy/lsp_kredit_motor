<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserbeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController as LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisMotorController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MetodeBayarController;
use App\Http\Controllers\PengajuanKreditController;




// Route::get('/', function () {
//     return view('welcome');
// });


// Route ke halaman home (tampilan untuk Pelanggan) FE
Route::middleware(['auth', 'role:customer'])->group(function () {
	Route::get('/', [HomeController::class, 'index'])->name('fe.home.index');
	// Tambahkan route customer lain di sini jika ada
});

// Route ke halaman login dan register (tampilan untuk Pelanggan)
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route ke halaman register (tampilan untuk Pelanggan)
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register.create_account'])->name('register.create_account');




// Route ke halaman dashboard (tampilan untuk Admin) BE
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
	Route::get('/', [AdminController::class, 'index'])->name('be.admin.index');
	Route::get('/users', [UserbeController::class, 'index'])->name('be.admin.users');
	Route::get('/jenismotor', [JenisMotorController::class, 'index'])->name('be.admin.jenismotor');
	Route::get('/motor', [MotorController::class, 'index'])->name('be.admin.motor');
	Route::get('/pelanggan', [PelangganController::class, 'index'])->name('be.admin.pelanggan');
	Route::get('/metodebayar', [MetodeBayarController::class, 'index'])->name('be.admin.metodebayar');
	Route::get('/pengajuankredit', [PengajuanKreditController::class, 'index'])->name('be.admin.pengajuankredit');
	Route::get('/pengajuankredit/create', [PengajuanKreditController::class, 'create'])->name('be.admin.pengajuankredit.create');
	Route::post('/pengajuankredit', [PengajuanKreditController::class, 'store'])->name('be.admin.pengajuankredit.store');
	Route::get('/pengajuankredit/{id}/edit', [PengajuanKreditController::class, 'edit'])->name('be.admin.pengajuankredit.edit');
	Route::put('/pengajuankredit/{id}', [PengajuanKreditController::class, 'update'])->name('be.admin.pengajuankredit.update');
	Route::delete('/pengajuankredit/{id}', [PengajuanKreditController::class, 'destroy'])->name('be.admin.pengajuankredit.destroy');

	// Resource CRUD routes
	Route::resource('angsuran', App\Http\Controllers\AngsuranController::class);
	Route::resource('asuransi', App\Http\Controllers\AsuransiController::class);
	Route::resource('pengiriman', App\Http\Controllers\PengirimanController::class);
	Route::resource('jeniscicilan', App\Http\Controllers\JenisCicilanController::class);
	Route::resource('user', App\Http\Controllers\UserController::class);
});