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
     * @return JsonResponse
     */
    public function index(string $city): JsonResponse
    {
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=8516dbc0b619c1a5b25dc01f1ce492b1");
        return \response()->json([
            'data' => $response
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
