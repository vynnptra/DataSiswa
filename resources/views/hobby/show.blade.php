
@extends('layouts.app')

@section('content')
<x-detail>
    <x-slot:redirect>
        {{ route('hobby.index') }}
    </x-slot:redirect>

    <h3 class="card-title text-slate-900 dark:text-white my-7">{{ $hobby->name }}</h3>
</x-detail>
@endsection




