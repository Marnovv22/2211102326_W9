<!DOCTYPE html>
<html>
<head>
    <title>Inventaris Buku Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container py-5">
    <h2 class="text-center mb-2">Inventaris Buku Perpustakaan</h2>
    <h5 class="text-center mb-4">Marchell Nova Aura - 2211102326</h5>

    <div class="card bg-secondary text-white mb-4">
        <div class="card-body">
            <form action="{{ isset($buku) ? url('/update/'.$buku->id) : url('/store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $buku->judul ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" id="genre" class="form-select" required>
                        <option value="">Pilih Genre</option>
                        @php
                            $genres = ['Fiksi', 'Non-Fiksi', 'Biografi', 'Komik', 'Sejarah'];
                        @endphp
                        @foreach($genres as $genre)
                            <option value="{{ $genre }}" {{ (old('genre', $buku->genre ?? '') == $genre) ? 'selected' : '' }}>
                                {{ $genre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $buku->stok ?? '') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    {{ isset($buku) ? 'Update Buku' : 'Tambah Buku' }}
                </button>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card bg-secondary text-white">
        <div class="card-body">
            <h5 class="card-title mb-3">Daftar Buku</h5>
            <table class="table table-bordered table-dark table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Genre</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukus as $b)
                        <tr>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->genre }}</td>
                            <td>{{ $b->tahun_terbit }}</td>
                            <td>{{ $b->stok }}</td>
                            <td>
                                <a href="{{ url('/edit/'.$b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('/delete/'.$b->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
