@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jenis Pengeluaran</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form class="form-inline">
                    <label class="fs-1 p-3">Tanggal</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                    <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                  </form>
                <button class="btn btn-primary">Filter</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-success text-light">
                            <tr align="center">
                                <th>No.</th>
                                <th>Per-Bulan</th>
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
                               <td>{{ $p->total_pendapatan }}</td>
                           </tr>
                        @endforeach
                        </tbody>
                        <thead class="bg-gradient-danger text-light">
                            <tr align="center">
                                <th>No.</th>
                                <th>Per-Bulam</th>
                                <th>Kerugian</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                           @foreach ($kerugian as $k)  
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $k->per_bulan }}</td>
                               <td>{{ $k->total_kerugian }}</td>
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