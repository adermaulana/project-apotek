@extends('dashboard.layouts.login')

@section('container')

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Checkout</strong>
          </div>
        </div>
      </div>
    </div>

    @if ($message = Session::get('error'))
    <div style="margin-top:30px; margin-left:10px;" class="alert alert-danger alert-dismissible fade show col-lg-11" role="alert">
            {{ session('error') }}
          </div>
    @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
        @endif

        <div class="site-section">
            <div class="container">
            <div class="row">
            <div class="col-md-12">
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
           <form action="{{ route('checkout') }}" method="post">
            @csrf
            <div class="form-group row">
            <div class="col-md-12">
            <label for="name" class="text-black">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="form-group row">
            <div class="col-md-12">
            <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Street address">
            @error('address')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            <div class="form-group row mb-5">
            <div class="col-md-6">
            <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            <div class="col-md-6">
            <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
            @error('phone')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="row mb-5">
            <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Pesananmu</h2>
            <div class="p-3 p-lg-5 border">
            <table class="table site-block-order-table mb-5">
            <thead>
            <tr><th>Product</th>
            <th>Total</th>
            </tr></thead>
            <tbody>
              @foreach($chart as $data)
            <tr>
            <td>{{ $data->obat->nama_obat }}<strong class="mx-2">x</strong>{{ $data->jumlah }}</td>
            <td>Rp. {{ number_format($data->obat->harga_jual,0,',','.') }}</td>
            </tr>
            @endforeach
            <tr>
            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
            <td class="text-black font-weight-bold"><strong>Rp. {{ number_format($total_harga_chart,0,',','.') }}</strong></td>
            <input type="hidden" name="total_price" value="{{ $total_harga_chart }}" >
            <input type="hidden" name="status">
            <input type="hidden" name="tanggal_jual" value=" {{ date('d-m-Y') }} " id="date-input">
            <input type="hidden" id="banyak" name="banyak" value="{{ $banyak->jumlah }}" id="date-input">
            </tr>
            </tbody>
            </table>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Place
            Order</button>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            
            </div>
            </div>

    <div class="site-section bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-white mb-4">Kantor</h2>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
        </div>
      </div>
      
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">

$('#name').on('change',function(){
    const harga = $('#harga').val();
    const banyak = $('#banyak').val();
    const beli = $('#beli').val();

    const total4 = banyak * harga;
    const total5 = banyak * beli;

    $('#total').val(`${total4}`);
    $('#total_beli').val(`${total5}`);
  })
  

</script>

@endsection


