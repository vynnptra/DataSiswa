<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    < <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fw-bold">{{ $nisn->siswa->nama }}</h2>
                    <p class="text-muted">NISN: {{ $nisn->nisn }}</p>
                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('siswa.edit', $nisn->siswa_id) }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Edit</a>

                        <form action="{{ route('siswa.destroy', $nisn->siswa_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>