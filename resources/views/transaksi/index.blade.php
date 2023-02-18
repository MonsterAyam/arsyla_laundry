@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row d-flex justify-content-between">
                    <div class="col-3">
                        <a href="/dashboard/invoice/create" class="btn btn-primary">+ Tambah Transaksi</a>
                    </div>
                    <div class="col-2">
                            {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 mx-3">
                                <div class="input-group">
                                    <input type="search" name="nameSearch" class="form-control" id="inlineFormInputGroupUsername">
                                    <button type="submit" class="btn btn-primary rounded-0">Search</button>
                                </div>
                            </form> --}}
                            <!-- Button trigger modal -->
                         <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary w-100 rounded-0" data-toggle="modal" data-target="#exampleModal">
                               Filter <span class="fas fa-fw fa-filter"></span>
                            </button>
                           
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-primary text-light">
                            <tr>
                                <th style="width: 10px;">No.</th>
                                <th>Status</th>
                                <th>Kode Invoice</th>
                                <th>Pelanggan</th>
                                <th>Tanggal pesanan</th>
                                <th>Batas Waktu</th>
                                <th>Tanggal Dibayar</th>
                                <th class="text-center" style="width: 120px">Total</th>
                                <th>Nota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @if(!empty($data))
                            <tr>
                                @foreach ($data as $i)
                                <td style="width: 10px;">{{ $data->firstItem()+$loop->index }}</td>
                                <td>
                                    @if ($i->status === 'belum dibayar')
                                       <p class="badge badge-primary font-weight-bold p-2">{{ $i->status }}</p>
                                    @elseif ($i->status === 'salah input')
                                       <p class="badge badge-danger font-weight-bold p-2">{{ $i->status }}</p>
                                     @else
                                       <p class="badge badge-success font-weight-bold p-2">{{ $i->status }}</p>
                                    @endif
                                </td>
                                <td>INV00{{ $i->id }}</td>
                                <td>{{ $i->nama_pelanggan }}</td>
                                <td>{{ $i->created_at }}</td>
                                <td>{{ $i->batas_waktu }}</td>
                                @if ($i->status === 'sudah dibayar' || $i->status === 'diambil')         
                                <td>{{ $i->tanggal_dibayar }}</td>
                                @else
                                <td>menunggu</td>
                                @endif
                                <td>{{"Rp " . number_format($i->grand_total,0,',','.'); }}</td>
                                <td>
                                    <a href="/dashboard/invoice/print/{{ $i->id }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i>Nota</a>
                                </td>
                                <td class="p-4" style="display: flex;">
                                    <a href="/dashboard/invoice/detail/{{ $i->id }}" class="btn btn-sm btn-primary border-0 mx-1">
                                        <i class="fas fa-fw fa-info"></i>
                                    </a>
                                    <a href="/dashboard/invoice/{{ $i->id }}/edit" class="btn btn-sm btn-warning border-0 mx-1">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    @can('admin')
                                        <form action="/dashboard/invoice/{{ $i->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Anda yakin ingin menghapus record berikut?');" class="btn btn-sm btn-danger mx-1">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="9">Tidak ada data transaksi!</td>
                                </tr>
                            @endif
                                
                          
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="form-group">
                <label for="">Nama Pelanggan : </label>
                <input type="search" name="pelanggan" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanggal Mulai : </label>
                <input type="date" name="date-dari" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tanggal Sampai : </label>
                <input type="date" name="date-sampai" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">Save changes</button>
            <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
