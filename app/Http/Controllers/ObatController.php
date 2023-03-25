<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        if (request()->ajax()) {
            $model = Obat::with('unit')->latest()->get();
                return DataTables::of($model)
                ->addColumn('unit', function (Obat $obat) {
                    return $obat->unit->unit;
                })
                ->addColumn('action', 'dashboard.obat.action')
                ->addIndexColumn()
                ->toJson();
        }

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.obat.index',[
                'title' => 'Obat'
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

        return view('dashboard.obat.create',[
            'title' => 'Tambah Obat',
            'units' => Unit::all(),
            'pemasoks' => Pemasok::all()
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
            'nama_obat' => 'required',
            'harga_jual' => 'required',
            'deskripsi_obat' => 'required',
            'harga_beli' => 'required',
            'pemasok_id' => 'required',
            'unit_id' => 'required'
            ]);

            Obat::create($validatedData);
            return redirect()->route('obat.index')
            ->with('success','Obat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {

        $kadaluwarsa = Obat::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        
        return view('dashboard.obat.edit',[
            'title' => 'Edit Obat',
            'obat' => $obat,
            'units' => Unit::all(),
            'pemasoks' => Pemasok::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $validateData = $request->validate([
            'nama_obat' => 'required',
            'stok' => 'required',
            'harga_jual' => 'required',
            'deskripsi_obat' => 'required',
            'harga_beli' => 'required',
            'pemasok_id' => 'required',
            'unit_id' => 'required'
            ]);

            Obat::where('id',$obat->id)
            ->update($validateData);

            return redirect()->route('obat.index')
            ->with('success','Obat Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        Obat::destroy($obat->id);

        return redirect()->route('obat.index')
        ->with('success','Obat Berhasil Dihapus');
    }

    public function kadaluwarsa(){
        
        if (request()->ajax()) {
            $model = Pembelian::whereDate('kadaluwarsa', '<=', Carbon::now())->get();
                return DataTables::of($model)
                ->addColumn('obat', function (Pembelian $pembelian) {
                    return $pembelian->obat->nama_obat;
                })
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

        return view('dashboard.obat.kadaluwarsa.index',[
            'title' => 'Kadaluwarsa'
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    public function habis(){

        if (request()->ajax()) {
            $model = Obat::where('stok', '<=', 0)->get();
                return DataTables::of($model)
                ->addColumn('unit', function (Obat $obat) {
                    return $obat->unit->unit;
                })
                ->addColumn('action', 'dashboard.obat.action')
                ->addIndexColumn()
                ->toJson();
        }

        $total_obat = Obat::all();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.obat.habis.index',[
            'title' => 'Habis'
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

}
