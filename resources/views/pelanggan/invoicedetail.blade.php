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
			
			<div class="row justify-content-center">
			  <div class="col-md-3 " style="margin-top:70px;" > 
			    <div class="nav flex-column nav-pills bg-white border rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <div class="nav-link p-3 text-dark" href="#">
		           <div class="text-center">
		           <img class="rounded-circle" src="https://bookingciremai.menlhk.go.id/kawasan-sso/images/user.png?1670035419402787" width="50px"> 
		           </div>
		           <div class="text-center"><strong>{{ auth('pelanggan')->user()->name }}</strong> <div class="text-muted small">{{ auth('pelanggan')->user()->email }}</div>
		           </div>
		          </div>
		          <div class="border text-dark border-bottom"></div>
			      <a  class="nav-link" href="/list-invoice" role="tab"><i class=""></i> My Invoice</a>
			      <div class="border text-dark border-bottom"></div>
                  <form action="/logout-user" method="post">
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
                        <center>

          <div class="main" bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 50%;">
          <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
          <tbody>
          <tr>
            <td width="5px" style="padding: 0;"></td>
            <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="padding: 0;">
                                    <img
                                        src="/assets/img/medical-remove.png"
                                        alt=""
                                        style="height: 50px; max-width: 100%; width: 157px;"
                                        height="50"
                                        width="157"
                                    />
                    
                            </td>
                            <td style="color: #999; font-size: 12px; padding: 0; text-align: center;" align="right">
                                Pharmacy<br />No. Penjualan :
                                {{ $penjualan->id }}<br />
                                {{ $penjualan->created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="5px" style="padding: 0;"></td>
          </tr>

          <tr>
            <td width="5px" style="padding: 0;"></td>
            <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                    <tbody>
                        <tr>
                            <td width="50%" style="padding: 20px;"><strong style="color: #333; font-size: 24px;">Penjualan Obat</strong></td>
                            <td align="right" width="50%" style="padding: 20px;"><span class="il"></span></td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="padding: 0;"></td>
            <td width="5px" style="padding: 0;"></td>
          </tr>
          <tr>
            <td width="5px" style="padding: 0;"></td>
            <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                    <tbody>
                        <tr>
                            <td valign="top"  style="padding: 20px;">
                                <h3
                                    style="
                                        border-bottom: 1px solid #000;
                                        color: #000;
                                        font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                        font-size: 18px;
                                        font-weight: bold;
                                        line-height: 1.2;
                                        margin: 0;
                                        margin-bottom: 15px;
                                        padding-bottom: 5px;
                                    "
                                >
                                    Ringkasan
                                </h3>
                                <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 5px 0;">Nama Obat</td>
                                            <td align="right" style="padding: 5px 0;">{{ $penjualan->obat->nama_obat }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 0;">Banyak</td>
                                            <td align="right" style="padding: 5px 0;"> {{ $penjualan->banyak }}</td>
                                        </tr>
                                        <tr>
                                            <td  style="padding: 5px 0;" >Tanggal Beli</td>
                                            <td align="right" style="padding: 5px 0;"> {{ $penjualan->tanggal_jual }}</td>
                                        </tr>
                                        <tr>
                                            <td align="center"style="padding: 0px 127px 10px 0px;  ">Harga </td>
                                            <td align="right" style="padding:0px 0px 9px 0px;"><span style="">{{ $penjualan->formatRupiah('harga_jual') }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="mb-4" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 10px 0;">Total Bayar</td>
                                            <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 10px 0;"> {{ $penjualan->formatRupiah('total') }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="5px" style="padding: 0;"></td>
          </tr>

          <tr style="color: #666; font-size: 12px;">
            <td width="5px" style="padding: 10px 0;"></td>
            <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td width="40%" valign="top" style="padding: 10px 0;">
                                <h4 style="margin-left: 20px;">Terima Kasih</h4>
                            </td>
                            <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                            <td width="40%" valign="top" style="padding: 10px 0;">
                                <h4 style="margin: 0; font-size:16px;"><span class="il">Pharmacy</span> Makassar</h4>
                                <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                    <a href="#">Testimoni, Kec. Suka - Suka, Kota Makassar, Sulawesi Selatan 92171</a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="5px" style="padding: 10px 0;"></td>
          </tr>
          </tbody>
          </table>
          </center>
			    </div>
			  </div>
			</div>
		</div>
    </div>

@endsection