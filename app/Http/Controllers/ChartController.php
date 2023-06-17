<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Chart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{

    public function index(){

        if (Auth::check()) {
            // Jika auth admin, tampilkan pemberitahuan
            session()->flash('error', 'Anda adalah Admin tidak bisa melakukan transaksi disini!');
            return redirect('/');

        }  else if (!Auth::guard('pelanggan')->check()) {
            // Jika pengguna bukan pelanggan terautentikasi, tampilkan pemberitahuan
            session()->flash('error', 'Anda Harus Login Terlebih Dahulu Untuk Melakukan Transaksi!');
            return redirect('/');

        }

        $chart = Chart::all();
        $totalchart = $chart->sum('obat.harga_jual');

        return view('chart',[
            'title' => 'Chart',
            'chart' => Chart::latest()->where('pelanggan_id', auth('pelanggan')->user()->id)->get()
        ],compact('totalchart'));
    }

    public function addToCart(Request $request , $id){
        // dd($request->all());

        $validatedData['pelanggan_id'] = auth('pelanggan')->user()->id;
        $validatedData['obat_id'] = $id;


        Chart::create($validatedData);

        return redirect('keranjang');      
    }
    
    public function deleteCart(Request $request , $id){
        // dd($request->all());
        $chart = Chart::FindOrFail($id);
        Chart::destroy($chart->id);
        
        return redirect('keranjang');      
    } 



}
