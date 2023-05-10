@extends('dashboard.layouts.login')

@section('container')

<style>

 .nav-link {
  color: blue;
  
}

.nav-link:hover {
    color:black;
}

@media (max-width: 768px) { 

   }

</style>

<div  style="margin-bottom:318px;" id="content-wrapper">	
		<div class="container">
			<!-- <div class="row">
				<div class="col-md-4">hwhw</div>
				<div class="col-md-8">jafhjjhfwjfafawf</div>
			</div> -->
			
			<div  class="row justify-content-center">
			  <div class="col-md-3 " style="margin-top:70px;" > 
			    <div  class="nav flex-column nav-pills bg-white border rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <div class="nav-link p-3 text-dark" href="#">
		           <div class="text-center">
		           <img class="rounded-circle" src="https://bookingciremai.menlhk.go.id/kawasan-sso/images/user.png?1670035419402787" width="50px"> 
		           </div>
		           <div class="text-center"><strong>{{ auth('pelanggan')->user()->name }}</strong> <div class="text-muted small">{{ auth('pelanggan')->user()->email }}</div>
		           </div>
		          </div>
		          <div class="border text-dark border-bottom"></div>
			         <a  class="nav-link" href="/list-obat" role="tab"><i class=""></i>Obat</a>
            	<div class="border text-dark border-bottom"></div>
			        <a  class="nav-link" href="/list-invoice" role="tab"><i class=""></i> My Invoice</a>
			      <div  class="border text-dark border-bottom"></div>
                  <form action="/logout" method="post">
                    @csrf
                  <button type="submit" class="nav-link text-dark p-3"> Log Out</button>
                  </form>

			    </div>
			  </div>


			  <div style="margin-top:70px;" class="col-md-9">
			    <div class="tab-content" id="v-pills-tabContent">
			      <div class="mt-4 mt-md-1 tab-pane fade active show" id="v-pills-booking_list" role="tabpanel" aria-labelledby="v-pills-messages-tab">
			      		<h4 class="mt-3">Daftar Obat</h4>
                        <hr>
                        @if($obat->count())
                        @foreach($obat as $data)
			      		<div id="container-booking-list">
                            <div id="no-data-row" class="card mb-3 nodata">	
                                <div class="row no-gutters">
                                    <div class="">
                                        <div class="card-header">
                                        <table class="table table-bordered col-13" id="datatable-noexport">
                                            <thead>
                                                  <tr>
                                                  <th>No</th>
                                                  <th>Nama Obat</th>
                                                  <th>Gambar Obat</th>
                                                  <th>Harga</th>
                                                  <th>Action</th>
                                                  </tr>
                                            </thead>
                                        <tbody>   
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td>{{ $data->nama_obat }} </td>
                                                <td><img width="100" src="{{ asset('storage/' . $data->gambar)  }}"></td>
                                                <td> {{ $data->formatRupiah('harga_jual') }} </td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-success" href="{{ route('pelanggan.show', $data->id) }}">
                                                            <span data-feather="edit">Beli</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody> 
                                            </table>
                                        </div>
                                    </div>
                                </div>					 		  
                            </div>						
			            </div>
                    @endforeach
                    @else
                    <p style="margin-bottom:377px;" class="text-center fs-4">No Invoice Found.</p>
                    </div>
                    @endif
			    </div>
			  </div>
			</div>
		</div>
    </div>

@endsection