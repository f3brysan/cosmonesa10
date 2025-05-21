<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RajaOngkirService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIRajaOngkirController extends Controller
{
     /**
     * Get all provinces from RajaOngkir API.
     *
     * @param \App\Services\RajaOngkirService $rajaOngkirService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinces(RajaOngkirService $rajaOngkirService)
    {
        // Get all provinces from RajaOngkir API
        $provinces = $rajaOngkirService->getProvinces();

        // Return the provinces in JSON response
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
    public function getCities(RajaOngkirService $rajaOngkirService, $id)
    {
        // Get all cities by province ID
        $cities = $rajaOngkirService->getCities($id);

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
    public function checkOngkir(RajaOngkirService $rajaOngkirService, Request $request)
    {
        // Get the origin, destination, and weight from the request
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $weight = $request->input('weight');
        $courier = 'jne';
        // Get the shipping cost results from RajaOngkir API
        $ongkir = $rajaOngkirService->checkOngkir($origin, $destination, $weight, $courier);

        // Return the shipping cost results in a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Result Cost Ongkir',
            'data'    => $ongkir    
        ]);
    }
}
