<?php

namespace App\Http\Controllers;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ListInvoiceController extends Controller
{
    public function index(){
        return view('pelanggan.invoice-list',[
            'title' => 'My Invoice',
            'penjualan' => Penjualan::latest()->where('pelanggan_id', auth('pelanggan')->user()->id)->get()
        ]);
    }

    
    public function detail($id){

        $booking = Penjualan::findOrFail($id);
        return view('pelanggan.invoicedetail',[
            'title' => 'Details',
            'penjualan' => $booking
        ]);
    }
}
