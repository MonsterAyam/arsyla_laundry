@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Tambah Data Pelanggan Baru</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr align="center">
                                <th style="width: 80px">No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($data))
                            <td colspan="6" align="center">Tidak Ada Produk!</td>
                            @endif
                            @foreach ($data as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_pelanggan }}</td>
                                <td>{{ $p->address }}</td>
                                <td>{{ $p->no_telp }}</td>
                                <td class="d-flex">
                                    <a href="/dashboard/master/pelanggan/{{ $p->id }}/edit" class="btn btn-warning border-0 mx-2">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form action="/dashboard/master/pelanggan/{{ $p->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data berikut?');" class="btn btn-danger mx-2">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                  </form>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->







    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengguna Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/dashboard/master/pelanggan" method="POST" class="form d-flex flex-wrap justify-content-between">
            @csrf
              <div class="col-lg-12">
                  <div class="form-group">
                      <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" id="username" class="form-control">
                  </div>
                  <div class="form-group">
                      <textarea name="address" placeholder="Alamat" id="" cols="3" rows="3" class="form-control"></textarea>
                </div>
                  <div class="form-group">
                      <input type="number" placeholder="Nomor Telepon" name="no_telp" id="" class="form-control">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary w-100 my-3">Simpan</button>                  
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>






@endsection