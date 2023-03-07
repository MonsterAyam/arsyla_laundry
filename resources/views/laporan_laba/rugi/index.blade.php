@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Pendapatan dan Pengeluaran</h1>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form class="form-inline">
                    <label class="fs-1 p-3">Tanggal</label>
                    <input type="date" name="tanggal_dari" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                    <input type="date" name="tanggal_sampai" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                <a href="/dashboard/laporan/cetak_pdf" class="btn btn-primary">Cetak Laporan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-success text-light">
                            <tr align="center">
                                <th>No.</th>
                                <th>Per-Tanggal</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @if (empty($pendapatan))
                            <td colspan="6" align="center">Tidak Ada Produk!</td>
                            @endif  
                           @foreach ($pendapatan as $p)
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $p->per_bulan }}</td>
                               <td>{{ "Rp " . number_format($p->total_pendapatan ,0,',','.'); }}</td>
                           </tr>
                        @endforeach
                        </tbody>
                        <thead class="bg-gradient-danger text-light">
                            <tr align="center">
                                <th>No.</th>
                                <th>Per-Tanggal</th>
                                <th>Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                           @foreach ($kerugian as $k)  
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $k->per_bulan }}</td>
                               <td>{{ "Rp " . number_format($k->total_kerugian ,0,',','.'); }}</td>
                           </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->




@endsection