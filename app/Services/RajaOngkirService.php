<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    public function getProvinces()
    {
        $API_KEY = env('API_KEY_RAJAONGKIR'); // atau gunakan config('services.rajaongkir.key')

        $response = Http::withHeaders([
            'key' => $API_KEY
        ])->get('https://api.rajaongkir.com/starter/province');

        return $response['rajaongkir']['results'];
    }

    public function getCities($provinceId)
    {
        $API_KEY = env('API_KEY_RAJAONGKIR'); // atau gunakan config('services.rajaongkir.key')

        // Send a GET request to the RajaOngkir API to fetch cities by province ID
        $response = Http::withHeaders([
            'key' => $API_KEY
        ])->get('https://api.rajaongkir.com/starter/city?&province=' . $provinceId);

        // Extract the city results from the API response        
        return $response['rajaongkir']['results'];
    }           
}
