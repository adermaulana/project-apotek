@extends('dashboard.layouts.login')

@section('container')
<main id="maino" class="maino container">

@if(session()->has('invoice'))
      <div class=" alert-success col-lg-11" role="alert">
        {{ session('invoice') }}
        <a target="_blank" href="/pelanggan">Silahkan klik link berikut untuk melihat Invoice</a>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

<div class="pagetitle">
  <h1>Daftar Obat Yang Tersedia</h1>
</div><!-- End Page Title -->
<table class="fixed-th zebra-table" id="datatable-noexport">

		<thead>
			<tr>
				<th>No</th>
				<th>Nama Obat</th>
				<th>Harga Jual</th>
				<th>Deskripsi Obat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
            @foreach($obat as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $data->nama_obat }} </td>
                <td> {{ $data->formatRupiah('harga_jual') }} </td>
                <td> {{ $data->deskripsi_obat }} </td>
				<td>
					<div class="actions">
						<a class="btn btn-success" href="{{ route('pelanggan.show', $data->id) }}">
                      		<span data-feather="edit">Beli</span>
						</a>
					</div>
				</td>
            </tr>
            @endforeach
		</tbody>
	</table>

</main>

@endsection
