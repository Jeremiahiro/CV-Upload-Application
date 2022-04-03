<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactDetailsRequest;
use App\Http\Requests\CVRequest;
use App\Http\Requests\HobbiesRequest;
use App\Http\Requests\JobExperiecneRoleRequest;
use App\Http\Requests\JobExperienceRequest;
use App\Http\Requests\LocationPreferenceRequest;
use App\Http\Requests\NyscDetailsRequest;
use App\Http\Requests\ProfessionalQualificationsRequest;
use App\Http\Requests\RefereeRequest;
use App\Http\Requests\SecondaryEducationRequest;
use App\Http\Requests\TertiaryInstitutionRequest;
use App\Http\Requests\UpdateSecondaryEducationRequest;
use App\Models\Cv;
use App\Models\JobExperience;
use App\Models\JobExperienceRoles;
use App\Models\Qualifications;
use App\Models\Referees;
use App\Models\SecondaryEducation;
use App\Models\TertiaryEducation;
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
        // $this->middleware('is_profile_complete');
        // $this->middleware('permission:view-cv', ['only' => ['index','show']]);
        // $this->middleware('permission:create-cv', ['only' => ['create','store']]);
        // $this->middleware('permission:update-cv', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-cv', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$cv = Auth::user()->cv) {
            $cv = null;
        }
        return view('v1.cv.index', compact(['cv']));
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
     * Show the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cv = $this->otherServices->get_cv();
        return view('v1.cv.show', compact(['cv']));
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
    public function update(CVRequest $request, Cv $cv)
    {
        if(!$cv = $this->cvServices->handle_update_cv($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.contact-details', $cv);
    }

    /**
     * Display view for contact details
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function contact_details(Cv $cv) 
    {
        return view('v1.cv.contact-details', compact(['cv']));
    }

    /**
     * Update for contact details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_contact_details(ContactDetailsRequest $request, Cv $cv) 
    {
        if(!$cv = $this->cvServices->handle_update_contact_details($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.secondary-education', $cv);

    }

    /**
     * Display view for contact details
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function secondary_education(Cv $cv) 
    {
        if(!$secondary_education = $this->otherServices->get_secondary_education()) {
            $secondary_education = null;
        }
        return view('v1.cv.secondary_education.create', compact(['cv', 'secondary_education']));
    }

    /**
     * Create for secondary education details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function create_secondary_education(SecondaryEducationRequest $request, Cv $cv) 
    {
        if(!$this->cvServices->handle_create_secondary_education($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    public function edit_secondary_education(Cv $cv, SecondaryEducation $secondary_education) 
    {
        return view('v1.cv.secondary_education.edit', compact(['cv', 'secondary_education']));
    }

    /**
     * Update for secondary education details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function update_secondary_education(UpdateSecondaryEducationRequest $request, Cv $cv, SecondaryEducation $secondary_education) 
    {
        if(!$this->cvServices->handle_update_secondary_education($request, $cv, $secondary_education)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.secondary-education', $cv['uuid']);
    }

        
    /**
     * Delete for secondary education details
     * 
     * @param  \App\Models\Cv $cv
     * @param  \App\Models\SecondaryEducation  $secondary_edu
     * 
    */
    public function delete_secondary_education(Cv $cv, SecondaryEducation $secondary_education) 
    {
        if(!$secondary_education->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for tertiary institution
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function tertiary_institution(Cv $cv) 
    {
        $tertiary_educations = $this->otherServices->get_tertiary_education($cv);

        return view('v1.cv.tertiary_education.create', compact([
            'cv',
            'tertiary_educations'
        ]));
    }

    
    /**
     * Create for tertiary institution
     * 
     * @param  \App\Http\Requests\TertiaryInstitutionRequest  $request
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function create_tertiary_institution(TertiaryInstitutionRequest $request, Cv $cv) 
    {
        if(!$this->cvServices->handle_create_tertiary_education($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    public function edit_tertiary_institution(Cv $cv, TertiaryEducation $tertiary_education) 
    {
        return view('v1.cv.tertiary_education.edit', compact(['cv', 'tertiary_education']));
    }

    /**
     * Update for tertiary institution
     * 
     * @param  \App\Http\Requests\TertiaryInstitutionRequest  $request
     * @param  \App\Models\TertiaryEducation  $tertiary_edu
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function update_tertiary_institution(TertiaryInstitutionRequest $request, Cv $cv, TertiaryEducation $tertiary_education) 
    {
        if(!$this->cvServices->handle_update_tertiary_education($request, $cv, $tertiary_education)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        
        return redirect()->route('cv.tertiary-institution', $cv);
    }

    /**
     * Delete for tertiary education details
     * 
     * @param  \App\Models\Cv  $cv
     * @param  \App\Models\TertiaryEducation  $tertiary_edu
     * 
    */
    public function delete_tertiary_institution(Cv $cv, TertiaryEducation $tertiary_education) 
    {
        if(!$tertiary_education->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for professional qualification
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function professional_qualification(Cv $cv) 
    {
        $qualification = $this->otherServices->get_professional_qualifications($cv);
        return view('v1.cv.professional_qualification.create', compact(['cv', 'qualification']));
    }
    
    /**
     * Create for professional qualification
     * 
     * @param  \App\Http\Requests\ProfessionalQualificationsRequest  $request
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function create_professional_qualification(ProfessionalQualificationsRequest $request, Cv $cv) 
    {
        if(!$this->cvServices->handle_create_professional_qualification($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    public function edit_professional_qualification(Cv $cv, Qualifications $qualification) 
    {
        return view('v1.cv.professional_qualification.edit', compact(['cv', 'qualification']));
    }

    /**
     * Update for professional qualification
     * 
     * @param  \App\Http\Requests\ProfessionalQualificationsRequest  $request
     * @param  \App\Models\Qualifications  $qualification
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function update_professional_qualification(ProfessionalQualificationsRequest $request, Cv $cv, Qualifications $qualification) 
    {
        if(!$this->cvServices->handle_update_professional_qualification($request, $cv, $qualification)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }
        
    /**
     * Delete for professional qualification
     * 
     * @param  \App\Models\Cv  $cv
     * @param  \App\Models\Qualifications  $qualification
     * 
    */
    public function delete_professional_qualification(Cv $cv, Qualifications $qualification) 
    {
        if(!$qualification->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }
    
    /**
     * Display view for nysc details
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function nysc_details(Cv $cv) 
    {
        return view('v1.cv.nysc-details', compact(['cv']));
    }
    
    /**
     * Create for nysc details
     * 
     * @param  \App\Http\Requests\NyscDetailsRequest  $request
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function update_nysc_details(NyscDetailsRequest $request, Cv $cv) 
    {
        if(!$this->cvServices->handle_update_nysc_details($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        $type = $cv->employment_status ? 'current' : 'previous';
        return redirect()->route('cv.employment_history', [$cv, $type]);
    }

    /**
     * Display view for employment history
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function employment_history(Cv $cv, $type) 
    {
        $previous_experiecne = $this->otherServices->get_previous_experiecne($cv);
        return view('v1.cv.employment_history.create', compact(['cv', 'previous_experiecne', 'type']));
    }
    
    /**
     * Create for employment history
     * 
     * @param  \App\Http\Requests\ProfessionalQualificationsRequest  $request
     * @param  \App\Models\Cv $cv
     * 
    */
    public function create_employment_history(JobExperienceRequest $request, Cv $cv) 
    {
        if(!$experience = $this->cvServices->handle_create_job_experience($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        if($request->have_prior_role != '1') {
            $type = 'previous';
            return redirect()->route('cv.employment_history', [$cv, $type]);
        }

        return redirect()->route('cv.employment_role', [$cv['uuid'], $experience['id']]);
    }

    public function edit_employment_history(CV $cv, JobExperience $employment, $type) 
    {
        return view('v1.cv.employment_history.edit', compact(['cv', 'employment', 'type']));
    }

    /**
     * Update for employment history
     * 
     * @param  \App\Http\Requests\JobExperienceRequest  $request
     * @param  \App\Models\JobExperience  $employment
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_employment_history(JobExperienceRequest $request, CV $cv, JobExperience $employment) 
    {
        if(!$this->cvServices->handle_update_job_experience($request, $cv, $employment)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        if($request->have_prior_role != '1') {
            $type = 'previous';
            return redirect()->route('cv.employment_history', [$cv, $type]);
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }
        
    /**
     * Delete for employment history
     * 
     * @param  \App\Models\Cv  $cv
     * @param  \App\Models\JobExperience  $employment
     * 
    */
    public function delete_employment_history(Cv $cv, JobExperience $employment) 
    {
        foreach ($employment->roles as $key => $role) {
            $role->delete();
        }
        if(!$employment->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for employment role
     * @param  \App\Models\Cv  $cv
     * @param  \App\Models\JobExperience  $employment
     * 
    */
    public function employment_role(Cv $cv, JobExperience $employment) 
    {
        $roles = $this->otherServices->get_employment_roles($employment);
        return view('v1.cv.employment_history.roles.create', compact(['cv', 'employment', 'roles']));
    }

    
    /**
     * Create for employment role
     * @param  \App\Models\Cv  $cv
     * @param  \App\Models\JobExperience  $employment
     * @param  \App\Http\Requests\JobExperiecneRoleRequest  $request
     * 
    */
    public function create_employment_role(JobExperiecneRoleRequest $request, Cv $cv, JobExperience $employment) 
    {
        if(!$this->cvServices->handle_create_employment_role($request, $employment)){
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }

        if($employment->roles->count() != $employment->no_of_positions) {
            return redirect()->back()->with('success', 'Operation Successful');
        }
        return redirect()->route('cv.referee', $cv['uuid']);

    }

    public function edit_employment_role(CV $cv, JobExperience $employment, JobExperienceRoles $role) 
    {
        return view('v1.cv.employment_history.roles.edit', compact(['cv', 'employment', 'role']));
    }


    /**
     * Update for employment role
     * @param  \App\Models\Cv $cv
     * @param  \App\Models\JobExperience  $employment
     * 
    */
    public function update_employment_role(JobExperiecneRoleRequest $request, Cv $cv, JobExperience $employment, JobExperienceRoles $role) 
    {
        if(!$this->cvServices->handle_update_employment_role($request, $employment, $role)){
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Delete for employment role
     * 
     * @param  \App\Models\Cv $cv
     * @param  \App\Models\JobExperience  $employment
     * 
    */
    public function delete_employment_role(Cv $cv, JobExperienceRoles $role) 
    {
        if(!$role->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for referee
     * @param  \App\Models\Cv  $cv
     * 
    */
    public function referee(Cv $cv) 
    {
        $referees = $this->otherServices->get_referee($cv);
        return view('v1.cv.referee.create', compact(['cv', 'referees']));
    }
    
    /**
     * Create for referee
     * 
     * @param  \App\Http\Requests\RefereeRequest  $request
     * @param  \App\Models\Cv $cv
     * 
    */
    public function create_referee(RefereeRequest $request, Cv $cv) 
    {
        if(!$this->cvServices->handle_create_referee($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    public function edit_referee(Cv $cv, Referees $referee) 
    {
        return view('v1.cv.referee.edit', compact(['cv', 'referee']));
    }

    /**
     * Update for referee
     * 
     * @param  \App\Http\Requests\RefereeRequest  $request
     * @param  \App\Models\Referees  $referee
     * @param  \App\Models\Cv $cv
     * 
    */
    public function update_referee(RefereeRequest $request, Cv $cv, Referees $referee) 
    {
        if(!$this->cvServices->handle_update_referee($request, $cv, $referee)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }
        
    /**
     * Delete for referee
     * 
     * @param  \App\Models\Cv $cv
     * @param  \App\Models\Referees  $referee
     * 
    */
    public function delete_referee(Cv $cv, Referees $referee) 
    {
        if(!$referee->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for location preference
     * @param  \App\Models\Cv $cv
     * 
    */
    public function location_preference(Cv $cv) 
    {
        return view('v1.cv.location-preference', compact(['cv']));
    }

    /**
     * Create / update location preference
     * 
     * @param  \App\Http\Requests\LocationPreferenceRequest  $request
     * @param  \App\Models\Cv $cv
     * 
    */
    public function update_location_preference(LocationPreferenceRequest $request, Cv $cv) 
    {

        if(!$this->cvServices->handle_update_location_preference($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        if($cv->has_hobbies == 1) {
            return redirect()->route('cv.hobbies', $cv['uuid']);
        }
        return redirect()->route('cv.show', $cv['uuid']);
    }

    /**
     * Display view for hobbies
     * @param  \App\Models\Cv $cv
     * 
    */
    public function hobbies(Cv $cv) 
    {
        return view('v1.cv.hobbies', compact(['cv']));
    }

    /**
     * Create / update location preference
     * 
     * @param  \App\Http\Requests\HobbiesRequest  $request
     * @param  \App\Models\Cv $cv
     * 
    */
    public function update_hobbies(HobbiesRequest $request, Cv $cv) 
    {
        if(!$this->cvServices->handle_update_hobbies($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.show', $cv['uuid']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
    */
    public function destroy(Cv $cv)
    {
        if(!$cv->delete()) {
            return 'false';
        }
        return 'true';
    }
}
