<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Obat;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use PDF;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::latest()->get();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.penjualan.index',[
                'title' => 'Penjualan'
            ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif','penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.penjualan.create',[
            'title' => 'Tambah Penjualan',
            'obat' => Obat::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'harga_jual' => 'required',
            'banyak' => 'required',
            'tanggal_jual' => 'required',
            'total' => 'required'
            ]);


            $drug = Obat::findOrFail($request->obat_id);

            if ($drug->stok < $request->banyak) {
                return redirect()->back()->with('error', 'Maaf, Stok Obat tidak mencukupi!');
            } else {

                Penjualan::create($validatedData);
            
                $obat = Obat::findOrFail($request->obat_id);
                $obat->stok -= $request->banyak;
                $obat->save();
            }

            return redirect()->route('penjualan.index')
            ->with('success','Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        $title = "Invoice Penjualan";
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.penjualan.show',[
            'penjualan' => Penjualan::find($penjualan)
        ],compact('title','total_notif','kadaluwarsa','obat_habis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {

        $kadaluwarsa = Obat::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        
        return view('dashboard.penjualan.edit',[
            'title' => 'Edit Penjualan',
            'penjualan' => $penjualan,
            'obat' => Obat::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'harga_jual' => 'required',
            'banyak' => 'required',
            'tanggal_jual' => 'required',
            'total' => 'required'
            ]);

            Penjualan::where('id',$penjualan->id)
            ->update($validatedData);

            $obat = Obat::find($request->obat_id);
            $obat->stok += $request->banyak;
            $obat->save();

            return redirect()->route('penjualan.index')
            ->with('success','Transaksi Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $data_penjualan = Penjualan::select('id','obat_id','banyak')->get();

        foreach ($data_penjualan as $penjualans) 
            $details = Penjualan::where('id', $penjualans->id)->get();
            foreach ($details as $detail) {
                $produk = Obat::findOrFail($detail->obat_id);
                $produk->stok += $detail->banyak;
                $produk->save();
            } 

        Penjualan::destroy($penjualan->id);

        return redirect()->route('penjualan.index')
        ->with('success','Transaksi Berhasil Dihapus');
    }

}
