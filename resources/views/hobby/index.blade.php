<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hobby</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
</head>
<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <span class="text-danger">{{ $error }}</span>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="pt-5 d-flex justify-content-between">
            <div class="col">
                <h1>Data Hobby</h1>
                <p>Table Hobby</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{ route('hobby.create') }}" class="btn btn-success w">Create New Hobby</a>
            </div>

            <div class="col-12 mt-5">
                <table class="table">
                    <thead >
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        @foreach ($hobbys as $key => $hobby)
                        <tr>
                            <td style="width: 5%">
                                {{ $key + 1 }}
                            </td>
                            <td style="width: 85%">
                                {{ $hobby->name }}
                            </td>
                            <td class="d-flex gap-3" style="width: 25%">
                                <a class="btn btn-primary" href="{{ route('hobby.edit', $hobby->id) }}">Edit</a>
                                a
                                <form action="{{ route('hobby.destroy', $hobby->id) }} " method="POST" >
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger"> Hapus </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




    </div>
    <script src="ttps://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>