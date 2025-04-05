{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="fw-bold">{{ $siswas->nama }}</h2>
                    <p class="text-muted">NISN: {{ $siswas->nisn->nisn }}</p>
                    <p><strong>Telepon:</strong> {{ $siswas->phoneNumbers->pluck('phone_number')->implode(', ') }} </p>
                    <p><strong>Hobbies:</strong> {{ $siswas->hobbies->pluck('name')->implode(', ') }}</p>
                    <p><strong>Alamat:</strong> Jl. Contoh No. 123, Kota ABC</p>
                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('siswa.edit', $siswas->id) }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Edit</a>

                        <form action="{{ route('siswa.destroy', $siswas->id) }}" method="POST">
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
</html> --}}


@extends('layouts.app')

@section('content')
<x-detail>
    <x-slot:redirect>
        {{ route('siswa.index') }}
    </x-slot:redirect>

    {{-- <h3 class="text-2xl font-semibold text-slate-900 dark:text-white my-7">{{ $siswa->name }}</h3> --}}
    <div class="my-7">
        
            <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-2">{{ $siswa->nama }}</h2>
            
            <p class="text-sm text-slate-500 dark:text-slate-300 mb-1">
              <span class="font-semibold text-slate-700 dark:text-slate-200">NISN:</span> {{ $siswa->nisn->nisn }}
            </p>
            
            <p class="text-sm text-slate-600 dark:text-slate-200 mb-1">
              <span class="font-semibold">Telepon:</span> {{ $siswa->phoneNumbers->pluck('phone_number')->implode(', ') }}
            </p>
            
            <p class="text-sm text-slate-600 dark:text-slate-200">
              <span class="font-semibold">Hobbies:</span> {{ $siswa->hobbies->pluck('name')->implode(', ') }}
            </p>
    </div>
    
</x-detail>
@endsection
