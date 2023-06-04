@extends('layouts.main')

@section('content')
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data User</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nip</th>
                                        <th>Role</th>
                                        <th>NO Handpohone</th>
                                        <th>Alamat Lengkap</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $users->nama }}</td>
                                            <td>{{ $users->nip }}</td>
                                            <td>{{ $users->role }}</td>
                                            <td>{{ $users->nomorTelepon }}</td>
                                            <td>{{ $users->alamat }}</td>
                                </tbody>
                                {{-- <tfoot>
                                        </tfoot> --}}
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
@endsection
