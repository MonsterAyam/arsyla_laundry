@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if ($data->role_id)
                <h4 class="font-weigth-bold text-dark">Administrator</h4>
                @else
                <h4 class="font-weigth-bold text-dark">Cashier</h4>
                @endif
            </div>
            <div class="card-body">
                <form action="/dashboard/user/{{ $data->id }}" method="POST" class="form d-flex flex-wrap justify-content-center">
                    @method('put')
                    @csrf
                    <div class="col-lg-10">
                      <div class="form-group">
                          <label for="nama">Username</label>
                          <input type="text" value="{{ old('username', $data->username) }}" name="username" id="nama" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-10">
                      <div class="form-group">
                          <label for="nama">Nama Pengguna</label>
                          <input type="text" value="{{ old('name', $data->name) }}" name="name" id="nama" class="form-control">
                      </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="status">Email</label>
                            <input type="email" name="email" value="{{ old('email'), $data->email}}" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="total">Alamat</label>
                            <textarea name="address" id="" style="resize: none" cols="3" rows="3" class="form-control">{{ old('address'), $data->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="status">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group d-flex">
                            <label for="kodeinvoice">Administrator</label>
                            <input type="radio" style="width:20px" value="1" name="role_id" id="" class="form-control mx-2">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group d-flex">
                            <label for="kodeinvoice">Cashier</label>
                            <input type="radio" style="width:20px" value="0" name="role_id" id="" class="form-control mx-2">
                        </div>
                    </div>
                      <div class="col-lg-10 mt-3 mx-auto">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 mb-3">Ubah Data</button>
                            <a href="/dashboard/master/pelanggan" class="btn btn-secondary w-100">Kembali</a>
                        </div>
                    </div>               
                  </div>
            </div>
        </div>

 
    <!-- /.container-fluid -->

  



@endsection