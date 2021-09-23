<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

/**
 * Class WChannelController.
 *
 * @package App\Http\Controllers\API
 */
class WChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $city string city name
     * @return array|mixed
     */
    public function index(string $city = 'tehran') : array
    {
        $location = Http::get('https://api.openweathermap.org/geo/1.0/direct', [
            'appid' => '8516dbc0b619c1a5b25dc01f1ce492b1',
            'q' => $city,
            'limit' => 1
        ])->json()[0];

        $response = Http::get('https://api.openweathermap.org/data/2.5/onecall', [
            'appid' => '8516dbc0b619c1a5b25dc01f1ce492b1',
            'lat' => $location['lat'],
            'lon' => $location['lon'],
            'units' => 'metric',
        ]);

        return $response->json();
    }
}
