<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIRajaOngkirController extends Controller
{
    /**
     * Get the API key from the environment variable.
     *
     * @return string
     */
    public function API_KEY(): string
    {
        // Get the API key from the environment variable
        $API_KEY = env('API_KEY_RAJAONGKIR');

        // Return the API key
        return $API_KEY;
    }

    /**
     * Get all provinces in Indonesia.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinces()
    {
        // Get the API key from the environment variable
        $API_KEY = $this->API_KEY();

        // Request the API to get all provinces
        $response = Http::withHeaders([
            'key' => $API_KEY
        ])->get('https://api.rajaongkir.com/starter/province');

        // Get the provinces from the response
        $provinces = $response['rajaongkir']['results'];

        // Return the provinces
        return response()->json([
            'success' => true,
            'message' => 'Get All Provinces',
            'data'    => $provinces
        ]);
    }
    
    
    /**
     * Get all cities by province ID.
     *
     * @param int $id Province ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities($id)
    {
        // Send a GET request to the RajaOngkir API to fetch cities by province ID
        $response = Http::withHeaders([
            'key' => $this->API_KEY()
        ])->get('https://api.rajaongkir.com/starter/city?&province='.$id);

        // Extract the city results from the API response
        $cities = $response['rajaongkir']['results'];

        // Return the cities in a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Get City By ID Provinces : '.$id,
            'data'    => $cities    
        ]);
    }
        
    /**
     * checkOngkir
     *
     * Use this method to check the cost of shipping from one place to another.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkOngkir(Request $request)
    {
        // Send a POST request to the RajaOngkir API to calculate the shipping cost
        $response = Http::withHeaders([
            'key' => $this->API_KEY()
        ])->post('https://api.rajaongkir.com/starter/cost', [
            // Origin city ID
            'origin'            => $request->origin,
            // Destination city ID
            'destination'       => $request->destination,
            // Package weight in grams
            'weight'            => $request->weight,
            // Courier name (use 'jne', 'tiki', or 'pos')
            'courier'           => $request->courier
        ]);

        // Extract the shipping cost results from the API response
        $ongkir = $response['rajaongkir']['results'];

        // Return the shipping cost results in a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Result Cost Ongkir',
            'data'    => $ongkir    
        ]);
    }
}
