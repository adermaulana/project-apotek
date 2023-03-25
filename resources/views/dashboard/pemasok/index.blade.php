@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

<div class="pagetitle">
  <h1>Pemasok</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body ">
              <h5 class="card-title">Daftar Pemasok Obat</h5>
              <a class="btn btn-success mb-3" href="{{ route('pemasok.create') }}"> Tambah Pemasok</a>
              <table class="table table-bordered " id="datatable-crud">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemasok</th>
                <th>Alamat</th>
                <th>Telepon</th>
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
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script>
    feather.replace();
</script>

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
ajax: "{{ route('pemasok.index') }}",
columns: [
{data: 'DT_RowIndex', name: 'DT_RowIndex'},
{ data: 'nama_pemasok', name: 'nama_pemasok' },
{ data: 'alamat', name: 'alamat' },
{ data: 'telepon', name: 'telepon' },
{ data: 'action', name: 'action', orderable: false },

],
order: [[0, 'desc']]
});

});
</script>

@endsection