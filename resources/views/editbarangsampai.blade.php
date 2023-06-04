@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/laporan/{{ $laporan->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode Pengajuan</label>
                        <input type="text" class="form-control" id="recipient-name" name="kodepengajuan"
                            value="{{ $laporan->kodepengajuan }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID Barang</label>
                        <input type="text" class="form-control" id="recipient-name" name="IDbarang"
                            value="{{ $laporan->IDbarang }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Pengaju</label>
                        <input type="text" class="form-control" id="recipient-name" name="namapengaju"
                            value="{{ $laporan->namapengaju }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="recipient-name" name="namabarang"
                            value="{{ $laporan->namabarang }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jumlah Barang</label>
                        <input type="date" class="form-control" id="recipient-name" name="jumalahbarang"
                            value="{{ $laporan->jumlahbarang }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Pengajuan</label>
                        <input type="date" class="form-control" id="recipient-name" name="tanggalpengajuan"
                            value="{{ $laporan->tanggalpengajuan }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jumlah Barang Sampai</label>
                        <input type="date" class="form-control" id="recipient-name" name="jumlahbarangsampai"
                            value="{{ $laporan->jumlahbarangsampai }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal"><a class="text-white"
                        href="/laporan">Batal</a></button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
@endsection
