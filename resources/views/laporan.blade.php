@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Laporan</h4>
                        <div class="table-responsive">
                            <table id="example" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pengajuan</th>
                                        <th>ID Barang</th>
                                        <th>Nama Pengaju</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $lapor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lapor->kodepengajuan }}</td>
                                            <td>{{ $lapor->IDbarang }}</td>
                                            <td>{{ $lapor->namapengaju }}</td>
                                            <td>{{ $lapor->namabarang }}</td>
                                            <td>{{ $lapor->jumlahbarang }}</td>
                                            <td>{{ $lapor->tanggalpengajuan }}</td>
                                            @if ($lapor->status == null)
                                                <td>delay</td>
                                            @else
                                                <td>{{ $lapor->status }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
