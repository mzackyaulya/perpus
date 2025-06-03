@extends('layout.main')

@section('title','Peminjaman')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header mb-3 d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Daftar Peminjaman</h5>
            <div style="position: relative; width: 230px;">
                <input type="text" id="searchInput" class="form-control" placeholder="Pencarian" style="height: 40px; padding-left: 35px;">
                <i class="ti ti-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
            </div>
        </div>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary col-lg-12">Tambah Peminjaman</a>
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Anggota</th>
                <th class="text-center">Buku</th>
                <th class="text-center">Perpustakawan</th>
                <th class="text-center">Tanggal Peminjaman</th>
                <th class="text-center">Tanggal Pengembalian</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody id="pengurusTable">
                @foreach ($peminjaman as $index => $item)
                <tr>
                    <td class="text-center"> {{ $index + 1 }}</td>
                    <td class="text-center"> {{ $item['anggota']['nama'] }}</td>
                    <td class="text-center"> {{ $item['buku']['judul'] }}</td>
                    <td class="text-center"> {{ $item['pengurus']['nama'] }}</td>
                    <td class="text-center"> {{ \Carbon\Carbon::parse($item['tanggal_pinjam'])->format('d-m-Y') }}</td>
                    <td class="text-center"> {{ \Carbon\Carbon::parse($item['tanggal_kembali'])->format('d-m-Y') }}</td>
                    <td class="text-center">
                        <span class="
                            @if($item['status'] == 'Pending') text-primary
                            @elseif($item['status'] == 'diPinjam') text-warning
                            @elseif($item['status'] == 'diKembalikan') text-secondary
                            @elseif($item['status'] == 'Telat') text-danger
                            @endif
                        ">
                            {{ $item['status'] }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{route('peminjaman.edit', $item["id"])}}" class="btn btn-sm btn-warning" title="Edit">
                            <i class="ti ti-edit"></i>
                        </a>
                        <form action="{{ route('peminjaman.update', $item['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="ubah_status" value="1">
                            <button type="submit" class="btn btn-sm btn-success" title="Kembalikan">
                                <i class="ti ti-check"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
    title: "BERHASIL!",
    text: '{{ session('success')}}',
    icon: "success"
    });
</script>
@endif
<!-- confirm dialog Hapus-->
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        let form =  $(this).closest("form");
        let name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Apakah Ingin Hapus? ",
            text: "Data yang dihapus tidak bisa kembali!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
            form.submit();
            }
        });
    });
</script>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toUpperCase();
        let rows = document.querySelectorAll('#pengurusTable tr');

        rows.forEach(row => {
            let textContent = row.textContent.toUpperCase();
            if (textContent.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>
@endsection
