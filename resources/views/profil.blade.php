@extends('layouts.main')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4" style="height: 410px">
                        <div class="card-body text-center mb-4">
                            @if ($user[0]->foto)
                                <img src="{{ asset('storage/' . $user[0]->foto) }}" class="rounded-circle img-fluid"
                                    style="width: 150px;">
                            @else
                                <img src="/img/default.png" alt="avatar" class="rounded-circle img-fluid"
                                    style="width: 150px;">
                            @endif
                            <h5 class="my-3"></h5>
                            <div class="d-flex justify-content-center mb-2">
                                <div class="card">
                                </div>
                            </div>
                            <div class="bootstrap-modal">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Edit Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4" style="height: 410px">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-4">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-4">{{ auth()->user()->nama }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-4">NIP</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-4">{{ auth()->user()->nip }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-4">Role</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-4">{{ auth()->user()->role }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-4">NO Handpohone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-4">{{ auth()->user()->nomorTelepon }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-4">Alamat Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-4">{{ auth()->user()->alamat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profil
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama
                                    Lengkap:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nama"
                                    value="{{ auth()->user()->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nip:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nip"
                                    value="{{ auth()->user()->nip }}" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Role:</label>
                                <input type="text" class="form-control" id="recipient-name" name="role"
                                    value="{{ auth()->user()->role }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">NO
                                    Handpohone:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nomorTelepon"
                                    value="{{ auth()->user()->nomorTelepon }}" required>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Alamat
                                    Lengkap:</label>
                                <input type="text" class="form-control" id="recipient-name" name="alamat"
                                    value="{{ auth()->user()->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="foto" class="form-control-file">
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
    </section>
@endsection
