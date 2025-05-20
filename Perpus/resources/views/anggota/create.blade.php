@extends('layout.main')

@section('title','Tambah Anggota')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Form Tambah Anggota</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('anggota.store') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="nis" class="form-label">Nomor Induk Siswa</label>
                            <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis')}}" placeholder="Masukan Nomor Induk Siswa">
                            @error('nis')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')}}" placeholder="Masukan Nama Anggota">
                            @error('nama')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Masukan Email Anggota">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-select">
                                <option value="IPA" {{ old('jurusan') == 'IPA' ? 'selected' : '' }}>IPA</option>
                                <option value="IPS" {{ old('jurusan') == 'IPS' ? 'selected' : '' }}>IPS</option>
                            </select>
                            @error('jurusan')
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
                        <a href="{{ url('anggota') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
