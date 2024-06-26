<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingInfoController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DataPemasokController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DataJenisBarangController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\risetpw;
use App\Models\Pengeluaran;
use App\Models\Service;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\SearchController;

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


Route::get('/landing', [LandingInfoController::class, 'discount'])->name('discount');
Route::get('/product-detail/{id}', [LandingInfoController::class, 'getDetail']);
Route::get('/product-detaildisc/{id}', [LandingInfoController::class, 'getDetailDisc']);
Route::get('/', [LandingInfoController::class, 'index'])->name('home');
Route::get('/home', [LandingInfoController::class, 'discount'])->name('home');
Route::get('/product', [LandingInfoController::class, 'index'])->name('product');
Route::get('/contact', [LandingInfoController::class, 'discount'])->name('contact');
Route::get('/allproduct', [LandingInfoController::class, 'barang'])->name('allproduct');
Route::get('/service', [LandingInfoController::class, 'index'])->name('service');
Route::get('/products/{id_jenis_barang}', [LandingInfoController::class, 'getKategori']);

Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/coba', [LandingInfoController::class, 'coba'])->name('coba');


Route::controller(LandingController::class)->group(function () {
    Route::get('/admin', 'signin')->name('admin');
    Route::post('/signin', 'authenticate');
    Route::get('/forgot_password', 'ForgotPw');
    Route::post('/signout', 'signout')->middleware('auth');
    // Route::get('/dashboard', 'dashboard')->middleware('auth');
});

Route::get('/forgot-password', [LandingController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [LandingController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/verify-otp', [LandingController::class, 'showVerifyOTPForm'])->name('password.verify');
Route::post('/verify-otp', [LandingController::class, 'verifyOTP'])->name('password.verify');
Route::get('/reset-password/{token}', [risetpw::class,'showResetForm'])->name('password.reset');
Route::post('/reset-password', [risetpw::class, 'reset'])->name('password.update');
Route::get('/profile', [ProfilController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfilController::class, 'edit'])->name('profile.edit');
Route::put('/profile/edit', [ProfilController::class, 'update'])->name('profile.update');

Route::get('/dashboard/indexDataBarang', [DashboardController::class, 'indexDataBarang'])->name('dashboard.indexDataBarang')->middleware('auth');
Route::get('/dashboard/indexDataAdmin', [DashboardController::class, 'indexDataAdmin'])->name('dashboard.indexDataAdmin')->middleware('auth');
Route::get('/dashboard/indexDataKaryawan', [DashboardController::class, 'indexDataKaryawan'])->name('dashboard.indexDataKaryawan')->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::resource('data_barang', DataBarangController::class)->middleware('auth');
Route::controller(DataBarangController::class)->group(function () {
    Route::get('/data_barang_truncate', 'truncate')->middleware('auth');
});

Route::resource('data_pengguna', DataPenggunaController::class)->middleware('auth');
Route::controller(DataPenggunaController::class)->group(function () {
    Route::get('/data_pengguna_truncate', 'truncate')->middleware('auth');
    Route::get('/data_pengguna/{id}/toggleRole', 'toggleRole')->name('data_pengguna.toggleRole');
});

Route::resource('data_pemasok', DataPemasokController::class)->middleware('auth');
Route::controller(DataPemasokController::class)->group(function () {
    Route::get('/data_pemasok_truncate', 'truncate')->middleware('auth');
});

Route::resource('data_jenis_barang', DataJenisBarangController::class)->middleware('auth');
Route::controller(DataJenisBarangController::class)->group(function () {
    Route::get('/data_jenis_barang_truncate', 'truncate')->middleware('auth');
});

Route::resource('data_service', ServiceController::class)->middleware('auth');
Route::controller(ServiceController::class)->group(function () {
    Route::get('/data_service_truncate', 'truncate')->middleware('auth');
});

Route::resource('data_pengeluaran', PengeluaranController::class)->middleware('auth');
Route::controller(PengeluaranController::class)->group(function () {
    Route::get('/data_pengeluaran_truncate', 'truncate')->middleware('auth');
});
