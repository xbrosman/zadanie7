<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\ErrorHandler\Debug;

class StatsController extends Controller
{
    public function show (Request $request){

        return view('stats')->with(['data' => 0 ]);    
    }
}
 
