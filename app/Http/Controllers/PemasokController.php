<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Pemasok::latest()->get();
                return DataTables::of($model)
                ->addColumn('action', 'dashboard.pemasok.action')
                ->addIndexColumn()
                ->toJson();
        }

            return view('dashboard.pemasok.index',[
                'title' => 'Pemasok'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pemasok.create',[
            'title' => 'Tambah Pemasok'
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
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            ]);

            Pemasok::create($validatedData);
            return redirect()->route('pemasok.index')
            ->with('success','Pemasok has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {
        return view('dashboard.pemasok.edit',[
            'title' => 'Edit Pemasok',
            'pemasok' => $pemasok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $validateData = $request->validate([
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            ]);

            Pemasok::where('id',$pemasok->id)
            ->update($validateData);

            return redirect()->route('pemasok.index')
            ->with('success','Pemasok Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        Pemasok::destroy($pemasok->id);

        return redirect()->route('pemasok.index')
        ->with('success','Pemasok Has Been deleted successfully');
    }
}
