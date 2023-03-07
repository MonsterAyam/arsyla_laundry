<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card-body">
        <h1 style="text-align: center;border-bottom:3px solid black;">LAPORAN PENDAPATAN DAN PENGELUARAN</h1>
        <div class="table-responsive">
            <table border="1" cellpadding="2" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-gradient-success text-light">
                    <tr align="center">
                        <th>No.</th>
                        <th>Per-Bulan</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @if (empty($pendapatan))
                    <td colspan="6" align="center">Tidak Ada Produk!</td>
                    @endif  
                   @foreach ($pendapatan as $p)
                   <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $p->per_bulan }}</td>
                       <td>{{ "Rp " . number_format($p->total_pendapatan ,0,',','.'); }}</td>
                   </tr>
                @endforeach
                </tbody>
                <thead class="bg-gradient-danger text-light">
                    <tr align="center">
                        <th>No.</th>
                        <th>Per-Bulan</th>
                        <th>Pengeluaran</th>
                    </tr>
                </thead>
                <tbody align="center">
                   @foreach ($kerugian as $k)  
                   <tr>
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $k->per_bulan }}</td>
                       <td>{{ "Rp " . number_format($k->total_kerugian ,0,',','.'); }}</td>
                   </tr>
                @endforeach
                </tbody>
            </table>
            <h3 style="text-align:right">Dicetak oleh : {{ Auth()->user()->name }}</h3>
        </div>
    </div>
</body>
</html>