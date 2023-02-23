@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Obat</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">{{ $title }}</h5>
              <div class="container">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
</div>
<div class="pull-right">
<a class="btn btn-danger" href="{{ route('obat.index') }}" enctype="multipart/form-data"> Batal</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Obat</h6>
<input type="text" name="nama_obat" value="" class="form-control" >
@error('nama_obat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Penyimpanan</h6>
<input type="text" name="penyimpanan" class="form-control"  value="">
@error('penyimpanan')
<div class="alert alert-danger mt-2 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Kategori</h6>
<select class="form-select" name="category_id">
        @foreach ($categories as $category)

        @if(old('category_id') == $category->id)
          <option value="{{ $category->id }} " selected> {{ $category->nama_kategori }} </option>
        @else
          <option value="{{ $category->id }}"> {{ $category->nama_kategori }} </option>
        @endif

        @endforeach
</select>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Stok</h6>
<input type="number" name="stok" class="form-control"  value="">
@error('stok')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Kadaluwarsa</h6>
<input type="date" name="kadaluwarsa" class="form-control"  value="">
@error('kadaluwarsa')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Deskripsi Obat</h6>
<input type="text" name="deskripsi_obat" value="" class="form-control" >
@error('deskripsi_obat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Beli</h6>
<input type="text" name="harga_beli" class="form-control"  value="">
@error('harga_beli')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Jual</h6>
<input type="text" name="harga_jual" class="form-control"  value="">
@error('harga_jual')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Unit</h6>
<input type="text" name="unit_id" value="" class="form-control" >
@error('unit_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Pemasok</h6>
<input type="text" name="pemasok_id" value="" class="form-control" >
@error('pemasok_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button  type="submit" class="btn btn-primary col-6 me-1">Submit</button>
</div>
</form>
</div>
    

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End columns -->

  </div>
</section>

</main><!-- End #main -->

@endsection