

@extends('layouts.app')

@section('content')
    <x-form-validation>

        <x-slot:title>Edit Hobby</x-slot:title>

        <form class="space-y-4" id="typeValidation" method="POST" action="{{ route('hobby.update', $hobby->id) }}">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 gap-7">
              <div class="input-area">
                <label for="hobby" class="form-label">Hobby</label>
                <input id="hobby" name="name" type="text" value="{{ old('name') ? old('name') : $hobby->name }}" class="form-control" placeholder="Hobby">
                @if ($errors->has('name'))
                <p class=" text-red-500 text-sm">{{ $errors->first('name') }}</p>
                
            @endif
              </div>
            </div>
            <button type="submit" class="btn flex justify-center btn-success">Update</button>
        </form>
    </x-form-validation>
@endsection