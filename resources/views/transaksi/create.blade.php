@extends('layout.main')

@section('container')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Penjualan</h1>
</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header  py-3">
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <form action="/dashboard/cart" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select name="lang" class="js-searchBox" style="display: none;">
                                        <option value="--Pilih Produk--" disabled selected>--Pilih Produk--</option>
                                        @foreach ( $produk as $pk )
                                        <option value="{{ $pk->id }}">{{ $pk->kode }}({{ $pk->harga_jual }}) </option>
                                        @endforeach
                                    </select>
                                    @error('lang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="number" required placeholder="Qty" step="0.1" min="0" name="qty_produk" id="" class="form-control rounded-0 border-dark mt-3" style="width: 39%">
                                    @error('qty_produk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info font-weight-bold">Proses</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form action="/dashboard/cart/transaksi" method="POST">
                        @csrf
                    <div class="col-lg-8">
                        <div class="form-group d-flex" >
                            <label for="" class="font-weight-bold h6 text-dark mt-2 mr-3">Batas waktu</label>
                            <input type="datetime-local" name="batas_waktu" class="form-control" id="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary text-light">
                          <tr>
                            <th  scope="col">Aksi</th>
                            <th  scope="col">No .</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Jenis Produk</th>
                            <th scope="col">Qty/Kg</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" align="center">Tidak Ada Produk!</td>
                            </tr>
                        </tbody>
                      </table>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-5 mx-auto">
                        <div class="form-group">
                            <label for="" class="font-weight-bold h5 text-dark text-center">Grand Total </label>
                            <input type="number" @if (!empty($_GLOBALS['grandTotal']))
                            value="{{ $_GLOBALS['grandTotal'] }}"
                            @endif  disabled id="grand" class="form-control">
                        </div>
                        @if (!empty($_GLOBALS['grandTotal']))
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">SIMPAN</button>
                         </div>
                         @endif
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>

 
    <!-- /.container-fluid -->



@endsection