<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
              Update {{ $hobby->name }} Hobby
            </div>
            <div class="card-body">
              
                <form action="{{ route('hobby.update', $hobby->id) }}" method="POST">
                    {{-- @dd($hobby->id) --}}
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Hobby Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $hobby->name }}" name="name" style=" width: 40rem;" required>
                    </div>

                    
                    <footer class="mt-4">
                        <button type="submit"  class="btn btn-success">Update</button>
                        <a href="{{ Route('hobby.index') }}" class="btn btn-secondary">Cancel </a>
                    </footer>
                </form>
            </div>
          </div>
    </div>


    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>