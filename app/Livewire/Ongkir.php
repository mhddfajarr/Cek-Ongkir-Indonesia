<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Ongkir extends Component
{
    public $cities = [];
    public $origin;
    public $destination;
    public $weight;
    public $courier;
    public $ongkir = null;
    public $loading = false; 

    public function mount()
    {
        $response = Http::withHeaders([
            'key' => '630ce18590e4764a67f68a6e2c647d1d'
        ])->get('https://api.rajaongkir.com/starter/city');

        $this->cities = $response['rajaongkir']['results'];
    }

    public function cekOngkir()
    {
        $this->loading = true;
        $responseCost = Http::withHeaders([
            'key' => '630ce18590e4764a67f68a6e2c647d1d'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $this->origin,
            'destination' => $this->destination,
            'weight' => $this->weight,
            'courier' => $this->courier
        ]);
        
        $this->ongkir = $responseCost['rajaongkir'];
        // dd(  $this->ongkir);
        $this->loading = true;
    }

    public function render()
    {
        $this->loading = false; 
        return view('livewire.ongkir', [
            'cities' => $this->cities,
            'ongkir' => $this->ongkir,
            'loading' => $this->loading  
        ]);
    }
}
