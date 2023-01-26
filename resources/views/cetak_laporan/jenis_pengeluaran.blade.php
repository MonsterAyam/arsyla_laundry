<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card shadow mb-4">
        <h2 style="text-align:center; margin:0 auto; font-weight:bold; border-bottom:4px solid black;">Arsyila Laundry</h2>
        <br><br>
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
</body>
</html>