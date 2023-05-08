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
			         <a  class="nav-link" href="/" role="tab"><i class=""></i>Obat</a>
            	<div class="border text-dark border-bottom"></div>
			        <a  class="nav-link" href="/list-invoice" role="tab"><i class=""></i> My Invoice</a>
			      <div  class="border text-dark border-bottom"></div>
                  <form action="/logout" method="post">
                    @csrf
                  <button type="submit" class="nav-link text-dark p-3"> Log Out</button>
                  </form>

			    </div>
			  </div>


			  <div style="margin-top:70px;" class="col-md-7">
			    <div class="tab-content" id="v-pills-tabContent">
			      <div class="mt-3 mt-md-1 tab-pane fade active show" id="v-pills-booking_list" role="tabpanel" aria-labelledby="v-pills-messages-tab">
			      		<h4>My Invoice</h4>
                        <hr>
                        @if($penjualan->count())
                        @foreach($penjualan as $booking)
			      		<div id="container-booking-list">
                            <div id="no-data-row" class="card mb-3  nodata">						 
                                <div class="row no-gutters">						    					    
                                        <div class="col-md-12">						      
                                        <div class="card-header ">							  	
                                            <div class="row">								    
                                                <div class="col text-left text-muted">Invoice ID : <strong>
                                                    {{ $booking->id }}
                                                </strong>
                                            </div>								    
                                            <div class="row mt-1">
                                            <div class="col text-left align-self-center">
                                                @if($booking->status == 'Sudah Bayar')
                                                <span class="text-decoration-none badge bg-success">{{ $booking->status }} <i class="fas fa-ban"></i></span>
                                                @elseif($booking->status == 'Pending')
                                                <span class="text-decoration-none badge bg-warning">{{ $booking->status }} <i class="fas fa-ban"></i></span>
                                                @else
                                                <span class="text-decoration-none badge bg-danger">{{ $booking->status }} <i class="fas fa-ban"></i></span>
                                                @endif
                                            </div>							    
                                            <div style="text-align:right; margin-top:-25px; " class="col-3">
                                                <strong class="bayar"  >Rp {{ number_format($booking->total,0,',','.') }}
                                                    <a style="margin-left:50px;" href="/list-invoice/detail/{{ $booking->id }}" class="btn-link ">See Details</a>
                                            </strong>
                                                
                                            </div>						    					    
                                        </div>
                                        							  
                                        </div>
                                        </div>
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