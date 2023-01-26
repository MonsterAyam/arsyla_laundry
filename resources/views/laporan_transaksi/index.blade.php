@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-3">
                        <a href="/dashboard/cetak_laporan/laporan_transaksi/transaksi_pdf" class="btn btn-primary">Cetak Laporan</a>
                    </div>
                    <form class="form-inline">
                        <label class="fs-1 p-3">Tanggal</label>
                        <input type="date" name="tanggal_dari" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                        <input type="date" name="tanggal_sampai" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-primary text-light">
                            <tr>
                                <th style="width: 10px;">No.</th>
                                <th>Status</th>
                                <th>Kode Invoice</th>
                                <th>Pelanggan</th>
                                <th>Tanggal pesanan</th>
                                <th>Batas Waktu</th>
                                <th>Tanggal Dibayar</th>
                                <th class="text-center" style="width: 120px">Total</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @if(!empty($data))
                            <tr>
                                @foreach ($data as $i)
                                <td style="width: 10px;">{{ $data->firstItem()+$loop->index }}</td>
                                <td>
                                    @if ($i->status === 'belum dibayar')
                                       <p class="badge badge-primary font-weight-bold p-2">{{ $i->status }}</p>
                                    @elseif ($i->status === 'salah input')
                                       <p class="badge badge-danger font-weight-bold p-2">{{ $i->status }}</p>
                                     @else
                                       <p class="badge badge-success font-weight-bold p-2">{{ $i->status }}</p>
                                    @endif
                                </td>
                                <td>INV00{{ $i->id }}</td>
                                <td>{{ $i->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $i->created_at }}</td>
                                <td>{{ $i->batas_waktu }}</td>
                                @if ($i->status === 'sudah dibayar' || $i->status === 'diambil')         
                                <td>{{ $i->tanggal_dibayar }}</td>
                                @else
                                <td>menunggu</td>
                                @endif
                                <td>{{"Rp " . number_format($i->grand_total,0,',','.'); }}</td>
                            </tr>
                            
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="9">Tidak ada data transaksi!</td>
                                </tr>
                            @endif
                                
                          
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>

    </div>



    <!-- /.container-fluid -->


@endsection
