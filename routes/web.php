<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KeteranganController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [BarangController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/add', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::get('/barang/show/{id}', [BarangController::class, 'show'])->name('barang.show');
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/delete/{id}', [BarangController::class, 'softDelete'])->name('barang.softDelete');
Route::delete('/barang/delete/permanen/{id}', [BarangController::class, 'hardDelete'])->name('barang.hardDelete');
Route::get('/barang/restore/{id}', [BarangController::class, 'restore'])->name('barang.restore');

Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.index');
Route::get('/gudang/add', [GudangController::class, 'create'])->name('gudang.create');
Route::post('/gudang/store', [GudangController::class, 'store'])->name('gudang.store');
Route::get('/gudang/edit/{id}', [GudangController::class, 'edit'])->name('gudang.edit');
Route::get('/gudang/show/{id}', [GudangController::class, 'show'])->name('gudang.show');
Route::post('/gudang/update/{id}', [GudangController::class, 'update'])->name('gudang.update');
Route::delete('/gudang/delete/{id}', [GudangController::class, 'delete'])->name('gudang.delete');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/add', [StoreController::class, 'create'])->name('store.create');
Route::post('/store/store', [StoreController::class, 'store'])->name('store.store');
Route::get('/store/edit/{id}', [StoreController::class, 'edit'])->name('store.edit');
Route::post('/store/update/{id}', [StoreController::class, 'update'])->name('store.update');
Route::delete('/store/delete/{id}', [StoreController::class, 'delete'])->name('store.delete');

Route::get('/detail', [KeteranganController::class, 'index'])->name('keterangan.index');
Route::get('/soft', [BarangController::class, 'softIndex'])->name('softDelete');
Route::get('/restore', [BarangController::class, 'softIndex'])->name('restore');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [BarangController::class, 'index'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('actionRegister');
Route::get('home', [BarangController::class, 'index'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
