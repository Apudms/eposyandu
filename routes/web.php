<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDKaderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPublicController;
use App\Http\Controllers\HomePublicController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\CRUDDataAnakController;
use App\Http\Controllers\CRUDDataAdminController;
use App\Http\Controllers\CRUDDataDusunController;
use App\Http\Controllers\CRUDDataIbuHamilController;
use App\Http\Controllers\CRUDDataImunisasiController;
use App\Http\Controllers\CRUDDataPesertaKBController;
use App\Http\Controllers\CRUDDataKontrasepsiController;
use App\Http\Controllers\CRUDPostController;

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

Route::prefix('/')->group(function () {
  Route::get('/', [HomePublicController::class, 'index'])->name('public.home');
  Route::get('/tentang', [HomePublicController::class, 'about'])->name('public.about');
  Route::get('/data-petugas', [HomePublicController::class, 'petugas'])->name('public.petugas');
  Route::get('/data-anak', [DataPublicController::class, 'index'])->name('public.data.anak');
  Route::get('/data-ibu-hamil', [DataPublicController::class, 'ibuhamil'])->name('public.data.ibuhamil');
  Route::get('/data-peserta-kb', [DataPublicController::class, 'pesertakb'])->name('public.data.pesertakb');
});

Route::prefix('admin')->group(function () {
  Route::get('/login', [LoginAdminController::class, 'login'])->name('admin.login')->middleware('guest');
  Route::post('/handleLogin', [LoginAdminController::class, 'handleLogin'])->name('admin.handleLogin');
  Route::post('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
  Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
  Route::resource('/kader', CRUDKaderController::class)->middleware('auth');
  Route::resource('/anak', CRUDDataAnakController::class)->middleware('auth');
  Route::resource('/dusun', CRUDDataDusunController::class)->middleware('auth');
  Route::resource('/ibu-hamil', CRUDDataIbuHamilController::class)->middleware('auth');
  Route::resource('/data-admin', CRUDDataAdminController::class)->middleware('auth');
  Route::resource('/imunisasi', CRUDDataImunisasiController::class)->middleware('auth');
  Route::resource('/peserta-kb', CRUDDataPesertaKBController::class)->middleware('auth');
  Route::resource('/kontrasepsi', CRUDDataKontrasepsiController::class)->middleware('auth');
  Route::resource('/post', CRUDPostController::class)->middleware('auth');
});
