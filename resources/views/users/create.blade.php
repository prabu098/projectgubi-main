@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pemilih (Voters)</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control {{ $errors->first('name') ? "is-invalid" : ""}}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control {{ $errors->first('nim') ? "is-invalid" : ""}}" placeholder="Masukkan NIM anda">
                                <p class="text-danger">{{ $errors->first('nim') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control {{ $errors->first('kelas')  ? "is-invalid" : ""}}">
                                <p class="text-danger">{{ $errors->first('kelas') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control {{ $errors->first('email') ? "is-invalid" : ""}}">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control {{ $errors->first('password') ? "is-invalid" : ""}}">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
