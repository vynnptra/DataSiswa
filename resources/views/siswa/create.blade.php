<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Siswa</title>
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
            Create New Siswa
            </div>
            <div class="card-body">
            
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Siswa</label>
                        <input type="text" class="form-control" id="name" name="nama" value="{{ old('nama') }}" style=" width: 40rem;" >
                    </div>

                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="number" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}" style=" width: 40rem;" >
                    </div>

                    <div class="form-group mt-3" id="phoneInput">
                        <label for="phone" style="margin-right: 1rem">Nomer Telepon</label>
                        <button onclick="addInput()" type="button" class="btn btn-primary" style=" padding-left: 1rem; padding-right: 1rem;"> Tambah + </button>

                        @if (old('phone_number'))

                        @foreach (old('phone_number') as $key => $phone)
                        <div class="d-flex gap-2 mb-2" id="input-group" >
                            <input type="number" class="form-control" name="phone_number[]" value="{{$phone}}" >
                            <button type="button" class="btn btn-danger" onclick=" this.parentElement.remove() ">-</button>
                        </div>
                        @endforeach
                        
                        @else

                        <div class="d-flex gap-2 mb-2" id="input-group"></div>

                        @endif

                    </div>

                    <div class="form-group mt-3">
                        <label>Pilih hobby</label>
                        <br>
                        @foreach ($hobbies as $hobby)
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="checkbox" name="hobbies[]" value="{{ $hobby->id }}" class="btn-check" id="{{ $hobby->name }}" autocomplete="off">
                            <label class="btn btn-outline-primary" for="{{ $hobby->name }}">{{ $hobby->name }}</label>
                        </div>
                            {{-- <input type="checkbox"  name="hobbies" value="{{ $hobby->id }}" id="{{ $hobby->name }}">
                            <label for="{{ $hobby->name }}">{{ $hobby->name }}</label> --}}
                        @endforeach
                    </div>
                    
                    <footer class="mt-4">
                        <button type="submit"  class="btn btn-success">Create</button>
                        <a href="{{ Route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
                    </footer>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addInput(value = '') {
            let container = document.getElementById('phoneInput');
            let div = document.createElement('div');
            div.classList.add('d-flex', 'gap-2', 'mb-2')
            
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
</body>
</html>