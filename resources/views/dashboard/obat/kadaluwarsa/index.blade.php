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
              <table class="table table-bordered" id="datatable-noexport">
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
        @foreach ($kadaluwarsa as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->obat->nama_obat }} </td>
            <td>{{ $data->banyak }} </td>
            <td>{{ $data->pemasok->nama_pemasok }} </td>
            <td>{{ date_format(date_create($data->kadaluwarsa),"d M, Y") }} </td>
            <td>
            <form action="{{ route('update-kadaluwarsa', $data->id) }}" method="post" class="d-inline">
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><span data-feather="x-circle"></span></button>
              </form>
            </td>
          </tr>

          @endforeach 
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

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 5000);


  feather.replace();


</script>

@endsection