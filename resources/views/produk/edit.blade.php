@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="/dashboard/master/produk/{{ $data->id }}" method="POST" class="form d-flex flex-wrap justify-content-center">
                    @method('put')
                    @csrf
                    <div class="col-lg-5">
                      <div class="form-group">
                          <label for="kodeinvoice">Kode Produk</label>
                          <input type="text" min="0" disabled value="{{ old('id', $data->id) }}" name="id" id="id" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-group">
                          <label for="nama">Jenis Produk</label>
                          <select value="{{ old('jenis_produk', $data->jenis_produk) }}" name="jenis_produk" class="form-control">
                                <option>SATUAN</option>
                                <option>KILOAN</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="status">Kode</label>
                            <input type="text" name="kode" value="{{ $data->kode }}" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="total">Nama</label>
                            <input id="" name="nama" value="{{ $data->nama }}" class="form-control">
                        </div>
                      </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="total">Harga</label>
                            <input id="" name="harga_jual" value="{{ $data->harga_jual }}" class="form-control">
                        </div>
                      </div>
                      <div class="w-100 mt-3">
                        <div class="form-group col-5 mx-auto">
                            <button type="submit" class="btn btn-primary w-100 mb-3">Ubah Data</button>
                            <a href="/dashboard/master/produk" class="btn btn-secondary w-100">Kembali</a>
                        </div>
                    </div>               
                  </div>
            </div>
        </div>

 
    <!-- /.container-fluid -->

  



@endsection