<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
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

        return view('chart',[
            'title' => 'Chart',
            'obat' => Obat::all()
        ]);
    }

    public function addToCart(Request $request)
    {
        // Validasi data yang dikirim dari permintaan AJAX
        $request->validate([
            'obat_id' => 'required'
        ]);

        // Membuat cart baru
        $cart = new Cart();
        $cart->pelanggan_id = Auth::id('pelanggan');
        $cart->obat_id = $request->input('obat_id');
        $cart->quantity = 1;
        $cart->save();

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang!']);
    }
}
