<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\customer\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\merek\MerekController;
use App\Http\Controllers\phone\PhoneController;
use App\Http\Controllers\transaksi\TransaksiController;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('login.post',[AuthController::class, 'loginPost'])->name('login.post');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('register.post',[AuthController::class, 'registerPost'])->name('register.post');

Route::get('dashboard',[AdminController::class, 'index'])->name('dashboard');

Route::get('merek',[MerekController::class, 'index'])->name('merek');
Route::get('tambah.merek',[MerekController::class, 'tambah'])->name('tambah.merek');
Route::post('save.merek',[MerekController::class, 'saveMerek'])->name('save.merek');
Route::get('edit.merek/{id?}',[MerekController::class, 'editMerek'])->name('edit.merek');
Route::get('hapus.merek/{id?}',[MerekController::class, 'hapusMerek'])->name('hapus.merek');
Route::post('update.merek/{id}',[MerekController::class, 'updateMerek'])->name('update.merek');

Route::get('phone.admin',[PhoneController::class, 'index'])->name('phone.admin');
Route::get('tambah.phone',[PhoneController::class, 'tambahPhone'])->name('tambah.phone');

Route::get('customer',[CustomerController::class, 'index'])->name('customer');

Route::get('transaksi',[TransaksiController::class, 'index'])->name('transaksi');
