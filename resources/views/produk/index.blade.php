@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Produk</h1>
</div>
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    <div class="input-group">
        <input type="search" name="search" class="form-control" id="inlineFormInputGroupUsername">
        <button type="submit" class="btn btn-primary rounded-0">Search</button>
    </div>
</form>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">+ Tambah Data</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-light">
                            <tr align="center">
                                <th style="width: 80px">No.</th>
                                <th>Jenis Produk</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Harga Jual</th>
                                @can('admin')
                                    <th style="width:150px">Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($data))
                                <td colspan="6" align="center">Tidak Ada Produk!</td>
                            @endif
                            @foreach ($data as $pr) 
                            <tr>

                            </tr>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pr->jenis_produk }}</td>
                                <td>{{ $pr->kode }}</td>
                                <td>{{ $pr->nama }}</td>
                                <td>{{ $pr->harga_jual }}</td>
                                @can('admin')
                                    <td class="d-flex">
                                        <a href="/dashboard/master/produk/{{ $pr->id }}/edit" class="btn btn-warning border-0 mx-2">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <form action="/dashboard/master/produk/{{ $pr->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data berikut?');" class="btn btn-danger border-0">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endcan
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/dashboard/master/produk" method="POST" class="form d-flex flex-wrap justify-content-between">
            @csrf
              <div class="col-lg-12">
                  <div class="form-group">
                      <input type="text" name="kode" placeholder="Kode Produk" id="kodeProduk" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="text" name="nama" placeholder="Nama Produk" id="namaProduk" class="form-control">
                </div>
                  <div class="form-group">
                      <select name="jenis_produk" class="form-control" id="jenisProduk">
                        <option>SATUAN</option>
                        <option>KILOAN</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <input type="number" min="0" placeholder="Harga Produk" name="harga_jual" id="hargaProduk" class="form-control">
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