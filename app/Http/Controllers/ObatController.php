<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pemasok;
use App\Models\Unit;
use App\Models\Category;
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
            $model = Obat::with('category','unit')->latest()->get();
                return DataTables::of($model)
                ->addColumn('category', function (Obat $obat) {
                    return $obat->category->nama_kategori;
                })
                ->addColumn('unit', function (Obat $obat) {
                    return $obat->unit->unit;
                })
                ->addColumn('action', 'dashboard.obat.action')
                ->addIndexColumn()
                ->toJson();
        }
            return view('dashboard.obat.index',[
                'title' => 'Obat'
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.obat.create',[
            'title' => 'Tambah Obat',
            'categories' => Category::all(),
            'units' => Unit::all(),
            'pemasoks' => Pemasok::all()
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
            'nama_obat' => 'required',
            'penyimpanan' => 'required',
            'category_id' => 'required',
            'stok' => 'required',
            'kadaluwarsa' => 'required',
            'harga_jual' => 'required',
            'deskripsi_obat' => 'required',
            'harga_beli' => 'required',
            'pemasok_id' => 'required',
            'unit_id' => 'required'
            ]);

            Obat::create($validatedData);
            return redirect()->route('obat.index')
            ->with('success','Obat has been created successfully.');
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
        return view('dashboard.obat.edit',[
            'title' => 'Edit Obat',
            'obat' => $obat,
            'categories' => Category::all(),
            'units' => Unit::all(),
            'pemasoks' => Pemasok::all()
        ]);
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
            'penyimpanan' => 'required',
            'category_id' => 'required',
            'stok' => 'required',
            'kadaluwarsa' => 'required',
            'harga_jual' => 'required',
            'deskripsi_obat' => 'required',
            'harga_beli' => 'required',
            'pemasok_id' => 'required',
            'unit_id' => 'required'
            ]);

            Obat::where('id',$obat->id)
            ->update($validateData);

            return redirect()->route('obat.index')
            ->with('success','Obat Has Been updated successfully');
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
        ->with('success','Obat Has Been deleted successfully');
    }

    public function kadaluwarsa(){

        if (request()->ajax()) {
            $model = Obat::whereDate('kadaluwarsa', '<=', Carbon::now())->get();
                return DataTables::of($model)
                ->addColumn('category', function (Obat $obat) {
                    return $obat->category->nama_kategori;
                })
                ->addColumn('unit', function (Obat $obat) {
                    return $obat->unit->unit;
                })
                ->addColumn('action', 'dashboard.obat.action')
                ->addIndexColumn()
                ->toJson();
        }

        return view('dashboard.obat.kadaluwarsa.index',[
            'title' => 'Kadaluwarsa'
        ]);
    }

    public function habis(){

        if (request()->ajax()) {
            $model = Obat::where('stok', '<=', 0)->get();
                return DataTables::of($model)
                ->addColumn('category', function (Obat $obat) {
                    return $obat->category->nama_kategori;
                })
                ->addColumn('action', 'dashboard.obat.action')
                ->addIndexColumn()
                ->toJson();
        }

        return view('dashboard.obat.habis.index',[
            'title' => 'Habis'
        ]);
    }



}
