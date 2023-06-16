<?php

namespace App\Http\Controllers;
use App\Models\Penjualan;
use App\Models\Obat;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ListInvoiceController extends Controller
{
    public function index(){
        return view('pelanggan.invoice-list',[
            'title' => 'My Invoice',
            'penjualan' => Order::latest()->where('pelanggan_id', auth('pelanggan')->user()->id)->get()
        ]);
    }

    
    public function detail($id){
        $booking = OrderItem::findOrFail($id);
        return view('pelanggan.invoicedetail',[
            'title' => 'Details',
            'penjualan' => $booking,
            'orderlist' => OrderItem::latest()->where('order_id', auth('pelanggan')->user()->id)->get()

        ]);
    }

    public function obat(){
        return view('pelanggan.obat-list',[
            'title' => 'Beli Obat',
            'obat' => Obat::all()
        ]);
    }

}
