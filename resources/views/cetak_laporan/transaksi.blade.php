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
                <table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-light">
                        <tr align="center">
                            <th style="width: 80px">No.</th>
                            <th>Status</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pr) 
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pr->status }}</td>
                            <td>{{ $pr->pelanggan->nama_pelanggan }}</td>
                            <td>{{ $pr->created_at }}</td>
                            <td>{{ "Rp " . number_format($pr->grand_total ,0,',','.'); }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>