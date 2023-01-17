@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>

    <a href="/dashboard/invoice/print/{{ $data_pg->id }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Cetak Nota</a>
</div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-success py-3">
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item font-weight-bold">Nama Pelanggan : {{ $data_pg->pelanggan->nama_pelanggan }}</li>
                    <li class="list-group-item font-weight-bold">Nomor Telepon : {{ $data_pg->pelanggan->no_telp }}</li>
                    <li class="list-group-item font-weight-bold">Status Pemabayar : {{ $data_pg->status }}</li>
                    <li class="list-group-item font-weight-bold">Batas Pemabayaran : {{ $data_pg->batas_waktu }}</li>
                  </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No.</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Qty/Kg</th>
                                <th>Tanggal pesanan</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            @foreach ($data as $i)
                                
                            <tr>
                                <td style="width: 10px;">{{ $loop->iteration }}</td>
                                <td>{{ $i->produk->nama }}</td>
                                <td>{{ $i->produk->harga_jual }}</td>
                                <td>{{ $i->qty }}</td>
                                <td>{{ $i->invoice->batas_waktu }}</td>
                                <td>{{ $i->total_akhir }}</td>
                            </tr>
                            
                            @endforeach
                            <tr align="center" class="font-weight-bold">
                                <td colspan="7">Grand Total : {{ $data_pg->grand_total }}</td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <!-- /.container-fluid -->


@endsection
