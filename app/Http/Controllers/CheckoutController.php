<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $chart = Chart::all();
        $totalchart = $chart->sum('obat.harga_jual');

        return view('checkout',[
            'title' => 'Checkout',
            'chart' => Chart::latest()->where('pelanggan_id', auth('pelanggan')->user()->id)->get()
        ],compact('totalchart'));
    }

    public function checkout(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'total_price' => 'required',
            'tanggal_jual' => 'required'
            ]);

        $data['pelanggan_id'] = auth('pelanggan')->user()->id;
        // Get Carts data
        $carts = Chart::with(['obat'])->where('pelanggan_id', auth('pelanggan')->user()->id)->get();
        // Create Transaction
        $transaction = Order::create($data);

        // Create Transaction item
        foreach($carts as $cart) {
            $items[] = OrderItem::create([
                'order_id' => $transaction->id,
                'pelanggan_id' => $cart->pelanggan_id,
                'obat_id' => $cart->obat_id,
            ]);
        }
        
        // Delete cart after transaction
        Chart::where('pelanggan_id', Auth::guard('pelanggan')->user()->id)->delete();

        return redirect('/list-invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
