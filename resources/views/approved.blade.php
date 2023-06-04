@extends('layouts.main')

@section('content')
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
                        <h4 class="card-title">Approval</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
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
                                        <th>opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approved as $approv)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $approv->kodepengajuan }}</td>
                                            <td>{{ $approv->IDbarang }}</td>
                                            <td>{{ $approv->namapengaju }}</td>
                                            <td>{{ $approv->namabarang }}</td>
                                            <td>{{ $approv->jumlahbarang }}</td>
                                            <td>{{ $approv->tanggalpengajuan }}</td>
                                            @if ($approv->status == null)
                                                <td>delay</td>
                                            @else
                                                <td>{{ $approv->status }}</td>
                                            @endif

                                            <td>
                                                <form class="d-inline" method="post"
                                                    action="/approved/{{ $approv->id }}/setuju">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $approv->id }}">
                                                    {{-- <button type="submit">terima</button> --}}
                                                    <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-check"></i></>
                                                </form>
                                                <form method="post" action="/approved/{{ $approv->id }}/tolak">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-close"></i></>
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
        </div>
    </div>
@endsection
