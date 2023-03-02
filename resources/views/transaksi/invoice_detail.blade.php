@extends('layout.main')

@section('container')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
        <span class="fas fa-edit fa-sm"></span>
        Ubah Status Transaksi
    </button>
    <tr>
        <td>
            <a class="btn btn-primary" href="https://api.whatsapp.com/send?phone=62{{ $data->no_telp }}&text=ARSYILA%20LAUNDRY%0AJ{{ Auth()->user()->no_telp }}%0ATgl%20:%20{{ $data->created_at }}%0ANama%20:%20{{ $data->pelanggan_id }}%0ACashier%20:%20{{ Auth()->user()->name }}%0AJenis%20Lapangan%20:%20{{ $data->lapangan }}%0AWaktu%20Main%20:%20{{ $data->waktu_main }}%0AHarga%20:%20{{ $data->tanggal_dibayar }}%0AJam%20Main%20:%20{{ $data->jam_main }}%0AStatus%20Pembayaran%20:%20{{ $data->status }}.">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                Kirim Notifikasi Selesai</a>
            </td>
        </tr>
    <a href="/dashboard/invoice/print/{{ $data_pg->id }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Cetak Nota</a>
</div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header bg-success py-3">
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item font-weight-bold">Nama Pelanggan : {{ $data_pg->pelanggan->nama_pelanggan }}</li>
                    <li class="list-group-item font-weight-bold">Nomor Telepon : {{ $data_pg->pelanggan->no_telp }}</li>
                    <li class="list-group-item font-weight-bold">Status Pemabayar : {{ $data_pg->status }}</li>
                    <li class="list-group-item font-weight-bold">Batas Pemabayaran : {{ $data_pg->batas_waktu }}</li>
                  </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No.</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Qty/Kg</th>
                                <th>Tanggal pesanan</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            @foreach ($data as $i)
                                
                            <tr>
                                <td style="width: 10px;">{{ $loop->iteration }}</td>
                                <td>{{ $i->produk->nama }}</td>
                                <td>{{ $i->produk->harga_jual }}</td>
                                <td>{{ $i->qty }}</td>
                                <td>{{ $i->invoice->batas_waktu }}</td>
                                <td>{{ "Rp " . number_format($i->total_akhir ,0,',','.'); }}</td>
                            </tr>
                            
                            @endforeach
                            <tr align="center" class="font-weight-bold">
                                <td colspan="7">Grand Total : {{ "Rp " . number_format($data_pg->grand_total ,0,',','.'); }}</td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <!-- /.container-fluid -->

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
          <form action="/dashboard/invoice/{{ $data_pg->id }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <select name="status" class="form-control">
                    <option value="sudah dibayar">sudah dibayar</option>
                    <option value="salah input">salah input</option>
                    <option value="diambil">sudah diambil</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
