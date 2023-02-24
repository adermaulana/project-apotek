<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

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


Route::get('/dashboard',function(){
    return view('dashboard.index',[
        "title" => "Apotek"
    ]);
});

//Obat
Route::get('/dashboard/obat/kadaluwarsa',[ObatController::class,'kadaluwarsa'])->name('kadaluwarsa');
Route::resource('/dashboard/obat',ObatController::class);





