@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="/barangmasuk/{{ $barangmasuk->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ID Barang</label>
                        <input type="text" class="form-control" id="recipient-name" name="IDbarang"
                            value="{{ $barangmasuk->IDbarang }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="recipient-name" name="nama"
                            value="{{ $barangmasuk->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Asal</label>
                        <input type="text" class="form-control" id="recipient-name" name="asal"
                            value="{{ $barangmasuk->asal }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jumlah</label>
                        <input type="text" class="form-control" id="recipient-name" name="jumlah"
                            value="{{ $barangmasuk->jumlah }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal</label>
                        <input type="date" class="form-control" id="recipient-name" name="tanggal"
                            value="{{ $barangmasuk->tanggal }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal"><a class="text-white"
                        href="/barangmasuk">Batal</a></button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
@endsection
