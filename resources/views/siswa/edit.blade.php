
@extends('layouts.app')

@section('content')

<x-form-validation>
    <x-slot:title>Edit Siswa</x-slot:title>
    <form class="space-y-4" id="typeValidation" method="POST" action="{{ route('siswa.update', $siswa->id) }}">
        @csrf
        @method('PUT')
        <div class="grid md:grid-cols-2 gap-7">
          <div class="input-area">
            <label for="name" class="form-label">Nama Siswa</label>
            <input id="name" name="nama" type="text" value="{{ !empty(old('nama')) ? old('nama') : $siswa->nama }}" class="form-control" placeholder="Nama Siswa">
            @if ($errors->has('nama'))
            <p class=" text-red-500 text-sm">{{ $errors->first('nama') }}</p>
    @endif
          </div>
          <div class="input-area">
            <label for="number" class="form-label">Nisn</label>
            <input type="number" class="form-control" id="nisn" name="nisn" value="{{ !empty(old('nisn')) ? old('nisn') : $siswa->nisn->nisn }}" style=" width: 40rem;" >
            @if ($errors->has('nisn'))
                    <p class=" text-red-500 text-sm">{{ $errors->first('nisn') }}</p>
            @endif
          </div>

          <div class="input-area" id="phoneInput">
            <label for="number" class="form-label">Telepon</label>
            <button onclick="addInput()" type="button" class="btn btn-primary" style=" padding-left: 1rem; padding-right: 1rem;"> Tambah + </button>
           
            @foreach ($siswa->phoneNumbers as $phone)    
            <div class="flex gap-2 mb-2" id="input-group" >
                <input id="number" name="phone_number[]" value="{{$phone->phone_number}}" type="text" class="form-control" placeholder="Enter Number only">
                <button type="button" class="btn btn-danger" onclick=" this.parentElement.remove() ">-</button>
            </div>
            @endforeach


            @if ($errors->has('phone_number') || $errors->has('phone_number*'))
            <p class=" text-red-500 text-sm">{{ $errors->first('phone_number') }}</p>
            @endif
        </div>

        <div class="mt-3">
            <p class="text-slate-900 dark:text-white">Pilih hobby</p>
            <div class="grid grid-cols-2">

                @foreach ($hobbies as $hobby)
                <div class="checkbox-area primary-checkbox mr-2 sm:mr-4 mt-2">
                    <label class="inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="hidden" name="hobbies[]" value="{{ $hobby->id }}" {{ $siswa->hobbies->pluck('id')->contains($hobby->id) ? 'checked' : ''  }}>
                      <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                <img src="assets/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                      <span class="text-primary-500 dark:text-slate-400 text-sm leading-6 capitalize">{{ $hobby->name }}</span>
                    </label>
                  </div>
                @endforeach
            </div>
            @if ($errors->has('hobbies'))
                <p class=" text-red-500 text-sm">{{ $errors->first('hobbies') }}</p>
            @endif
        </div>

        </div>
        <button type="submit" class="btn flex justify-center btn-success">Submit</button>
      </form>
</x-form-validation>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function addInput(value = '') {
        let container = document.getElementById('phoneInput');
        let div = document.createElement('div');
        div.classList.add('flex', 'gap-2', 'mb-2')
        
        let input = document.createElement('input');
        input.type = 'number';
        input.classList.add('form-control');
        input.name = 'phone_number[]'
        input.value = value;

        let btnMinus = document.createElement('button');
        btnMinus.type = 'button';
        btnMinus.classList.add('btn', 'btn-danger');
        btnMinus.textContent = '-';
        btnMinus.onclick = function () {
            div.remove();
        };

        div.appendChild(input);
        div.appendChild(btnMinus);
        container.appendChild(div);
    
    }

    oldPhoneNumbers.forEach(number => addInput(number));
</script>
@endsection