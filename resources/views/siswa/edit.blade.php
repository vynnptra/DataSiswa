<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body >

    <div class="position-relative" style="top: 17rem">

        <div class="card position-absolute  start-50 translate-middle " style="margin-top: 10rem">
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

                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" >
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Siswa Name</label>
                        <input type="text" class="form-control" value="{{ $siswa->nama }}" id="name" name="nama" style=" width: 40rem;" >
                    </div>

                    <div class="form-group">
                        <label for="nisn">Nisn</label>
                        <input type="number" class="form-control" value="{{ $siswa->nisn->nisn }}" id="nisn" name="nisn" style=" width: 40rem;" >
                    </div>

                    <div class="form-group mt-4" id="phoneInput">
                        <label for="phone" style="margin-right: 1rem">Nomer Telepon</label>
                        <button onclick="addInput()" type="button" class="btn btn-primary" style=" padding-left: 1rem; padding-right: 1rem;"> Tambah + </button>
                        @foreach ($siswa->phoneNumbers as $phone)              
                        <div class="d-flex gap-2 mb-2" id="input-group" >
                            <input type="number" class="form-control" value="{{ $phone->phone_number }}" id="phone" name="phone_number[]" style="width: 40rem">
                            <button onclick="this.parentElement.remove()" type="button" class="btn btn-danger"> - </button>
                        </div>
                        @endforeach
                    </div>


                    
                    <footer class="mt-4">
                        <button type="submit"  class="btn btn-success">Update</button>
                        <a href="{{ Route('siswa.index') }}" class="btn btn-secondary">Cancel</a>
                    </footer>
                </form>
            </div>
        </div>
    </div>


    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        function addInput(){
            let container = document.getElementById('phoneInput');
            let div = document.createElement('div');
            div.classList.add('d-flex', 'gap-2', 'mb-2');

            let input = document.createElement('input');
            input.type = 'number';
            input.name = 'phone_number[]';
            input.classList.add('form-control');

            let btnMinus = document.createElement('button')
            btnMinus.type = 'button';
            btnMinus.classList.add('btn', 'btn-danger');
            btnMinus.textContent = '-';
            btnMinus.onclick = function () {
                div.remove();

            }

            div.appendChild(input);
            div.appendChild(btnMinus);
            container.appendChild(div);

        }


    </script>
</body>
</html>