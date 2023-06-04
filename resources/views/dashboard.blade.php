@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <a href="barang-masuk">
                            <h3 class="card-title text-white">Barang Masuk</h3>
                        </a>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $barangmasuk }}</h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="bi bi-bag-plus-fill"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <a href="barang-keluar">
                            <h3 class="card-title text-white">Barang Keluar</h3>
                        </a>
                        <div class="d-inline-block">
                            <h2 class="text-white"> {{ $barangkeluar }}</h2>
                            <p class="text-white mb-0"></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="bi bi-bag-dash-fill"></i></span>
                    </div>
                </div>
            </div>
            <!--**********************************
                                start barang masuk dan keluar
                                ***********************************-->
            <div class="col-lg-4 col-md-6">
                <div class="card card-widget">
                    <div class="card-body">
                        <h5 class="text-muted">Info Brang Masuk & Keluar</h5>
                        <h2 class="mt-4">5680</h2>
                        <span>Jumlah Brang</span>
                        <div class="mt-4">
                            <h4>{{ $barangmasuk }}</h4>
                            <h6>Barang Masuk</h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-primary" style="width: 50%;" role="progressbar"><span
                                        class="sr-only">50% Brang Masuk</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>{{ $barangkeluar }}</h4>
                            <h6 class="m-t-10 text-muted">Barang Keluar</h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span
                                        class="sr-only">50% Barang Keluar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                        end barang masuk dan keluar
                        ***********************************-->
@endsection
