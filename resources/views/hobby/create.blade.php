

@extends('layouts.app')

@section('content')
    <x-form-validation>

        <x-slot:title>Create Hobby</x-slot:title>

        <form class="space-y-4" id="typeValidation" enctype="multipart/form-data" method="POST" action="{{ route('hobby.store') }}">
            @csrf
            @method('POST')
            <div class="grid md:grid-cols-2 gap-7">
              <div class="input-area">
                <label for="hobby" class="form-label">Hobby</label>
                <input id="hobby" name="name" type="text" class="form-control" placeholder="Hobby">
                @if ($errors->has('name'))
                <p class=" text-red-500 text-sm">{{ $errors->first('name') }}</p>
                
            @endif
              </div>
              <div class="input-area">
                <label for="file" class="form-label">Upload FIle :</label>
                <input id="file" name="file" type="file" class="form-control" placeholder="Hobby">
                @if ($errors->has('file'))
                <p class=" text-red-500 text-sm">{{ $errors->first('file') }}</p>
                
            @endif
              </div>
            </div>
            <button type="submit" class="btn flex justify-center btn-success">Update</button>
        </form>
    </x-form-validation>
@endsection