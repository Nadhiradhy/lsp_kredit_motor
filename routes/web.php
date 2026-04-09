
<?php

use App\Http\Controllers\MotorController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MetodeBayarController;
use App\Http\Controllers\PengajuanKreditController;
use App\Http\Controllers\JenisCicilanController;
// --- IMPORT CONTROLLER (Sesuaikan Path Folder) ---
use App\Http\Controllers\auth\fe\RegisterController;

// --- ROUTE AUTH ADMIN (BE) ---
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Login admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.process');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Dashboard admin (BE)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // ...route admin lain bisa ditambah di sini
});

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserbeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisMotorController;





// --- IMPORT CONTROLLER (Sesuaikan Path Folder) ---
use App\Http\Controllers\auth\fe\LoginController;




// Route::get('/', function () {
//     return view('welcome');
// });

// --- ROUTE AUTHENTICATION ---

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.create_account');

Route::post('/logout', function() {
    session()->forget('pelanggan_id');
    Auth::logout(); // Sebaiknya gunakan Auth::logout() jika pakai sistem auth Laravel
    return redirect()->route('login');
})->name('logout');

// Route landing page FE (bisa diakses semua orang)
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route daftar produk motor FE
use App\Http\Controllers\CatalogController;
Route::get('/katalog', [CatalogController::class, 'index'])->name('catalog');

Route::get('/tentang', function () {
    return view('fe.landing.about');
})->name('about');


use App\Http\Controllers\ProdukController;
Route::get('/motor', [ProdukController::class, 'index'])->name('fe.motor');

// Route khusus customer (FE) - hanya pelanggan/customer yang bisa akses
Route::middleware(['auth', 'role:customer'])->group(function () {
	// Contoh: Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('fe.dashboard');
	// Tambahkan route FE lain yang hanya boleh diakses customer di sini
});

// Route khusus admin (BE) - hanya admin yang bisa akses
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
	Route::get('/', [AdminController::class, 'index'])->name('be.admin.index');
	Route::get('/users', [UserbeController::class, 'index'])->name('be.admin.users');
	// Jenis Motor CRUD
	Route::get('/jenismotor', [JenisMotorController::class, 'index'])->name('be.admin.jenismotor');
	Route::post('/jenismotor', [JenisMotorController::class, 'store'])->name('be.admin.jenismotor.store');
	Route::get('/jenismotor/{id}/edit', [JenisMotorController::class, 'edit'])->name('be.admin.jenismotor.edit');
	Route::put('/jenismotor/{id}', [JenisMotorController::class, 'update'])->name('be.admin.jenismotor.update');
	Route::delete('/jenismotor/{id}', [JenisMotorController::class, 'destroy'])->name('be.admin.jenismotor.destroy');

	// Pelanggan CRUD
	Route::get('/pelanggan', [PelangganController::class, 'index'])->name('be.admin.pelanggan');
	Route::post('/pelanggan', [PelangganController::class, 'store'])->name('be.admin.pelanggan.store');
	Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('be.admin.pelanggan.edit');
	Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('be.admin.pelanggan.update');
	Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('be.admin.pelanggan.destroy');

	// Motor CRUD
	Route::get('/motor', [MotorController::class, 'index'])->name('be.admin.motor'); // List
	Route::get('/motor/create', [MotorController::class, 'create'])->name('be.admin.motor.create'); // Form Tambah
	Route::post('/motor', [MotorController::class, 'store'])->name('be.admin.motor.store'); // Simpan
	Route::get('/motor/{id}', [MotorController::class, 'show'])->name('be.admin.motor.show'); // Detail
	Route::get('/motor/{id}/edit', [MotorController::class, 'edit'])->name('be.admin.motor.edit'); // Form Edit
	Route::put('/motor/{id}', [MotorController::class, 'update'])->name('be.admin.motor.update'); // Update
	Route::delete('/motor/{id}', [MotorController::class, 'destroy'])->name('be.admin.motor.destroy'); // Hapus

	Route::get('/metodebayar', [MetodeBayarController::class, 'index'])->name('be.admin.metodebayar');
	Route::post('/metodebayar', [MetodeBayarController::class, 'store'])->name('be.admin.metodebayar.store');
	Route::get('/metodebayar/{id}/edit', [MetodeBayarController::class, 'edit'])->name('be.admin.metodebayar.edit');
	Route::put('/metodebayar/{id}', [MetodeBayarController::class, 'update'])->name('be.admin.metodebayar.update');
	Route::delete('/metodebayar/{id}', [MetodeBayarController::class, 'destroy'])->name('be.admin.metodebayar.destroy');
	Route::get('/pengajuankredit', [PengajuanKreditController::class, 'index'])->name('be.admin.pengajuankredit');
	Route::get('/pengajuankredit/create', [PengajuanKreditController::class, 'create'])->name('be.admin.pengajuankredit.create');
	Route::post('/pengajuankredit', [PengajuanKreditController::class, 'store'])->name('be.admin.pengajuankredit.store');
	Route::get('/pengajuankredit/{id}/edit', [PengajuanKreditController::class, 'edit'])->name('be.admin.pengajuankredit.edit');
	Route::put('/pengajuankredit/{id}', [PengajuanKreditController::class, 'update'])->name('be.admin.pengajuankredit.update');
	Route::delete('/pengajuankredit/{id}', [PengajuanKreditController::class, 'destroy'])->name('be.admin.pengajuankredit.destroy');

	// Data Kredit
	Route::get('/kredit', [App\Http\Controllers\KreditController::class, 'index'])->name('be.admin.kredit');
	Route::get('/kredit/create', [App\Http\Controllers\KreditController::class, 'create'])->name('be.admin.kredit.create');
	Route::post('/kredit', [App\Http\Controllers\KreditController::class, 'store'])->name('be.admin.kredit.store');
	Route::get('/kredit/{id}', [App\Http\Controllers\KreditController::class, 'show'])->name('be.admin.kredit.show');

	// Resource CRUD routes
	Route::resource('angsuran', App\Http\Controllers\AngsuranController::class);
	Route::resource('asuransi', App\Http\Controllers\AsuransiController::class);
	Route::resource('pengiriman', App\Http\Controllers\PengirimanController::class);
	Route::resource('user', App\Http\Controllers\UserController::class);
	Route::resource('jeniscicilan', App\Http\Controllers\JenisCicilanController::class);
});




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
	Route::resource('user', App\Http\Controllers\UserController::class);
});

// Tampilkan form login
