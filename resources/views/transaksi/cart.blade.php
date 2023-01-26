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
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <form action="/dashboard/cart" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="#dropdown" class="text-dark" style="width:600px">Pilih Produk</label>
                                    <select name="lang" class="js-searchBox" id="dropdown" style="display: none;" >
                                        <option value="" disabled selected></option>
                                        @foreach ( $produk as $pk )
                                        <option value="{{ $pk->id }}">{{ $pk->kode }} ({{ $pk->harga_jual }}) {{ $pk->jenis_produk }} </option>
                                        @endforeach
                                    </select>
                                    @error('lang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="number" placeholder="Qty" step="0.1" min="0" name="qty_produk" id="" class="form-control rounded-0 border-dark mt-3" style="width: 39%">
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
                                <input type="datetime-local" required name="batas_waktu" class="form-control" id="">
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
                                        @if (empty($cart))
                                        <tr>
                                            <td colspan="7" align="center">Tidak Ada Produk!</td>
                                        </tr>
                                            @else
                                            <?php $_GLOBALS['grandTotal'] = 0;  ?>
                                            @foreach ($cart as $ct =>$val)
                                            <?php 
                                                $subTotal = $val['qty_produk'] * $val['harga_produk'];
                                            ?>
                                            <tr>
                                            <td>
                                                <a class="btn btn-sm btn-danger font-weigth-bold" href="/dashboard/cart/hapus/{{ $ct }}">X</a>
                                            </td>
                                            <td scope="row" style="width: 50px">
                                                <input type="text" disabled value="{{ $loop->iteration }}" class="form-control" style="width: 50px">
                                            </td>
                                                <td>
                                                    <input type="text" disabled value="{{ $val['kode_produk'] }}" class="form-control" id="">
                                                </td>
                                                <td>
                                                    <input type="text" disabled value="{{ $val['jenis_produk'] }}" class="form-control" id="">
                                                </td>
                                                <td>
                                                    <input type="number" min="0" class="form-control" disabled value="{{ $val['qty_produk'] }}">
                                                </td>
                                                <td>
                                                    <input type="text" disabled value="{{ $val['harga_produk'] }}" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" disabled value="{{ $subTotal }}" class="form-control" id="harga_produk">
                                                </td>
                                                <?php 
                                                    $_GLOBALS['grandTotal'] += $subTotal;
                                                ?>
                                            </tr>
                                            @endforeach
                                            @endif

                                    </tbody>
                                </table>
                            </div>

                            <div class="row d-flex justify-content-start">
                                <div class="col-lg-5">
                                    <div class="form-group my-3"  style="display:flex; align-content: center">
                                        <select name="lang" class="js-searchBox" style="display: none;">
                                            <option>Pelanggan</option>
                                            @foreach ( $pelanggan as $pg )
                                            <option value="{{ $pg->id }}">{{ $pg->nama_pelanggan }}({{ $pg->no_telp }})</option>
                                            @endforeach
                                        </select>
                                    {{-- {{ $val['harga_produk']}} --}}
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="" class="font-weight-bold h6 text-dark mt-2 mr-3">Status Pembayaran : </label>
                                            <select name="status" class="form-control" style="width:40%" id="">
                                                <option>belum dibayar</option>
                                                <option>sudah dibayar</option>
                                            </select>
                                    </div>
                                </div>
                                
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

    <script>
           const harga = document.querySelector("#grand")
           const qty = document.querySelector("#qty_produk")
            
           console.log(harga.value);
    </script>

@endsection