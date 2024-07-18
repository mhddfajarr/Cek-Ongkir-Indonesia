<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cek Ongkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h2 class="text-center">Cek Ongkir</h2>
                <hr>
                <form action="" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="origin" class="mb-2">Asal Kota</label>
                        <select name="origin_disabled" id="origin" class="form-control" disabled>
                            <option value="">Pilih Kota</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city['city_id'] }}" 
                                    {{ old('origin') == $city['city_id'] ? 'selected' : '' }} 
                                    {{ !old('origin') && $city['city_id'] == 501 ? 'selected' : '' }}>
                                    {{ $city['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="origin" value="501">
                    </div>
                    <div class="mt-3">
                        <label for="destination" class="mb-2">Kota Tujuan</label>
                        <select name="destination" id="destination" class="form-control" required>
                            <option value="">Pilih Kota Tujuan</option>
                            @foreach ($cities as $city )
                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="weight" class="mb-2">Berat <span class="text-muted">(Gram)</span></label>
                        <input type="number" name="weight" id="weight" class="form-control" required> 
                    </div>
                    <div class="mt-3">
                        <label for="courier" class="mb-2">Kurir</label>
                        <select name="courier" id="courier" class="form-control" required>
                            <option value="">Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="cekOgkir" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
    
            <div class="col-md-6 mt-6">
                @if ($ongkir != '')
                    <div class="card px-5 py-3 shadow ">
                        <h2 class="text-center ">Rincian Ongkir</h2>
                        <hr>
                        <table class="table table-bordered">
                            <tr>
                                <th class="w-25">Asal Kota</th>
                                <td>{{ $ongkir['origin_details']['city_name'] }}</td>
                            </tr>
                            <tr>
                                <th>Kota Tujuan</th>
                                <td>{{ $ongkir['destination_details']['city_name'] }}</td>
                            </tr>
                            <tr>
                                <th>Berat Paket</th>
                                <td>{{ $ongkir['query']['weight'] }} Gram</td>
                            </tr>
                            <tr>
                                <th>Kurir</th>
                                @foreach ($ongkir['results'] as  $result)
                                    <td>{{ $result['name'] }}</td>
                                @endforeach
                            </tr>
                        </table>
                            @foreach ($ongkir['results'] as $result)
                                @foreach ($result['costs'] as $cost)
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <td class="w-70">{{ $cost['service'] }}<p class="text-muted">({{ $cost['cost'][0]['etd'] }} hari)</p></td>
                                        <td class="text-center align-middle text-danger">@currency($cost['cost'][0]['value'])</td>
                                    </tr>
                                </table>
                                @endforeach
                            @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>