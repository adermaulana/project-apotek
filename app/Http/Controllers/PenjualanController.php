<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Obat;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Penjualan::get();
                return DataTables::of($model)
                ->addColumn('action', 'dashboard.penjualan.action')
                ->addIndexColumn()
                ->toJson();
        }

            return view('dashboard.penjualan.index',[
                'title' => 'Penjualan'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penjualan.create',[
            'title' => 'Tambah Penjualan',
            'obats' => Obat::all()
        ]);
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
            'nama_pembeli' => 'required',
            'harga_jual' => 'required',
            'banyak' => 'required',
            'tanggal_jual' => 'required',
            'total' => 'required'
            ]);

            Penjualan::create($validatedData);

            $obat = Obat::find($request->obat_id);
            $obat->stok -= $request->banyak;
            $obat->save();

            return redirect()->route('penjualan.index')
            ->with('success','Penjualan has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        Penjualan::destroy($penjualan->id);

        return redirect()->route('penjualan.index')
        ->with('success','Produk Has Been deleted successfully');
    }
}
