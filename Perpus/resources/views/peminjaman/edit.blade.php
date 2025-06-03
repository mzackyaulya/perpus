
@extends('layout.main')

@section('title','Edit Peminjaman')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4 text-center">Form Edit Peminjaman</h5>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.update', $peminjaman['id']) }}" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="anggota_id" class="form-label">Anggota</label>
                            <select class="form-control" name="anggota_id" id="anggota_id">
                                <option value="">Pilih Anggota</option>
                                @foreach ($anggota as $items)
                                    <option value="{{$items['id']}}" {{ (old('anggota_id', $peminjaman['anggota_id']) == $items['id']) ? 'selected' : '' }}>
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
                                    <option value="{{$items['id']}}" {{ (old('buku_id', $peminjaman['buku_id']) == $items['id']) ? 'selected' : '' }}>
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
                                    <option value="{{$items['id']}}" {{ (old('pengurus_id', $peminjaman['pengurus_id']) == $items['id']) ? 'selected' : '' }}>
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
                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjaman['tanggal_pinjam']) }}" >
                            @error('tanggal_pinjam')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $peminjaman['tanggal_kembali']) }}" >
                            @error('tanggal_kembali')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending" {{ old('status', $peminjaman['status']) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diPinjam" {{ old('status', $peminjaman['status']) == 'diPinjam' ? 'selected' : '' }}>diPinjam</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
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
