<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css'); }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css'); }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css'); }}">
</head>

<body id="page-top">


<div class="container-fluid">
            <h2 style="text-align:center; margin:0 auto; font-weight:bold; border-bottom:4px solid black;">Arsyila Laundry</h2>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <ul class="list-group list-group-flush rounded">
                    <li style="list-style: none">Nama Pelanggan : {{ $data_pg->pelanggan->nama_pelanggan }}</li>
                    <li style="list-style: none">Nomor Telepon : {{ $data_pg->pelanggan->no_telp }}</li>
                    <li style="list-style: none">Status Pemabayar : {{ $data_pg->status }}</li>
                    <li style="list-style: none">Batas Pemabayaran : {{ $data_pg->batas_waktu }}</li>
                  </ul>
            </div>
            <br><br>
            <div class="card-body">
                <div class="table-responsive">
                    <table border="1" cellpadding="2" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Qty/Kg</th>
                                <th>Tanggal Selesai</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i)
                                
                            <tr align="center">
                                <td style="width: 10px;">{{ $loop->iteration }}</td>
                                <td>{{ $i->produk->nama }}</td>
                                <td>{{ $i->produk->harga_jual }}</td>
                                <td>{{ $i->qty }}</td>
                                <td>{{ $i->invoice->batas_waktu }}</td>
                                <td>{{ $i->total_akhir }}</td>
                            </tr>
                            
                            @endforeach
                            <br>
                            <tr align="center" class="font-weight-bold">
                                <td style="font-weight: bold" colspan="7">Grand Total : {{ $data_pg->grand_total }}</td> 
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <div class="row">
                        <h3><b>PERHATIAN!!</b></h3>
                        <ol>
                            <li>Komplain kami layani 1 X 24 jam disertakan Nota Transaksi</li>
                            <li>Cucian yang tidak layak dikerjakan akan dikembalikan / dibuang</li>
                        </ol>
                        <h3><b>KAMI TIDAK BERTANGGUNG JAWAB ATAS :</b></h3>
                        <ol>
                            <li>Susut atau luntur karena sifat bahannya</li>
                            <li>Barang berharga yang terbawa didalam cucian</li>
                            <li>Cucian hilang atau rusak dalam musibah banjir atau kebakaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



   <!-- Bootstrap core JavaScript-->
   <script src="{{ asset('vendor/jquery/jquery.min.js'); }}"></script>
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ asset('js/sb-admin-2.min.js'); }}"></script>


   <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-searchbox.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.js-searchBox').searchBox({
                  mode: 2,
                  optionMaxSize: 50,
                  elementWidth: '200',
                  selectCallback: null
            });
        });

     
    </script>

</body>

</html>