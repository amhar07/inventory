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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal"><i class="bi bi-plus"></i></button>
                        </div>
                        <h4 class="card-title">Barang Masuk</h4>
                        <div class="table-responsive">
                            <table id="example" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang Masuk</th>
                                        <th>Asal Barang</th>
                                        <th>Tanggal Barang Masuk</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangmasuk as $masuk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $masuk->IDbarang }}</td>
                                            <td>{{ $masuk->nama }}</td>
                                            <td>{{ $masuk->jumlah }}</td>
                                            <td>{{ $masuk->asal }}</td>
                                            <td>{{ $masuk->tanggal }}</td>
                                            <td>
                                                <a href="barangmasuk/{{ $masuk->id }}/edit">
                                                    <button class="btn btn-primary"><i
                                                            class="bi bi-pencil-fill"></i></button>
                                                </a>
                                                <form action="barangmasuk/{{ $masuk->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="bi bi-x-square-fill"></i></button>
                                                </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tfoot>
                            </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Barang Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/barangmasuk">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ID Barang</label>
                            <select class="form-control" name="IDbarang" id="" required>
                                <option value="" selected hidden>Pilih barang</option>
                                @if ($idMasterBarang)
                                    @foreach ($idMasterBarang as $row)
                                        <option value="{{ $row->IDbarang }}">{{ $row->namabarang }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Asal Barang</label>
                            <select class="form-control" name="asal" id="" required>
                                <option value="" selected hidden>Pilih Keterangan</option>
                                <option value="pembelian">Pembelian</option>
                                <option value="bantuan Dana BOS">Bantuan Dana BOS</option>
                                <option value="Bantuan Orang Tua">Bantuan Orang Tua</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jumlah Barang Masuk</label>
                            <input type="text" class="form-control" id="recipient-name" name="jumlah">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tanggal Barang Masuk</label>
                            <input type="Date" class="form-control" id="recipient-name" name="tanggal"
                                value="{{ date('Y-m-d') }}">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!--**********************************
                                                                                                                            Content body end
                                                                                                                        ***********************************-->


    <!--**********************************
                                                                                                                            Footer start
                                                                                                                        ***********************************-->
    <!--**********************************
                                                                                                                            Footer end
                                                                                                                        ***********************************-->
    <!--**********************************
                                                                                                                        Main wrapper end
                                                                                                                    ***********************************-->

    <!--**********************************
                                                                                                                        Scripts
                                                                                                                    ***********************************-->
@endsection
