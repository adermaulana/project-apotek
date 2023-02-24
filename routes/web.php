<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PembelianController;

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
Route::get('/dashboard/obat/kadaluwarsa',[ObatController::class,'kadaluwarsa'])->name('kadaluwarsa');
Route::get('/dashboard/obat/habis',[ObatController::class,'habis'])->name('habis');
Route::resource('/dashboard/obat',ObatController::class);

//Unit
Route::resource('/dashboard/unit',UnitController::class);

//Category
Route::resource('/dashboard/categories',CategoryController::class);

//Pemasok
Route::resource('/dashboard/pemasok',PemasokController::class);

//Pembelian
Route::resource('/dashboard/pembelian',PembelianController::class);

//User
Route::resource('/dashboard/user',UserController::class);




