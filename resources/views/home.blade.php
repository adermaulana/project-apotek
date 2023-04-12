@extends('dashboard.layouts.login')

@section('container')
<main id="maino" class="maino container">
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
			</tr>
		</thead>
		<tbody>
            @foreach($obat as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $data->nama_obat }} </td>
                <td> {{ $data->harga_jual }} </td>
                <td> {{ $data->deskripsi_obat }} </td>
            </tr>
            @endforeach
		</tbody>
	</table>

</main>

@endsection
