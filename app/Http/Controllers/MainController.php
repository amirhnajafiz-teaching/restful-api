<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public static function index(Request $request)
    {
        $city = $request->input('city') ?? 'tehran';

        $response = Http::get(route('channel', $city));

        return view('weather.card')
            ->with('response', $response['data']);
    }
}
