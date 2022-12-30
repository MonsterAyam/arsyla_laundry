@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jenis Pengeluaran</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="/dashboard/master/jenis_pengeluaran/{{ $data->id }}" method="POST" class="form d-flex flex-wrap justify-content-center">
                    @method('put')
                    @csrf
                    <div class="row w-100 d-flex justify-content-around">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="kodeinvoice">Id</label>
                                <input type="text" min="0" disabled value="{{ old('id', $data->id) }}" name="id" id="kodeinvoice" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="nama">Nama Jenis Pengeluaran</label>
                                <input type="text" value="{{ old('nama_jenis_pengeluaran', $data->nama_jenis_pengeluaran) }}" name="nama_jenis_pengeluaran" id="nama" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row w-100 d-flex justify-content-around">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="status">Total Harga</label>
                                <input type="number" name="total_harga" value="{{ $data->total_harga }}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="status">keterangan</label>
                                <input type="text" name="keterangan" value="{{ $data->keterangan }}" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-10 mt-3 mx-auto">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 mb-3">Ubah Data</button>
                            <a href="/dashboard/master/jenis_pengeluaran" class="btn btn-secondary w-100">Kembali</a>
                        </div>
                    </div>               
                </div>
            </div>
        </div>

    <!-- /.container-fluid -->





@endsection