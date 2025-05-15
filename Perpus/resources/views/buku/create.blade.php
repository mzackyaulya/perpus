@extends('layout.main')

@section('title','Tambah Buku')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Form Tambah Buku</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('buku.store') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul')}}" placeholder="Masukan Judul Buku">
                            @error('judul')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre Buku</label>
                            <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre')}}" placeholder="Masukan Genre Buku">
                            @error('genre')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit Buku</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit')}}" placeholder="Masukan Penerbit Buku">
                            @error('penerbit')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Buku</label>
                            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun')}}" placeholder="Minimal 1990" required min="1900" max="{{ date('Y')}}">
                            @error('tahun')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok Buku</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok')}}" placeholder="Masukan Stok Buku" >
                            @error('stok')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Buku</label>
                            <input type="text" class="form-control" id="foto" name="foto" value="{{ old('foto')}}" placeholder="Masukan Url Foto Buku">
                            @error('foto')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('buku') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
