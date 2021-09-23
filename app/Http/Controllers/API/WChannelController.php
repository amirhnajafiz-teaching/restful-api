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
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=8516dbc0b619c1a5b25dc01f1ce492b1");
        return $response->json();
    }
}
