<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hobby</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
</head>
<body>
    <div class="container">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <span class="text-danger">{{ $error }}</span>
                @endforeach
            </ul>
        </div>
    @endif --}}
        <div class="pt-5 d-flex justify-content-between">
            <div class="col">
                <h1>Data Siswa</h1>

            </div>
        </div>

        <div class="row">
            
            <div class="col-12 mt-5">
                <table class="table border table-striped">
                    <div class="d-flex justify-content-between bg-body-secondary rounded">
                        <h4 class=" mb-4 mt-4" style="margin-left: 2rem">Table Siswa</h4>
                        <a href="{{ route('siswa.create') }}" class="btn btn-success mb-4 mt-4" style="margin-right: 3rem">Create Siswa <i class=" bi bi-plus"></i></a>
                    </div>
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Nisn</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        @foreach ($siswas as $key => $siswa)
                        <tr>
                            <td style="width: 5%">
                                {{ $siswas->firstItem() + $key }}
                            </td>
                            <td style="width: 25%">
                                {{ $siswa->nama }}
                            </td>
                            <td style="width: 30%">
                                {{ !empty($siswa->nisn->nisn) ? $siswa->nisn->nisn : 'tidak memiliki nisn' }}
                            </td>
                            <td style="width: 85%" class="overflow-x-auto">
                                {{ $siswa->phoneNumbers->isNotEmpty() ? $siswa->phoneNumbers->pluck('phone_number')->implode(', ') : 'tidak memiliki nomor telepon' }}
                            </td>
                            <td  style="width: 35%">
                                <div class="d-flex gap-3">
                                    <a class="text-primary fs-4" href="{{ route('siswa.show', $siswa->id) }}"><i class="bi bi-eye-fill"></i></a>
                                    <a class="text-warning fs-4" href="{{ route('siswa.edit', $siswa->id) }}"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('siswa.destroy', $siswa->id) }} " method="POST" >
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="text-danger fs-4 border-0 bg-light"> <i class="bi bi-trash-fill"></i> </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $siswas->links() }}
            </div>
        </div>




    </div>
    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>