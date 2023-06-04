<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logosekolah.png">
    <!-- Chartist -->
    <link rel="stylesheet" href="/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="./plugins/summernote/dist/summernote.css" rel="stylesheet">
    <link href="/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="/">
                    <b class="logo-abbr"><img src="/img/logosekolah.png" alt="" width="100%"> </b>
                    <span class="logo-compact"><img src="img/logosekolah.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/img/logotulisan2.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="bi bi-list"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    @auth
                        <ul class="clearfix">
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                    @if (auth()->user()->foto)
                                        <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                                            class="rounded-circle img-fluid" style="height="40" width="40"">
                                    @else
                                        <img src="/img/default.png" alt="avatar" class="rounded-circle img-fluid"
                                            style="height="40" width="40"">
                                    @endif
                                </div>
                                <div class="drop-down dropdown-profile dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="profil"><i class="bi bi-person"></i> <span>Profile</span></a></li>
                                            <hr class="my-2">
                                            <li>
                                                <form action="/logout" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn mb-1 btn-rounded btn-success"><span
                                                            class="btn-icon-left"><i class="bi bi-box-arrow-right"></i>
                                                        </span>Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @else
                        <ul>
                            <li>
                                <form action="/login" method="POST">
                                    @csrf
                            <li><a href="/login"><i class="bi bi-box-arrow-in-right"></i> <span>Login</span></a></li>
                            </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/" aria-expanded="false">
                            <i class="bi bi-speedometer"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-bar-chart"></i><span class="nav-text">Data Management</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/barang-masuk"><i class="bi bi-bag-plus-fill"></i>Barang Masuk</a></li>
                            <li><a href="/barang-keluar"><i class="bi bi-bag-dash-fill"></i>Barang Keluar</a></li>
                            @can('sekretaris')
                                <li><a href="/pengajuan"><i class="bi bi-cart-plus-fill"></i>Pengajuan Pembelian
                                        Barang</a>
                                </li>
                            @endcan
                            @can('kepsek')
                                <li><a href="/approved"><i class="bi bi-clipboard2-check-fill"></i>Approval</a></li>
                            @endcan
                            <li><a href="/laporan"><i class="bi bi-newspaper"></i>Laporan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-person-video2"></i><span class="nav-text">Data Master</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('operator')
                                <li><a href="/user"><i class="bi bi-people-fill"></i></i>User</a></li>
                            @endcan
                            <li><a href="/databarang"><i class="bi bi-pie-chart"></i></i>Data Barang</a></li>
                            @can('operator')
                                <li><a href="/cekstok"><i class="bi bi-box-seam"></i>stock Opname</a></li>
                                <li><a href="/stockOpname"><i class="bi bi-clipboard-fill"></i>Laporan Stock Opname</a>
                                </li>
                            @endcan
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
                Sidebar end
            ***********************************-->

        <!--**********************************
                Content body start
            ***********************************-->
        <div class="content-body">

            <div class="container-fluid p-0">
                @yield('content')
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
                Content body end
            ***********************************-->
    </div>
    <!--**********************************
            Main wrapper end
        ***********************************-->

    <!--**********************************
            Scripts
        ***********************************-->
    <script src="/plugins/common/common.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/gleek.js"></script>
    <script src="/js/styleSwitcher.js"></script>

    <script src="/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="/plugins/chartist/js/chartist.min.js"></script>
    <script src="/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="/js/plugins-init/chartist.init.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="./plugins/summernote/dist/summernote-init.js"></script>
    <script src="./plugins/summernote/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'lBfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    download: 'open'
                }]
            });
        });
    </script>
</body>

</html>
