@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="/dashboard/invoice/{{ $data->id }}" method="POST" class="form d-flex flex-wrap justify-content-center">
                    @method('put')
                    @csrf
                    <div class="col-lg-5">
                      <div class="form-group">
                          <label for="kodeinvoice">Kode invoice</label>
                          <input type="text" min="0" disabled value="{{ old('id', $data->id) }}" name="id" id="kodeinvoice" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-group">
                          <label for="nama">Nama Pelanggan</label>
                          <input type="text" disabled value="{{ old('pelanggan', $data->pelanggan->nama_pelanggan) }}" name="pelanggan" id="nama" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option>belum dibayar</option>
                                <option>salah input</option>
                                <option>sudah dibayar</option>
                                <option>diambil</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" disabled value="{{ old('total', $data->grand_total) }}" name="total" id="total" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-5 mt-3 mx-auto">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 mb-3">Ubah Data</button>
                            <a href="/dashboard/invoice" class="btn btn-secondary w-100">Kembali</a>
                        </div>
                    </div>               
                  </div>
            </div>
        </div>

 
    <!-- /.container-fluid -->

  



@endsection