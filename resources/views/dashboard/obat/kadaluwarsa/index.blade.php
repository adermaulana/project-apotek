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
              <h5 class="card-title">Daftar Obat Kadaluwarsa</h5>
              <table class="table table-bordered" id="datatable-crud">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Banyak</th>
                <th>Nama Pemasok</th>
                <th>Kadaluwarsa</th>
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
ajax: "{{ route('kadaluwarsa') }}",
columns: [
{data: 'DT_RowIndex', name: 'DT_RowIndex'},
{ data: 'obat', name: 'obat.nama_obat' },
{ data: 'banyak', name: 'banyak' },
{ data: 'pemasok', name: 'pemasok.nama_pemasok' },
{ data: 'kadaluwarsa', name: 'kadaluwarsa' },
{ data: 'action', name: 'action', orderable: false },

],
order: [[0, 'desc']]
});

});
</script>

@endsection