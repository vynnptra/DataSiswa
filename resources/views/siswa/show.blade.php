
@extends('layouts.app')

@section('content')
<x-detail>
    <x-slot:redirect>
        {{ route('siswa.index') }}
    </x-slot:redirect>


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
