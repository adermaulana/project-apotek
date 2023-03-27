<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pemasok;
use App\Models\Obat;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $model = Pembelian::with('pemasok')->latest()->get();
                return DataTables::of($model)
                ->addColumn('pemasok', function (Pembelian $pembelian) {
                    return $pembelian->pemasok->nama_pemasok;
                })
                ->addColumn('action', 'dashboard.pembelian.action')
                ->addIndexColumn()
                ->toJson();
        }

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.pembelian.index',[
                'title' => 'Pembelian'
            ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
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

        return view('dashboard.pembelian.create',[
            'title' => 'Tambah Pembelian',
            'pemasoks' => Pemasok::all(),
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
            'harga_beli' => 'required',
            'banyak' => 'required',
            'pemasok_id' => 'required',
            'kadaluwarsa' => 'required',
            'tanggal_beli' => 'required',
            'total' => 'required'
            ]);

            Pembelian::create($validatedData);
            
            $obat = Obat::find($request->obat_id);
            $obat->stok += $request->banyak;
            $obat->save();

            return redirect()->route('pembelian.index')
            ->with('success','Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        $kadaluwarsa = Obat::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        
    return view('dashboard.pembelian.edit',[
            'title' => 'Edit Pembelian',
            'pembelian' => $pembelian,
            'pemasoks' => Pemasok::all(),
            'obat' => Obat::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'harga_beli' => 'required',
            'banyak' => 'required',
            'pemasok_id' => 'required',
            'kadaluwarsa' => 'required',
            'tanggal_beli' => 'required',
            'total' => 'required'
            ]);

            Pembelian::where('id',$pembelian->id)
            ->update($validatedData);
            
            $obat = Obat::find($request->obat_id);
            $obat->stok += $request->banyak;
            $obat->save();

            return redirect()->route('pembelian.index')
            ->with('success','Produk Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);

        return redirect()->route('pembelian.index')
        ->with('success','Produk Berhasil Dihapus');
    }

    public function hapus(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);

        return redirect()->route('kadaluwarsa.index')
        ->with('success','Produk Berhasil Dihapus');
    }
}
