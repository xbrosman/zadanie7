<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\ErrorHandler\Debug;

class LocationController extends Controller
{
    public function search (Request $request){
       $query = $request->input('place'); 
       $response = Http::get('http://api.positionstack.com/v1/forward', [
        'access_key' => '8ca0444390d8e0214a1d0469f03d10a0',
        'query' => $query,
        ]);   

    $parsed = json_decode($response);

    $location = new Location();
    $location->query = $query;

    $location->country = $parsed->data[0]->country;
    $location->latitude = $parsed->data[0]->latitude;
    $location->longitude = $parsed->data[0]->longitude;
    $location->save();

    $weatherResponse = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
        'lat'=>$location->latitude,
        'lon'=>$location->longitude,
        'cnt' => 10,
        'appid'=>'045b1eaae04ab7b5c4158cd8b0aa1468',
        'units'=>'metric'
        ]);  
    $weatherParsed = json_decode($weatherResponse);
    return view('welcome')->with(['location' => $location, 'weather' => $weatherParsed]);
    
    }
}
 
