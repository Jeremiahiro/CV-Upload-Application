<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactDetailsRequest;
use App\Http\Requests\CVRequest;
use App\Http\Requests\SecondaryEducationRequest;
use App\Http\Requests\TertiaryInstitutionRequest;
use App\Models\CV;
use App\Models\JobExperience;
use App\Models\SecondaryEducation;
use App\Models\TertiaryEducation;
use App\Models\TertiaryInstitutionTypes;
use App\Repositories\CvRepository;
use App\Repositories\OtherDataRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CVController extends Controller
{
    private $cvServices;
    private $otherServices;

    public function __construct()
    {
        $this->cvServices = new CvRepository;
        $this->otherServices = new OtherDataRepository;
        $this->middleware('is_profile_complete');
        $this->middleware('permission:view-cv', ['only' => ['index','show']]);
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
        // $data = $this->cvServices->handle_get_data($request);
        // return $data;
        return view('v1.cv.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$cv = Auth::user()->cv) {
            $cv = null;
        }
        return view('v1.cv.create', compact(['cv']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CVRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CVRequest $request)
    {
        if(!$cv = $this->cvServices->handle_create_cv($request)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.contact-details', $cv);
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CVRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CVRequest $request, CV $cv)
    {
        if(!$cv = $this->cvServices->handle_update_cv($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.contact-details', $cv);
    }

    /**
     * Display view for contact details
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function contact_details(Cv $cv) 
    {
        $countries = $this->otherServices->get_countries();
        return view('v1.cv.contact-details', compact(['cv', 'countries']));
    }

    /**
     * Update for contact details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function update_contact_details(ContactDetailsRequest $request, CV $cv) 
    {
        if(!$cv = $this->cvServices->handle_update_contact_details($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.secondary-education', $cv);

    }

    /**
     * Display view for contact details
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function secondary_education(CV $cv) 
    {
        $qualifications = $this->otherServices->get_secondary_qualifications();
        return view('v1.cv.secondary-education', compact(['cv', 'qualifications']));
    }

    /**
     * Create for secondary education details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function create_secondary_education(SecondaryEducationRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_create_secondary_education($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Update for secondary education details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function update_secondary_education(SecondaryEducationRequest $request, CV $cv, SecondaryEducation $secondary_education) 
    {
        if(!$this->cvServices->handle_update_secondary_education($request, $cv, $secondary_education)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

        
    /**
     * Delete for secondary education details
     * 
     * @param  \App\Models\CV  $cV
     * @param  \App\Models\SecondaryEducation  $secondary_edu
     * 
    */
    public function delete_secondary_education(CV $cv, SecondaryEducation $secondary_edu) 
    {
        if(!$secondary_edu->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for tertiary institution
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function tertiary_institution(Cv $cv) 
    {
        $tertiary_types = $this->otherServices->get_tertiary_institutions_types();
        $qualifications = $this->otherServices->get_tertiary_qualifications();

        return view('v1.cv.tertiary-institution', compact(['cv', 'tertiary_types', 'qualifications']));
    }

    
    /**
     * Create for tertiary institution
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function create_tertiary_institution(TertiaryInstitutionRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_create_tertiary_education($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Update for tertiary institution
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function update_tertiary_institution(TertiaryInstitutionRequest $request, CV $cv, TertiaryEducation $tertiary_edu) 
    {
        if(!$this->cvServices->handle_update_tertiary_education($request, $cv, $tertiary_edu)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

        
    /**
     * Delete for tertiary education details
     * 
     * @param  \App\Models\CV  $cV
     * @param  \App\Models\TertiaryEducation  $tertiary_edu
     * 
    */
    public function delete_tertiary_institution(CV $cv, TertiaryEducation $tertiary_edu) 
    {
        if(!$tertiary_edu->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    
    /**
     * Display view for Employment History
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function employement_history(Cv $cv) 
    {
        $sectors = $this->otherServices->get_industry_sector();
        return view('v1.cv.employment-history', compact(['cv', 'sectors']));
    }

    /**
     * Update for Employment History
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cV
     * 
    */
    public function update_employement_history(ContactDetailsRequest $request, CV $cv) 
    {
        

        // if(!$cv = $this->cvServices->handle_update_contact_details($request, $cv)){
        //     return back()->with('error', 'An error occured! Refresh and try again');
        // }
        // return redirect()->route('cv.secondary-education', $cv);

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

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\CV  $cV
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, CV $cv, $type)
    // {
    //     $response = false;
    //     switch ($type) {
    //         case 'cv':
    //             $response = $this->update_cv($request, $cv);
    //             break;
    //         case 'secondary_education':
    //             $response = $this->update_secondary_education($request, $cv);
    //             break;
    //         case 'tertiary_education':
    //             $response = $this->update_tertiary_education($request, $cv);
    //             break;
    //         case 'qualification':
    //             $response = $this->update_qualification($request, $cv);
    //             break;      
    //         case 'nysc_detail':
    //             $response = $this->update_nysc_detail($request, $cv);
    //             break; 
    //         case 'referee':
    //             $response = $this->update_referee($request, $cv);
    //             break; 

    //             if(!$response) {
    //                 return 'false';
    //             }
    //             return 'true';
    //     }
    // }

    // /**
    //  * Update cv resource
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_cv(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'first_name' => 'required|string',
    //         'middle_name' => 'nullable|string',
    //         'last_name' => 'required|string',
    //         'dob' => 'required|date',
    //         'sex' => 'required|string',
    //         'town' => 'required|string',
    //         'street' => 'required|string',
    //         'mobile_phone' => 'nullable|string',
    //         'home_phone' => 'nullable|string',
    //         'email' => 'required|email',
    //         'preferred_employment_industry' => 'required|string',
    //         'hobbies' => 'required|json',
    //         'additional_information' => 'required|string',
    //         'no_of_secondary_school' => 'required|string',
    //         'preferred_employment_city' => 'required|string',
    //         'additional_infcountry_idormation' => 'required|string',
    //         'state_id' => 'required|string',
    //         'city_id' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_cv($request, $cv);
    // }

    // /**
    //  * Update secondary school information
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_secondary_education(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'type' => 'required|string',
    //         'other_type' => 'nullable|string',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date',
    //         'qualification' => 'required|string',
    //         'professional_qualification' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_secondary_education($request, $cv);
    // }

    // /**
    //  * Update tertiary school information
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_tertiary_education(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date',
    //         'qualification' => 'required|string',
    //         'status' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_tertiary_education($request, $cv);
    // }

    // /**
    //  * Update qualification
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_qualification(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'title' => 'required|string',
    //         'type' => 'required|string',
    //         'other_type' => 'nullable|string',
    //         'date' => 'required|date',
    //         'institution' => 'required|string',
    //         'completed_nysc' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_qualification($request, $cv);
    // }

    // /**
    //  * Update NYSC data
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_nysc_detail(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'date' => 'required|date',
    //         'ref_for_location' => 'required|string',
    //         'employed' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_nysc_detail($request, $cv);
    // }

    // /**
    //  * Update Job Experience
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_update_job_experience(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'employer' => 'required|string',
    //         'industry' => 'required|string',
    //         'other_industry' => 'nullable|string',
    //         'employment_date' => 'required|date',
    //         'role' => 'required|string',
    //         'job_description' => 'required|string',
    //         'no_of_positions' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_job_experience($request, $cv);
    // }

    // /**
    //  * Update Job Experience
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_job_experience_roles(Request $request, CV $cv, JobExperience $jobExperience)
    // {
    //     $request->validate([
    //         'position' => 'required|string',
    //         'start_date' => 'required|date',
    //         'end_date' => 'nullable|date',
    //         'job_description' => 'required|string',
    //         'no_of_positions' => 'required|string',
    //         'referees' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_job_experience($request, $cv, $jobExperience);
    // }

    // /**
    //  * Update Referee data
    //  *
    //  * @param  \App\Models\CV  $cV
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    // */
    // public function update_referee(Request $request, CV $cv)
    // {
    //     $request->validate([
    //         'employer' => 'required|string',
    //         'industry' => 'required|string',
    //         'other_industry' => 'nullable|string',
    //         'employment_date' => 'required|date',
    //         'role' => 'required|string',
    //         'job_description' => 'required|string',
    //         'no_of_positions' => 'required|string',
    //     ]);

    //     return $this->cvServices->handle_update_referee($request, $cv);
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
    */
    public function destroy(CV $cV)
    {
        if(!$cV->delete()) {
            return 'false';
        }
        return 'true';
    }
}
