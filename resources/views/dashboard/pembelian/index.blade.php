@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<div class="pagetitle">
  <h1>Pembelian Obat</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body col-12">
              <h5 class="card-title">Daftar Pembelian Obat</h5>
              <a class="btn btn-success mb-3" href="{{ route('pembelian.create') }}"> Beli Obat</a>
              <table class="table table-bordered " id="datatable-crud">
            <thead>
            <tr>
                <th>No</th>
                <th>Tangal Beli</th>
                <th>Nama Pemasok</th>
                <th>Banyak</th>
                <th>Total Pembelian</th>
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
ajax: "{{ route('pembelian.index') }}",
columns: [
{data: 'DT_RowIndex', name: 'DT_RowIndex'},
{ data: 'tanggal_beli', name: 'tanggal_beli' },
{ data: 'pemasok', name: 'pemasok.nama_pemasok' },
{ data: 'banyak', name: 'banyak' },
{ data: 'total', name: 'total' },
{ data: 'action', name: 'action', orderable: false },

],
order: [[0, 'desc']]
});

});
</script>

@endsection