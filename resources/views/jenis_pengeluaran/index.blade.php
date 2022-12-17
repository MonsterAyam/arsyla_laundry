@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jenis Pengeluaran</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">+ Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-danger text-light">
                            <tr align="center">
                                <th style="width: 30px">No.</th>
                                <th>Nama Jenis Pengeluaran</th>
                                <th style="width:200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if (empty($data))
                          <td colspan="6" align="center">Tidak Ada Produk!</td>
                          @endif
                            @foreach ($data as $jp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jp->nama_jenis_pengeluaran }}</td>                              
                                <td align="center">
                                    <a href="/dashboard/master/jenis_pengeluaran/{{ $jp->id }}/edit" class="btn btn-warning border-0 mx-2">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger border-0">
                                      
                                        <i class="fas fa-fw fa-trash"></i>

                                    </a>
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
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengeluaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/dashboard/master/jenis_pengeluaran" method="POST" class="form d-flex flex-wrap justify-content-between">
            @csrf
              <div class="col-lg-12">
                  <div class="form-group">
                   <input type="text" name="nama_jenis_pengeluaran" id="" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="number" name="total_harga" placeholder="Total" id="namaProduk" class="form-control">
                </div>
                  <div class="form-group">
                    <textarea name="keterangan" id="" style="resize:none" placeholder="Keterangan" cols="3" rows="3" class="form-control"></textarea>
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