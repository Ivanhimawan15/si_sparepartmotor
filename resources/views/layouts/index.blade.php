<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Icon-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div class="sidebar-brand-text mx-2">SI Sparepart</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if (Request::routeIs('home')) active @endif">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('barang', 'barang-entry')) active @endif">
                <a class="nav-link" href="{{ route('barang') }}">
                    <i class="fas fa-box"></i>
                    <span>Data Barang</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('jenis', 'jenis-barang-entry')) active @endif">
                <a class="nav-link" href="{{ route('jenis') }}">
                    <i class="fas fa-boxes"></i>
                    <span>Data Jenis Barang</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('pelanggan', 'pelanggan-entry')) active @endif">
                <a class="nav-link" href="{{ route('pelanggan') }}">
                    <i class="fas fa-user"></i>
                    <span>Data Pengguna</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('supplier', 'supplier-entry')) active @endif">
                <a class="nav-link" href="{{ route('supplier') }}">
                    <i class="fas fa-dolly"></i>
                    <span>Data Supplier</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('stok', 'stok-entry')) active @endif">
                <a class="nav-link" href="{{ route('stok') }}">
                    <i class="fas fa-piggy-bank"></i>
                    <span>Data Stok Barang</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('gudang', 'gudang-entry')) active @endif">
                <a class="nav-link" href="{{ route('gudang') }}">
                    <i class="fas fa-warehouse"></i>
                    <span>Data Gudang</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('pegawai', 'pegawai-entry')) active @endif">
                <a class="nav-link" href="{{ route('pegawai') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Data Pegawai</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (Request::routeIs('pengiriman', 'pengiriman-entry')) active @endif">
                <a class="nav-link" href="{{ route('pengiriman') }}">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Data Pengiriman</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ivan Himawan</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
