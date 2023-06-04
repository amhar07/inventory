@extends('layouts.main')

@section('content')
    <!--**********************************
                Content body start
                ***********************************-->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="alert alert-danger text-center" role="alert">
                {{ session('failed') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal"><i class="bi bi-plus"></i></button>
                        </div>
                        <h4 class="card-title">Data Barang</h4>
                        <div class="table-responsive">
                            <table id="example" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->IDbarang }}</td>
                                            <td>{{ $data->namabarang }}</td>
                                            <td>{{ $data->stok }}</td>
                                        </tr>
                                    @endforeach
                                    </tfoot>
                            </table>
                            <div class="d-flex flex-row-reverse bd-highlight">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/databarang">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID Barang</label>
                            <input type="text" class="form-control" id="recipient-name" name="IDbarang">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="recipient-name" name="namabarang">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Stok</label>
                            <input type="text" class="form-control" id="recipient-name" name="stok">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!--**********************************
                                            Content body end
                                        ***********************************-->
@endsection
