<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class CategoryController extends Controller
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
            $model = Category::latest()->get();
                return DataTables::of($model)
                ->addColumn('action', 'dashboard.categories.action')
                ->addIndexColumn()
                ->toJson();
        }

            return view('dashboard.categories.index',[
                'title' => 'Kategori'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create',[
            'title' => 'Tambah Kategori'
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
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
            ]);

            Category::create($validatedData);
            return redirect()->route('categories.index')
            ->with('success','Kategori has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',[
            'title' => 'Edit Kategori',
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
            ]);

            Category::where('id',$category->id)
            ->update($validateData);

            return redirect()->route('categories.index')
            ->with('success','Kategori Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect()->route('categories.index')
        ->with('success','Kategori Has Been deleted successfully');
    }
}
