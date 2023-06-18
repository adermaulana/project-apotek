<html>

<head>
    <meta charset="utf-8">
    <title>Invoice Pembelian</title>
    <link rel="stylesheet" href="/invoice-html5/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
   <div class="page">
        <header>
            <!-- <h1><b>INVOICE</b></h1> -->
            <div class="flexbox">
                <div class="logo">
                    <img src="" alt="INVOICE"  >
                </div>

                <div class="sender">
                    <!-- <h1>Logos </h1> -->
                    <p> 
                        Mehdi Allali <br>
                        +213 561 349 993 <br>
                        mehdi.all.go@gmail.com
                    </p>
                </div>
                <div class="sender">
                    <p>
                        16000 Market Street <br>
                        Suite 1005 <br>
                        Philadelphia, PA 19103
                    </p>
                </div>
            </div>
        </header>
        <div class="flexbox invoice-details">
            <div class="recipient">
                <h3>Bill to</h3>
                <p>
                    Company Name <br> 
                    Full Name <br> 
                    Street Address <br>
                    City, State, Zip
                </p>
            </div>
            <div>
                <h3>Invoice Number</h3>
                <p>0001</p>
                <h3>Date</h3>
                <p data-today>09/12/2018</p>
            </div>
            <div>
                <h3>Total invoice</h3>
                <h1><span>IDR</span><span id="prefix">{{number_format($penjualan->order->total_price,0,',','.')  }}</span></h1>
            </div>
        </div>

        <hr>
        
        <table class="inventory">
            <thead>
                <tr>
                    <!-- <th width="5%"><span>N°</span></th> -->
                    <th width="45%"><span>Keterangan</span></th>
                    <th><span>Harga</span></th>
                    <th width="10%"><span>Jumlah</span></th>
                    <th><span>Total</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderlist as $data)
                <tr>
                    <td><span>{{ $data->obat->nama_obat }}</span></td>
                    <td><span >280.00</span> <span > DA</span> </td>
                    <td><span >{{ $data->order->banyak }}</span></td>
                    <td><span >IDR</span> <span > </span> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="balance">
            <tr>
                <th><span>TOTAL Harga :</span></th>
                <td><span>IDR</span> <span data-prefix>{{ $data->order->total_price }}</span> </td>
            </tr>
        </table>

    <div class="footer">
        <h1><span>Invoice</span></h1>
        <div style="text-align:center">
            <a href="https://github.com/scyrencop">Github</a> |
            <a href="https://behance.net/scyrencop">Behance</a> |
            <a href="https://twitter.com/scyrencop">Twitter</a> |
            <a href="https://fb.com/dream.h.go">Facebook</a> 

            <br>
        </div>
    </div>

   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/invoice-html5/js/main.min.js"></script>
</body>

</html>
