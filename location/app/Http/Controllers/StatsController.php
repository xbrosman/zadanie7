<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\ErrorHandler\Debug;

class StatsController extends Controller
{
    public function show (Request $request){
        $queryRes = Location::select('country', 'alphacode', DB::raw('COUNT(*) as count'))->groupBy('country', 'alphacode')->get();        
        return view('stats')->with(['queryRes' => $queryRes ]);    
    }

    public function showCountry (Request $request, $country){
        $queryRes = Location::all()->where('coutry', $country);
        return view('stats')->with(['queryRes' => $queryRes ]);    
    }
}
 
