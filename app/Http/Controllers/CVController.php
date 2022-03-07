<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Repositories\CvRepository;
use Illuminate\Http\Request;

class CVController extends Controller
{

    private $cvServices;

    public function __construct(CvRepository $cvServices)
    {
        $this->cvServices = $cvServices;
        $this->middleware('permission:view-cv|create-cv|update-cv|delete-cv', ['only' => ['index','show']]);
        $this->middleware('permission:create-cv', ['only' => ['create','store']]);
        $this->middleware('permission:update-cv', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-cv', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->cvServices->handle_get_data($request);
        return $data;
        // return view('')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$response = $this->cvServices->handle_create_cv($request)){
            return 'false';
        }
        return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function show(CV $cV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function edit(CV $cV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CV $cV, $type)
    {
        $response = false;
        switch ($type) {
            case 'cv':
                $response = $this->cvServices->handle_update_cv($request, $cV);
                break;
                case 'secondary_education':
                    $cv = CV::find($request['id']);
                    $response = $this->cvServices->handle_update_secondary_education($request, $cV);
                    break;
                    case 'tertiary_education':
                        $cv = CV::find($request['id']);
                        $response = $this->cvServices->handle_update_tertiary_education($request, $cV);
                        break;
                        case 'qualification':
                            $cv = CV::find($request['id']);
                            $response = $this->cvServices->handle_update_qualification($request, $cV);
                            break;      
                            case 'nysc_detail':
                                $cv = CV::find($request['id']);
                                $response = $this->cvServices->handle_update_nysc_detail($request, $cV);
                                break; 
                                case 'job_experience':
                                    $cv = CV::find($request['id']);
                                    $response = $this->cvServices->handle_update_job_experience($request, $cV);
                                    break; 
                                    case 'referee':
                                        $cv = CV::find($request['id']);
                                        $response = $this->cvServices->handle_update_referee($request, $cV);
                                        break; 
                break;

                if(!$response) {
                    return 'false';
                }
                return 'true';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function destroy(CV $cV)
    {
        //
    }
}
