<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
     * @param string $city
     * @param Request $request
     * @return Application|Factory|View
     */
    public static function main(Request $request, string $city = 'tehran'): Factory|View|Application
    {
        $city = $request->input('city', $city);

        $response = Http::get(route('api.channel', $city));

        return view('weather.card')
            ->with('response', $response);
    }
}
