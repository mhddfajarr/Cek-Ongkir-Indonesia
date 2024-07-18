<!DOCTYPE html>
<html>
<head>
    <title>Perulangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Perulangan</h1>
    <form method="POST" action="/perulangan">
        @csrf
        <div class="form-group mb-3">
            <label for="iterations" class="">Jumlah Perulangan:</label>
            <input type="number" class="form-control" id="iterations" name="iterations" required>
        </div>
        <button type="submit" class="btn btn-primary">Proses</button>
    </form>

    @isset($result)
        <h2 class="mt-5">Hasil:</h2>
        <ul class="list-group mt-3 mb-3">
            @foreach($result as $item)
                <li class="list-group-item">{{ $item }}</li>
            @endforeach
        </ul>
    @endisset
</div>
</body>
</html>
