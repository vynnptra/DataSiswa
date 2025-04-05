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
                    <h2 class="fw-bold">{{ $hobby->name }}</h2>
                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('hobby.edit', $hobby->id) }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Edit</a>

                        <form action="{{ route('hobby.destroy', $hobby->id) }}" method="POST">
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
        {{ route('hobby.index') }}
    </x-slot:redirect>

    <h3 class="card-title text-slate-900 dark:text-white my-7">{{ $hobby->name }}</h3>
</x-detail>
@endsection




