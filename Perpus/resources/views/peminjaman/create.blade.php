@extends('layout.main')

@section('title','Tambah Perpustakawan')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Form Tambah Perpustakawan</h5>
            <div class="card">
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('peminjaman.store') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="anggota_id" class="form-label">Anggota</label>
                            <select class="form-control" name="anggota_id" id="anggota_id">
                                <option value="">Pilih Anggota</option>
                                @foreach ($anggota as $items)
                                    <option value="{{$items['id']}}" {{ old('anggota_id') == $items['id'] ? 'selected' : '' }}>
                                        NIS : {{ $items['nis'] }} | Nama : {{$items['nama']}}
                                    </option>
                                @endforeach
                            </select>
                            @error('anggota_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="buku_id" class="form-label">Buku</label>
                            <select class="form-control" name="buku_id" id="buku_id">
                                <option value="">Pilih Buku</option>
                                @foreach ($buku as $items)
                                    <option value="{{$items['id']}}" {{ old('buku_id') == $items['id'] ? 'selected' : '' }}>
                                        Judul : {{ $items['judul'] }} | Penerbit : {{$items['penerbit']}} | Tahun Terbit :{{$items['tahun']}} | Stok : {{ $items['stok'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('buku_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pengurus_id" class="form-label">Perpustakawan</label>
                            <select class="form-control" name="pengurus_id" id="pengurus_id">
                                <option value="">Pilih Perpustakawan</option>
                                @foreach ($pengurus as $items)
                                    <option value="{{$items['id']}}" {{ old('pengurus_id') == $items['id'] ? 'selected' : '' }}>
                                        Nuptk : {{ $items['nuptk'] }} | Nama : {{$items['nama']}}
                                    </option>
                                @endforeach
                            </select>
                            @error('buku_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam')}}" >
                            @error('tanggal_pinjam')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali')}}" >
                            @error('tanggal_kembali')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('peminjaman') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
