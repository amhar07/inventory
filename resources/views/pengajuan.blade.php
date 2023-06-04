@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-2">
        @if (session()->has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pengajuan Pembelian Barang</h4>
                    <!-- Nav tabs -->
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs mb-3">
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                {{-- start info pengaju --}}
                                                <div class="col-lg-8">
                                                    <form action="/pengajuan" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <p>Kode Pengajuan</p>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name" name="kodepengajuan"
                                                                    value="{{ $kodePengajuan }}"readonly>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <label for="recipient-name" class="col-form-label">Tanggal
                                                                    Pengajuan</label>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <input type="Date" class="form-control" readonly
                                                                    id="recipient-name" name="tanggalpengajuan"
                                                                    value="{{ date('Y-m-d') }}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Nama Pengaju</p>
                                                            </div>
                                                            <div class="col-5">
                                                                <p class="form-control" readonly>{{ auth()->user()->nama }}
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="table-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Barang</th>
                                                                            <th>Jumlah Barang</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="col-4">
                                                                                <select class="form-control"
                                                                                    name="IDbarang[]" id="">
                                                                                    <option value="" selected hidden>
                                                                                        Pilih
                                                                                        barang</option>
                                                                                    @if ($masterBarang)
                                                                                        @foreach ($masterBarang as $row)
                                                                                            <option
                                                                                                value="{{ $row->IDbarang }}">
                                                                                                {{ $row->namabarang }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </td>
                                                                            <td class="col-2">
                                                                                <input class="form-control" type="number"
                                                                                    min="1" name="jumlahbarang[]">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-4">
                                                                                <select class="form-control"
                                                                                    name="IDbarang[]" id="">
                                                                                    <option value="" selected hidden>
                                                                                        Pilih
                                                                                        barang</option>
                                                                                    @if ($masterBarang)
                                                                                        @foreach ($masterBarang as $row)
                                                                                            <option
                                                                                                value="{{ $row->IDbarang }}">
                                                                                                {{ $row->namabarang }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </td>
                                                                            <td class="col-2">
                                                                                <input class="form-control" type="number"
                                                                                    min="1" name="jumlahbarang[]">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-4">
                                                                                <select class="form-control"
                                                                                    name="IDbarang[]" id="">
                                                                                    <option value="" selected hidden>
                                                                                        Pilih
                                                                                        barang</option>
                                                                                    @if ($masterBarang)
                                                                                        @foreach ($masterBarang as $row)
                                                                                            <option
                                                                                                value="{{ $row->IDbarang }}">
                                                                                                {{ $row->namabarang }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </td>
                                                                            <td class="col-2">
                                                                                <input class="form-control" type="number"
                                                                                    min="1" name="jumlahbarang[]">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-4">
                                                                                <select class="form-control"
                                                                                    name="IDbarang[]" id="">
                                                                                    <option value="" selected hidden>
                                                                                        Pilih
                                                                                        barang</option>
                                                                                    @if ($masterBarang)
                                                                                        @foreach ($masterBarang as $row)
                                                                                            <option
                                                                                                value="{{ $row->IDbarang }}">
                                                                                                {{ $row->namabarang }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </td>
                                                                            <td class="col-2">
                                                                                <input class="form-control" type="number"
                                                                                    min="1" name="jumlahbarang[]">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-4">
                                                                                <select class="form-control"
                                                                                    name="IDbarang[]" id="">
                                                                                    <option value="" selected hidden>
                                                                                        Pilih
                                                                                        barang</option>
                                                                                    @if ($masterBarang)
                                                                                        @foreach ($masterBarang as $row)
                                                                                            <option
                                                                                                value="{{ $row->IDbarang }}">
                                                                                                {{ $row->namabarang }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </td>
                                                                            <td class="col-2">
                                                                                <input class="form-control" type="number"
                                                                                    min="1" name="jumlahbarang[]">
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                {{-- end pengajuan --}}
                                        </div>
                                    </div>
                                    </table>
                                    <div class="d-flex flex-row-reverse bd-highlight">
                                        <div class="hstack gap-1">
                                            <button type="reset" class="btn mb-1 btn-white">Reset</button>
                                            <button type="submit" class="btn mb-1 btn-primary">Ajukan</button>
                                        </div>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
