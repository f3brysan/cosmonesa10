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
    public function getProvinces(): array
    {
        // Menyimpan API key RajaOngkir ke dalam variabel
        $API_KEY = env('API_KEY_RAJAONGKIR');

        // Membuat HTTP request GET ke API RajaOngkir
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'key' => $API_KEY
        ])->get('https://rajaongkir.komerce.id/api/v1/destination/province');

        // Jika respon berhasil, maka ambil data provinsi
        if ($response->successful()) {
            // Mengambil data provinsi dari respons JSON
            // Jika 'data' tidak ada, inisialisasi dengan array kosong
            $provinces = $response->json()['data'] ?? [];
        }

        // Return the provinces from the response
        return $provinces;
    }

    /**
     * Get all cities by province ID.
     *
     * @param  int  $provinceId  ID of the province
     * @return array  List of cities in the province
     */
    public function getCities($provinceId)
    {
        $API_KEY = env('API_KEY_RAJAONGKIR'); // atau gunakan config('services.rajaongkir.key')
        
        // Send a GET request to the RajaOngkir API to fetch cities by province ID
        $response = Http::withHeaders([            
            'Accept' => 'application/json',
            'key' => $API_KEY,
        ])->get("https://rajaongkir.komerce.id/api/v1/destination/city/{$provinceId}");

        if ($response->successful()) {

            // Mengambil data provinsi dari respons JSON
            // Jika 'data' tidak ada, inisialisasi dengan array kosong
            $cities = $response->json()['data'] ?? [];
        }
        return $cities;
    }
    
    /**
     * Get the shipping cost details from RajaOngkir API.
     *
     * @param  int  $origin      ID of the origin city (kecamatan)
     * @param  int  $destination  ID of the destination city (kecamatan)
     * @param  int  $weight       Weight in grams
     * @param  string  $courier    Courier code (jne, tiki, pos)
     * @return array  Shipping cost details
     */
    public function checkOngkir(int $origin, int $destination, int $weight, string $courier)
    {
        $API_KEY = env('API_KEY_RAJAONGKIR');

        // Send a POST request to the RajaOngkir API to calculate the shipping cost
        // https://rajaongkir.com/dokumentasi/cost
        $response = Http::asForm()->withHeaders([            
            'Accept' => 'application/json',
            'key'    => $API_KEY,
        ])->post('https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost', [
                'origin'      => $origin, // ID kecamatan Diwek (ganti sesuai kebutuhan)
                'destination' => $destination, // ID kecamatan tujuan
                'weight'      => $weight, // Berat dalam gram
                'courier'     => $courier, // Kode kurir (jne, tiki, pos)
        ]);

        if ($response->successful()) {

            // Mengambil data provinsi dari respons JSON
            // Jika 'data' tidak ada, inisialisasi dengan array kosong
            $ongkir = $response->json()['data'] ?? [];
        }
        return $ongkir;
    }
    
}
