@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/barangkeluar/{{ $barangkeluar->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID Barang</label>
                        <input type="text" class="form-control" id="recipient-name" name="IDbarang"
                            value="{{ $barangkeluar->IDbarang }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="recipient-name" name="namabarang"
                            value="{{ $barangkeluar->namabarang }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jumlah Barang keluar</label>
                        <input type="text" class="form-control" id="recipient-name" name="jumlahbarangkeluar"
                            value="{{ $barangkeluar->jumlahbarangkeluar }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Peminta</label>
                        <input type="text" class="form-control" id="recipient-name" name="peminta"
                            value="{{ $barangkeluar->peminta }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Barang Keluar</label>
                        <input type="date" class="form-control" id="recipient-name" name="tanggalbarangkeluar"
                            value="{{ $barangkeluar->tanggalbarangkeluar }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal"><a class="text-white"
                        href="/barangkeluar">Batal</a></button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
@endsection
