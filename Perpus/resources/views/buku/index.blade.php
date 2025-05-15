@extends('layout.main')

@section('title','Buku')

@section('content')
<br>
<div class="card m-4 p-3">
    <head>
        <link href="{{ url('css/app.css') }}" rel="stylesheet">
        <style>
            .card-img-top {
                width: 100%;
                height: 300px;
                object-fit: cover;
                border-radius: 0.3rem;
            }
        </style>
    </head>
    <div class="card-header mb-3 d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Buku</h5>
        <div style="position: relative; width: 230px;">
            <input type="text" id="searchInput" class="form-control" placeholder="Pencarian" style="height: 40px; padding-left: 35px;">
            <i class="fas fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
        </div>
    </div>

    <body>
        <div class="container">
            <a href="{{ route('buku.create') }}" class="btn btn-primary col-lg-12 mb-3">Tambah Buku</a>
            <hr>
            <div class="row" id="ruteTable">
                @foreach ($buku as $item)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card shadow-sm" style="border-radius: 0.5rem;">
                            <img src="{{ $item['foto'] }}" class="card-img-top rounded-top" >
                            <div class="card-body p-2">
                                <h6 class="card-title text-center mb-2">{{ $item['judul'] }}</h6>

                                <div class="mb-1 d-flex" style="font-size: 13px;">
                                    <strong class="w-50">Genre</strong>
                                    <span>: {{ $item['genre'] }}</span>
                                </div>
                                <div class="mb-1 d-flex" style="font-size: 13px;">
                                    <strong class="w-50">Penerbit</strong>
                                    <span>: {{ $item['penerbit'] }}</span>
                                </div>
                                <div class="mb-1 d-flex" style="font-size: 13px;">
                                    <strong class="w-50">Tahun</strong>
                                    <span>: {{ $item['tahun'] }}</span>
                                </div>
                                <div class="mb-1 d-flex" style="font-size: 13px;">
                                    <strong class="w-50">Stok</strong>
                                    <span>: {{ $item['stok'] }}</span>
                                </div>
                                <br>
                                <div class="d-flex justify-content-center gap-2 mt-2">
                                    <a href="{{ route('buku.edit', $item['id']) }}" class="btn btn-sm btn-warning">
                                        <i class="ti ti-pencil" style="font-size: 18px;"></i>
                                    </a>
                                    <form action="{{ route('buku.destroy', $item['id']) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="ti ti-trash" style="font-size: 18px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <script src="{{ url('js/app.js') }}"></script>
    </body>
</div>
<script src="{{ url('js/app.js') }}"></script>
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
<!-- confirm dialog -->
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        let form =  $(this).closest("form");
        let name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Apakah Ingin Hapus? ",
            text: "data yang dihapus tidak bisa kembali!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "iya"
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
        let cards = document.querySelectorAll('#ruteTable .card');

        cards.forEach(card => {
            let textContent = card.textContent.toUpperCase();

            if (textContent.includes(filter)) {
                card.parentElement.style.display = "";  // parentElement = col-md-4
            } else {
                card.parentElement.style.display = "none";
            }
        });
    });
</script>
@endsection
