@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

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
              <h5 class="card-title">Daftar Obat</h5>
              <a class="btn btn-success mb-3" href="{{ route('obat.create') }}"> Tambah Obat</a>
              <table class="table table-bordered" id="datatable-crud">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Penyimpanan</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Kadaluarsa</th>
                <th>Harga Jual</th>
                <th>Unit</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End columns -->

  </div>
</section>

</main><!-- End #main -->

<script type="text/javascript" id="javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#datatable-crud').DataTable({
processing: true,
serverSide: true,
ajax: "{{ route('obat.index') }}",
columns: [
{data: 'DT_RowIndex', name: 'DT_RowIndex'},
{ data: 'nama_obat', name: 'nama_obat' },
{ data: 'penyimpanan', name: 'penyimpanan' },
{ data: 'category', name: 'category.nama_kategori' },
{ data: 'stok', name: 'stok' },
{ data: 'kadaluwarsa', name: 'kadaluwarsa' },
{ data: 'harga_jual', name: 'harga_jual' },
{ data: 'unit_id', name: 'unit_id' },
{ data: 'action', name: 'action', orderable: false },

],
order: [[0, 'desc']]
});

});
</script>

@endsection