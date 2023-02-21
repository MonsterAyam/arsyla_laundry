@extends('layout.main')

@section('container')

 <!-- Page Heading --> 
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jenis Pengeluaran</h1>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row d-flex justify-content-between">
                <div class="col-3">
                  <a class="btn btn-primary" href="/dashboard/cetak_laporan/laporan_jenis_pengeluaran/jenis_pengeluaran_pdf">Cetak</a>
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
                        <thead class="bg-primary text-light">
                            <tr align="center">
                                <th style="width: 30px">No.</th>
                                <th>Nama Jenis Pengeluaran</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if (empty($data))
                          <td colspan="6" align="center">Tidak Ada Produk!</td>
                          @endif
                            @foreach ($data as $jp)
                            <tr>
                                <td>{{ $data->firstItem()+$loop->index }}</td>
                                <td>{{ $jp->nama_jenis_pengeluaran }}</td>          
                                <td>{{ $jp->created_at }}</td>          
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
                   <input type="text" required name="nama_jenis_pengeluaran" id="" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="number" required name="total_harga" placeholder="Total" id="namaProduk" class="form-control">
                </div>
                  <div class="form-group">
                    <textarea name="keterangan" required id="" style="resize:none" placeholder="Keterangan" cols="3" rows="3" class="form-control"></textarea>
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