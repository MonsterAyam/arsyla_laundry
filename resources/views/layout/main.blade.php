<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arsyla Laundry</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css'); }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css'); }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css'); }}">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('sidebar.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('topbar.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('container')

                </div>


                    <!-- Footer -->
            <footer class="sticky-footer bg-dark text-light" style="height:30px">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

       <!-- Bootstrap core JavaScript-->
       <script src="{{ asset('vendor/jquery/jquery.min.js'); }}"></script>
       <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
   
       <!-- Core plugin JavaScript-->
       <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
   
       <!-- Custom scripts for all pages-->
       <script src="{{ asset('js/sb-admin-2.min.js'); }}"></script>


       <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery-searchbox.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('.js-searchBox').searchBox({
                      mode: 2,
                      optionMaxSize: 80,
                      elementWidth: '380',
                      selectCallback: null
                });
            });

         
        </script>
   
</body>

</html>