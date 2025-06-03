@extends('layout.main')

@section('title','Tambah Perpustakawan')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Form Tambah Perpustakawan</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('pengurus.store') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="nuptk" class="form-label">NUPTK</label>
                            <input type="number" class="form-control" id="nuptk" name="nuptk" value="{{ old('nuptk')}}" placeholder="Masukan NUPTK Perpustakawan">
                            @error('nuptk')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')}}" placeholder="Masukan Nama Perpustakawan">
                            @error('nama')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Masukan Email Perpustakawan">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir')}}" >
                            @error('tanggal_lahir')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('pengurus') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
