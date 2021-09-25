<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Class ChannelController.
 *
 * @package App\Http\Controllers\API
 */
class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $city string city name
     * @return array
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
