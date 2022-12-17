<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css'); }}" rel="stylesheet">
    <style>
        .bg-login-image {
            background: url("https://wak-laundry-app.test/public/img/wakOkto.jpg");
            background-position: center;
            background-size: cover;
}
    </style>

</head>

<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block p-4">
                                <img style="width: 100%; height:100%" src="{{ asset('img/mesinCuci.png') }}" alt="">
                            </div>
                            <div class="col-lg-6 bg-light">
                                <div class="p-5">
                                    @if (session()->Has('success'))
                                    <div class="alert alert-success text-center fw-bold" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <div class="text-center mb-3">
                                        <h1 class="h4 text-dark fw-bold mb-4" style="font-weight: bold; font-size:30px;text-transform:uppercase;">Selamat Beraktivitas!</h1>
                                    </div>
                                    <form action="/login/authenticate" method="POST" class="user animated--grow-in">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" value="{{ old('username') }}" name="username" class="form-control form-control-user"
                                                id="exampleInputEmail" 
                                                placeholder="Masukan Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block fw-bold" style="font-weight: bold; font-size:14px;text-transform:uppercase;">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="fw-bold text-dark">{{ date('Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js'); }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js'); }}"></script>

</body>

</html>