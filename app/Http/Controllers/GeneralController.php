<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Repositories\OtherDataRepository;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    private $otherServices;

    public function __construct()
    {
        $this->otherServices = new OtherDataRepository;
    }

    
    /**
     * Fetch Country
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country $country
     * 
    */
    public function fetch_countries() 
    {
        $response = $this->otherServices->get_countries();
        return response()->json($response, 200);
    }

    /**
     * Fetch States
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country $country
     * 
    */
    public function fetch_states(Country $country) 
    {
        $response = $this->otherServices->get_states($country);
        return response()->json($response, 200);
    }
}
