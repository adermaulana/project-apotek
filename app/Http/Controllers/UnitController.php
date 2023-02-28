<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class UnitController extends Controller
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
            $model = Unit::latest()->get();
                return DataTables::of($model)
                ->addColumn('action', 'dashboard.unit.action')
                ->addIndexColumn()
                ->toJson();
        }

            return view('dashboard.unit.index',[
                'title' => 'Unit'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.unit.create',[
            'title' => 'Tambah Unit'
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
            'unit' => 'required',
            ]);

            Unit::create($validatedData);
            return redirect()->route('unit.index')
            ->with('success','Unit has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('dashboard.unit.edit',[
            'title' => 'Edit Unit',
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validateData = $request->validate([
            'unit' => 'required',
            ]);

            Unit::where('id',$unit->id)
            ->update($validateData);

            return redirect()->route('unit.index')
            ->with('success','Unit Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        Unit::destroy($unit->id);

        return redirect()->route('unit.index')
        ->with('success','Unit Has Been deleted successfully');
    }
}
