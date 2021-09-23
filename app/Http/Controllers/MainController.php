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
     * Handling the weather request to our WC API.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public static function index(Request $request)
    {
        $city = $request->input('city', 'tehran');

        $response = Http::get(route('api.channel', $city));

        return view('weather.card')
            ->with('response', $response);
    }
}
