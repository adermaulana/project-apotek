<?php

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Unit;
use App\Models\Pemasok;
use App\Models\Category;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UnitController;

//Buat Dashboard
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ListInvoiceController;

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

//LandingPage
Route::get('/',function(){

    $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
    $total_kadaluwarsa = $kadaluwarsa->count();
    $obat_habis = Obat::where('stok', '<=', 0)->get();
    $total_obat_habis = $obat_habis->count();
    $total_notif = $total_kadaluwarsa + $total_obat_habis;

    return view('home',[
        'title' => 'Home',
        'obat' => Obat::all(),
        'penjualan' => Penjualan::latest()->paginate(1)
    ],compact('total_notif','obat_habis','total_kadaluwarsa','kadaluwarsa'));
});

//login
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);
Route::get('/logout', [LoginController::class,'logout']);

Route::get('/dashboard',function(){
    $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
    $total_kadaluwarsa = $kadaluwarsa->count();
    $obat_habis = Obat::where('stok', '<=', 0)->get();
    $total_obat_habis = $obat_habis->count();
    $total_notif = $total_kadaluwarsa + $total_obat_habis;
    $title = 'Apotek';
    $penjualan = Penjualan::all();
    $total_penjualan = $penjualan->sum('total');
    $total_pelanggan = $penjualan->count('nama_pembeli');
    $total_obat = Obat::all();
    $total_obats = $total_obat->sum('stok');
    $unit = Unit::all();
    $total_unit = $unit->count();
    $pemasok = Pemasok::all();
    $total_pemasok = $pemasok->count();
    $pembelian = Pembelian::all();
    $total_pembelian = $pembelian->sum('total');
    $total_pendapatan = $total_penjualan - $total_pembelian;
    return view('dashboard.index',compact('kadaluwarsa','title','total_penjualan','total_obats','total_obat','total_unit','total_pemasok','total_pembelian','total_pelanggan','total_pendapatan','total_kadaluwarsa','obat_habis','total_notif'));
})->middleware('auth');

//Obat
Route::get('/dashboard/obat/kadaluwarsa',[ObatController::class,'kadaluwarsa'])->name('kadaluwarsa')->middleware('auth');
Route::get('/dashboard/obat/habis',[ObatController::class,'habis'])->name('habis')->middleware('auth');
Route::post('/dashboard/obat/kadaluwarsa',[ObatController::class,'hapus'])->name('habis')->middleware('auth');
Route::resource('/dashboard/obat',ObatController::class)->middleware('auth');

//Unit
Route::resource('/dashboard/unit',UnitController::class)->middleware('auth');

//Pemasok
Route::resource('/dashboard/pemasok',PemasokController::class)->middleware('auth');

//Penjualan
Route::resource('/dashboard/penjualan',PenjualanController::class)->middleware('auth');

//Pembelian
Route::resource('/dashboard/pembelian',PembelianController::class)->middleware('auth');
Route::post('/dashboard/obat/{id}/kadaluwarsa',[PembelianController::class,'updateKadaluwarsa'])->name('update-kadaluwarsa')->middleware('auth');
//User
Route::resource('/dashboard/user',UserController::class)->middleware('auth');

//Laporan
Route::get('/dashboard/laporan',[LaporanController::class,'index'])->name('reports')->middleware('auth');
Route::post('/dashboard/laporan',[LaporanController::class,'getData'])->middleware('auth');

//Pelanggan
Route::resource('/pelanggan',PelangganController::class);
Route::get('/pelanggan/invoice/{id}',[PelangganController::class,'konfirmasi'])->middleware('auth:pelanggan');

//Register
Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

//List Invoice
Route::get('/list-invoice', [ListInvoiceController::class,'index'])->middleware('auth:pelanggan');
Route::get('/list-invoice/detail/{id}', [ListInvoiceController::class,'detail'])->middleware('auth:pelanggan');




