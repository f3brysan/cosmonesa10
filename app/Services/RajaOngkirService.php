<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    /**
     * Get all provinces.
     *
     * @return array
     */
    public function getProvinces()
    {
        $API_KEY = env('API_KEY_RAJAONGKIR'); // atau gunakan config('services.rajaongkir.key')

        // Send a GET request to the RajaOngkir API
        $response = Http::withHeaders([
            'key' => $API_KEY
        ])->get('https://api.rajaongkir.com/starter/province');

        // Return the provinces from the response
        return $response['rajaongkir']['results'];
    }

    /**
     * Get all cities by province ID.
     *
     * @param  int  $provinceId
     * @return array
     */
    public function getCities($provinceId)
    {
        $API_KEY = env('API_KEY_RAJAONGKIR'); // atau gunakan config('services.rajaongkir.key')

        // Send a GET request to the RajaOngkir API to fetch cities by province ID
        $response = Http::withHeaders([
            'key' => $API_KEY
        ])->get('https://api.rajaongkir.com/starter/city?&province=' . $provinceId);

        // Extract the city results from the API response
        // @see https://rajaongkir.com/docs/starter/province for the API response format
        return $response['rajaongkir']['results'];
    }          
    
    /**
     * Get the shipping cost details from RajaOngkir API.
     *
     * @param  int  $origin
     * @param  int  $destination
     * @param  int  $weight
     * @param  string  $courier
     * @return array
     */
    public function checkOngkir(int $origin, int $destination, int $weight, string $courier)
    {
        $API_KEY = env('API_KEY_RAJAONGKIR');

        // Send a POST request to the RajaOngkir API to calculate the shipping cost
        $response = Http::withHeaders([
            'key' => $API_KEY
        ])->post('https://api.rajaongkir.com/starter/cost', [
            // Origin city ID
            'origin'            => $origin,
            // Destination city ID
            'destination'       => $destination,
            // Package weight in grams
            'weight'            => $weight,
            // Courier name (use 'jne', 'tiki', or 'pos')
            'courier'           => $courier
        ]);

        // Extract the shipping cost results from the API response
        return $response['rajaongkir']['results'];
    }
    
}
