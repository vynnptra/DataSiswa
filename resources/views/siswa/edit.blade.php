<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="position-relative" style="top: 17rem">

        <div class="card position-absolute  start-50 translate-middle mt-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <span class="text-danger">{{ $error }}</span>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card-header">
              Edit Siswa
            </div>
            <div class="card-body">
{{-- @dd($siswa) --}}
              
                <form action="{{ route('siswa.update', $nisn->siswa_id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Siswa Name</label>
                        <input type="text" class="form-control" value="{{ $nisn->siswa->nama }}" id="name" name="nama" style=" width: 40rem;" >
                    </div>

                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="text" class="form-control" value="{{ $nisn->nisn }}" id="nisn" name="nisn" style=" width: 40rem;" >
                    </div>

                    
                    <footer class="mt-4">
                        <button type="submit"  class="btn btn-success">Create</button>
                        <a href="{{ Route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
                    </footer>
                </form>
            </div>
          </div>
    </div>


    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>