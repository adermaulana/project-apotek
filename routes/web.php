<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;

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



//login
Route::get('/', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/dashboard',function(){
    return view('dashboard.index',[
        "title" => "Apotek"
    ]);
})->middleware('auth');;

//Obat
Route::get('/dashboard/obat/kadaluwarsa',[ObatController::class,'kadaluwarsa'])->name('kadaluwarsa')->middleware('auth');
Route::get('/dashboard/obat/habis',[ObatController::class,'habis'])->name('habis')->middleware('auth');
Route::resource('/dashboard/obat',ObatController::class)->middleware('auth');

//Unit
Route::resource('/dashboard/unit',UnitController::class)->middleware('auth');

//Category
Route::resource('/dashboard/categories',CategoryController::class)->middleware('auth');

//Pemasok
Route::resource('/dashboard/pemasok',PemasokController::class)->middleware('auth');

//Penjualan
Route::resource('/dashboard/penjualan',PenjualanController::class)->middleware('auth');

//Pembelian
Route::resource('/dashboard/pembelian',PembelianController::class)->middleware('auth');

//User
Route::resource('/dashboard/user',UserController::class)->middleware('auth');

//Laporan
Route::get('/dashboard/laporan',[LaporanController::class,'index'])->name('reports')->middleware('auth');
Route::post('/dashboard/laporan',[LaporanController::class,'getData'])->middleware('auth');



