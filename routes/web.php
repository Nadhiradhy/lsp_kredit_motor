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
Route::get('/', [HomeController::class, 'index'])->name('fe.home.index');
// Route::get('/home', [HomeController::class, 'home'])->name('fe.home.index');
// Route::resource('/home', [HomeController::class, 'home'])->name('fe.home.index');

// Route ke halaman login dan register (tampilan untuk Pelanggan)
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route ke halaman register (tampilan untuk Pelanggan)
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register.create_account'])->name('register.create_account');



// Route ke halaman dashboard (tampilan untuk Admin) BE
Route::get('/admin', [AdminController::class, 'index'])->name('be.admin.index');
Route::get('/admin/users', [UserbeController::class, 'index'])->name('be.admin.users');

Route::get('/admin/jenismotor', [JenisMotorController::class, 'index'])->name('be.admin.jenismotor');
Route::get('/admin/motor', [MotorController::class, 'index'])->name('be.admin.motor');

Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('be.admin.pelanggan');

Route::get('/admin/metodebayar', [MetodeBayarController::class, 'index'])->name('be.admin.metodebayar');

Route::get('/admin/pengajuankredit', [PengajuanKreditController::class, 'index'])->name('be.admin.pengajuankredit');
Route::get('/admin/pengajuankredit/create', [PengajuanKreditController::class, 'create'])->name('be.admin.pengajuankredit.create');
Route::post('/admin/pengajuankredit', [PengajuanKreditController::class, 'store'])->name('be.admin.pengajuankredit.store');
Route::get('/admin/pengajuankredit/{id}/edit', [PengajuanKreditController::class, 'edit'])->name('be.admin.pengajuankredit.edit');
Route::put('/admin/pengajuankredit/{id}', [PengajuanKreditController::class, 'update'])->name('be.admin.pengajuankredit.update');
Route::delete('/admin/pengajuankredit/{id}', [PengajuanKreditController::class, 'destroy'])->name('be.admin.pengajuankredit.destroy');