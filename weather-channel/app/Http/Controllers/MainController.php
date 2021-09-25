<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mockery\Exception;
use PHPUnit\Framework\Error;
use Psy\Exception\ErrorException;
use function PHPUnit\Framework\isNull;

/**
 * Class MainController.
 *
 * @package App\Http\Controllers
 */
class MainController extends Controller
{
    /**
     * Home page method.
     *
     * @return Application|Factory|View
     */
    public static function index(): Factory|View|Application
    {
        return view('welcome');
    }

    /**
     * Handling the weather request to our WC API.
     *
     * @param Request $request
     * @param string $city
     * @return Factory|View|Application
     */
    public static function main(Request $request, string $city = 'tehran'): Factory|View|Application
    {
        $city = $request->get('city', $city);

        $location = Http::get('https://api.openweathermap.org/geo/1.0/direct', [
            'appid' => '8516dbc0b619c1a5b25dc01f1ce492b1',
            'q' => $city,
            'limit' => 1
        ])->json()[0] ?? null;

        if ($location == null) {
            abort(404);
        }

        $response = Http::get('https://api.openweathermap.org/data/2.5/onecall', [
            'appid' => '8516dbc0b619c1a5b25dc01f1ce492b1',
            'lat' => $location['lat'],
            'lon' => $location['lon'],
            'units' => 'metric',
        ]);

        return view('weather-card')
            ->with('location', $location)
            ->with('weather', $response->json());
    }
}
