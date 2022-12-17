@extends('layout.main')

@section('container')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
</div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Tambah Data Pengguna</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-warning text-light">
                            <tr align="center">
                                <th>No.</th>
                                <th>Role Name</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $pg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if ( $pg->role_id )              
                                <td>Administrator</td>
                                @else
                                <td>Cashier</td>
                                @endif
                                <td>{{ $pg->name }}</td>
                                <td>{{ $pg->username }}</td>
                                <td>{{ $pg->email }}</td>
                                <td>{{ $pg->address }}</td>
                                <td class="d-flex">
                                    <a href="/dashboard/user/{{ $pg->id }}/edit" class="btn btn-warning border-0 mx-2">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <form action="/dashboard/user/{{ $pg->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus pengguna berikut ini?')" class="btn btn-danger border-0">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                    </form>
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
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengguna Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/dashboard/user" method="POST" enctype="multipart/form-data" class="form d-flex flex-wrap justify-content-between">
            @csrf
              <div class="col-lg-5">
                  <div class="form-group">
                      <input type="text" name="username" placeholder="Username" id="username" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Nama Lengkap" id="name" class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="email" name="email" placeholder="Email" id="email" class="form-control">
                  </div>
                  <div class="form-group">
                      <textarea name="address" id="" placeholder="Alamat" cols="1" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                      <input type="file" name="image" id="image" onchange="previewImage() class="form-control">
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" placeholder="Password" id="" class="form-control">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary w-100 my-3">Simpan</button>                  
                </div>
              </div>
              <div class="col-lg-6">
                <img class="img-preview img-fluid mb-3 col-sm-5">
              </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>



  
  <script>
      function previewImage(){
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result; 
          }
        }
  </script>


@endsection