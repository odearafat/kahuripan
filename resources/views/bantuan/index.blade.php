<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAHURIPAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 30px;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3 class="text-center mb-0"><b>KAHURIPAN</b></h3>
        <p class="text-center text-muted mt-0">Ketahui Penerima Bantuan</p>

        <!-- Notifikasi error jika NIK tidak ditemukan -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('bantuan.cari') }}">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label fw-bold">Masukkan NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required 
                    value="{{ old('nik') }}" pattern="[0-9]{16}" maxlength="16"
                    title="NIK harus terdiri dari 16 digit angka" autofocus>
            </div>

            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </form>

        <!-- Menampilkan hasil pencarian jika ada -->
        @isset($bantuan)
            <h5 class="mt-4 text-center">Hasil Pencarian</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-2">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Jenis Bantuan</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bantuan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-start">{{ $item->jenis_bantuan." [".$item->nama."]" }}</td>
                                <td>{{ number_format($item->nilai, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endisset
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
