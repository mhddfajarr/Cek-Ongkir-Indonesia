<div class="container">
    <div class="row py-5">
        <div class="col-md-6">
            <h2 class="text-center fw-bold mb-4">Cek Ongkir</h2>
            <form wire:submit.prevent="cekOngkir">
                @csrf
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                        <select wire:model="origin" class="form-control" required>
                            <option value="">Pilih Kota Asal</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city['city_id'] }}">
                                    {{ $city['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4"> 
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                        <select wire:model="destination" class="form-control" required>
                            <option value="">Pilih Kota Tujuan</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city['city_id'] }}">
                                    {{ $city['city_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4"> 
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-weight-hanging"></i></span>
                        <input type="number" wire:model="weight" class="form-control" placeholder="Masukan Berat" required>
                        <span class="input-group-text">gram</span>
                    </div>
                </div>
                <div class="mb-4"> 
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-truck"></i></span>
                        <select wire:model="courier" class="form-control" required>
                            <option value="">Pilih Ekspedisi</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3 mb-5">
                    <input type="submit" name="cekOgkir" class="btn btn-dark w-100">
                </div>
            </form>
        </div>
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <div class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <p class="mt-2 text-white">Sedang memproses...</p>
            </div>
        </div>

        <div class="col-md-6 mt-6">
            @if (!empty($ongkir))
                <div class="card px-5 py-3 shadow ">
                    <h2 class="text-center fw-bold ">Rincian Ongkir</h2>
                    <table class="table table-bordered mt-2">
                        <tr>
                            <th class="w-25">Asal Kota</th>
                            <td>{{ $ongkir['origin_details']['city_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Kota Tujuan</th>
                            <td>{{ $ongkir['destination_details']['city_name'] }}</td>
                        </tr>
                        <tr>
                            <th>Berat</th>
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
                            @if(empty($result['costs']))
                            <div class="border hover-bg mb-2 px-3 py-2 radius d-flex justify-content-center align-items-center">
                                <p class="m-2">Tidak ada layanan yang tersedia.</p>
                            </div>
                            @else
                                @foreach ($result['costs'] as $cost)
                                    @foreach ($cost['cost'] as $detail )
                                    <div class="border hover-bg mb-2 px-3 py-2 radius">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                            <p class="p-0 m-0 fw-bold"> {{ $cost['service'] }}</p>
                                                @if (strpos(strtoupper($detail['etd']), 'HARI') !== false)
                                                    <p class="text-muted">({{ $detail['etd'] }})</p>
                                                @else
                                                    <p class="text-muted">({{ $detail['etd'] }} Hari)</p>
                                                @endif
                                            </div>
                                            <div class="col-4 text-center text-danger">
                                                <div class="d-flex align-items-center justify-content-center h-100 fw-bold">
                                                    @currency($detail['value'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                </div>
            @endif
        </div>
    </div>
</div>