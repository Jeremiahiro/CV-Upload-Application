<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Repositories\OtherDataRepository;
use Illuminate\Http\JsonResponse;
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
     * 
    */
    public function fetch_countries(Request $request): JsonResponse 
    {
        $response = $this->otherServices->get_countries($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch States
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country $country
     * 
    */
    public function fetch_states(Request $request, Country $country) 
    {
        $response = $this->otherServices->get_states($request->collect(), $country);
        return response()->json($response, 200);
    }

    /**
     * Fetch Qualifications for Secondary School
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_secondary_qualification(Request $request) 
    {
        $response = $this->otherServices->get_secondary_qualifications($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch Subjects for Secondary School
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_secondary_subjects(Request $request) 
    {
        $response = $this->otherServices->get_secondary_subjects($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch Grades for Secondary School
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_secondary_grades(Request $request) 
    {
        $response = $this->otherServices->get_secondary_grades($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch Tertiary Institutions
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_tertiary_institutions(Request $request) 
    {
        $response = $this->otherServices->get_tertiary_institutions($request->collect());
        return response()->json($response, 200);
    }

    
    /**
     * Fetch Tertiary Institution Types
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_tertiary_type(Request $request) 
    {
        $response = $this->otherServices->get_tertiary_types($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch Tertiary Institution Qualifications
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_tertiary_qualification(Request $request) 
    {
        $response = $this->otherServices->get_tertiary_qualifications($request->collect());
        return response()->json($response, 200);
    }

    
    /**
     * Fetch Tertiary Institution Courses
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_tertiary_course(Request $request) 
    {
        $response = $this->otherServices->get_tertiary_course($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch Tertiary Institution Course Types
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_tertiary_course_type(Request $request) 
    {
        $response = $this->otherServices->get_tertiary_course_type($request->collect());
        return response()->json($response, 200);
    }

    /**
     * Fetch Tertiary Institution Grade
     * @param  \Illuminate\Http\Request  $request
     * 
    */
    public function fetch_tertiary_grade(Request $request) 
    {
        $response = $this->otherServices->get_tertiary_grade($request->collect());
        return response()->json($response, 200);
    }
    
    
}
