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
use App\Models\CV;
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
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
     * 
    */
    public function secondary_education(CV $cv) 
    {
        $qualifications = $this->otherServices->get_secondary_qualifications();

        if(!$secondary_education = $this->otherServices->get_secondary_education()) {
            $secondary_education = null;
        }

        return view('v1.cv.secondary-education', compact(['cv', 'qualifications', 'secondary_education']));
    }

    /**
     * Create for secondary education details
     * 
     * @param  \App\Http\Requests\ContactDetailsRequest  $request
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
     * 
    */
    public function tertiary_institution(Cv $cv) 
    {
        $tertiary_types = $this->otherServices->get_tertiary_types();
        $qualifications = $this->otherServices->get_tertiary_qualifications();
        $tertiary_educations = $this->otherServices->get_tertiary_education($cv);

        return view('v1.cv.tertiary-institution', compact(['cv', 'tertiary_types', 'qualifications', 'tertiary_educations']));
    }

    
    /**
     * Create for tertiary institution
     * 
     * @param  \App\Http\Requests\TertiaryInstitutionRequest  $request
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Http\Requests\TertiaryInstitutionRequest  $request
     * @param  \App\Models\TertiaryEducation  $tertiary_edu
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
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
     * Display view for professional qualification
     * @param  \App\Models\CV  $cv
     * 
    */
    public function professional_qualification(Cv $cv) 
    {
        $qualification_types = $this->otherServices->get_professional_qualification_types($cv);
        $awarding_institutions = $this->otherServices->get_professional_institutions($cv);
        $professional_qualifications = $this->otherServices->get_professional_qualifications($cv);

        return view('v1.cv.professional-qualification', compact(['cv', 'qualification_types', 'awarding_institutions', 'professional_qualifications']));
    }
    
    /**
     * Create for professional qualification
     * 
     * @param  \App\Http\Requests\ProfessionalQualificationsRequest  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function create_professional_qualification(ProfessionalQualificationsRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_create_professional_qualification($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Update for professional qualification
     * 
     * @param  \App\Http\Requests\ProfessionalQualificationsRequest  $request
     * @param  \App\Models\Qualifications  $qualification
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_professional_qualification(ProfessionalQualificationsRequest $request, CV $cv, Qualifications $qualification) 
    {
        if(!$this->cvServices->handle_update_professional_qualification($request, $cv, $qualification)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }
        
    /**
     * Delete for professional qualification
     * 
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\Qualifications  $qualification
     * 
    */
    public function delete_professional_qualification(CV $cv, Qualifications $qualification) 
    {
        if(!$qualification->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }
    
    /**
     * Display view for nysc details
     * @param  \App\Models\CV  $cv
     * 
    */
    public function nysc_details(Cv $cv) 
    {
        $states = $this->otherServices->get_states_in_nigeria();
        return view('v1.cv.nysc-details', compact(['cv', 'states']));
    }
    
    /**
     * Create for nysc details
     * 
     * @param  \App\Http\Requests\NyscDetailsRequest  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_nysc_details(NyscDetailsRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_update_nysc_details($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        $type = $cv->employment_status ? 'current' : 'previous';
        return redirect()->route('cv.employement_history', [$cv, $type]);
    }

    /**
     * Display view for employement history
     * @param  \App\Models\CV  $cv
     * 
    */
    public function employement_history(Cv $cv, $type) 
    {
        $industry_sector = $this->otherServices->get_industry_sector($cv);
        $previous_experiecne = $this->otherServices->get_previous_experiecne($cv);

        return view('v1.cv.employment-history', compact(['cv', 'industry_sector', 'previous_experiecne', 'type']));
    }
    
    /**
     * Create for employement history
     * 
     * @param  \App\Http\Requests\ProfessionalQualificationsRequest  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function create_employement_history(JobExperienceRequest $request, CV $cv) 
    {
        if(!$experience = $this->cvServices->handle_create_job_experience($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        if($experience->is_current == 'current') {
            $type = 'previous';
            return redirect()->route('cv.employement_history', [$cv, $type]);
        }

        return redirect()->route('cv.employement_role', [$cv['uuid'], $experience['id']]);
    }

    /**
     * Update for employement history
     * 
     * @param  \App\Http\Requests\JobExperienceRequest  $request
     * @param  \App\Models\JobExperience  $employement
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_employement_history(JobExperienceRequest $request, CV $cv, JobExperience $employement) 
    {
        if(!$this->cvServices->handle_update_job_experience($request, $cv, $employement)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        if($employement->is_current == 'current') {
            $type = 'previous';
            return redirect()->route('cv.employement_history', [$cv, $type]);
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }
        
    /**
     * Delete for employement history
     * 
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\JobExperience  $employement
     * 
    */
    public function delete_employement_history(CV $cv, JobExperience $employement) 
    {
        if(!$employement->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for employement role
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\JobExperience  $employement
     * 
    */
    public function employement_role(Cv $cv, JobExperience $employement) 
    {
        $industry_sector = $this->otherServices->get_industry_sector($cv);
        $roles = $this->otherServices->get_employment_roles($employement);
        return view('v1.cv.employment-role', compact(['cv', 'industry_sector', 'employement', 'roles']));
    }

    
    /**
     * Create for employement role
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\JobExperience  $employement
     * @param  \App\Http\Requests\JobExperiecneRoleRequest  $request
     * 
     * 
    */
    public function create_employement_role(JobExperiecneRoleRequest $request, Cv $cv, JobExperience $employement) 
    {
        if(!$this->cvServices->handle_create_employement_role($request, $employement)){
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }

        if($employement->roles->count() != $employement->no_of_positions) {
            return redirect()->back()->with('success', 'Operation Successful');
        }
        return redirect()->route('cv.referee', $cv['uuid']);

    }

    /**
     * Update for employement role
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\JobExperience  $employement
     * 
    */
    public function update_employement_role(Request $request, Cv $cv, JobExperience $employement, JobExperienceRoles $role) 
    {
        if(!$this->cvServices->handle_update_employement_role($request, $employement, $role)){
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Delete for employement role
     * 
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\JobExperience  $employement
     * 
    */
    public function delete_employement_role(CV $cv, JobExperienceRoles $role) 
    {
        if(!$role->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for referee
     * @param  \App\Models\CV  $cv
     * 
    */
    public function referee(Cv $cv) 
    {
        $referees = $this->otherServices->get_referee($cv);

        return view('v1.cv.referee', compact(['cv', 'referees']));
    }
    
    /**
     * Create for referee
     * 
     * @param  \App\Http\Requests\RefereeRequest  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function create_referee(RefereeRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_create_referee($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Update for referee
     * 
     * @param  \App\Http\Requests\RefereeRequest  $request
     * @param  \App\Models\Referees  $referee
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_referee(RefereeRequest $request, CV $cv, Referees $referee) 
    {
        if(!$this->cvServices->handle_update_referee($request, $cv, $referee)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }
        
    /**
     * Delete for referee
     * 
     * @param  \App\Models\CV  $cv
     * @param  \App\Models\Referees  $referee
     * 
    */
    public function delete_referee(CV $cv, Referees $referee) 
    {
        if(!$referee->delete()) {
            return redirect()->back()->with('success', 'OOPS Something went wrong');
        }
        return redirect()->back()->with('success', 'Operation Successful');
    }

    /**
     * Display view for location preference
     * @param  \App\Models\CV  $cv
     * 
    */
    public function location_preference(Cv $cv) 
    {
        $states = $this->otherServices->get_states_in_nigeria();
        $industry_sector = $this->otherServices->get_industry_sector($cv);
        return view('v1.cv.location-preference', compact(['cv', 'states', 'industry_sector']));
    }

    /**
     * Create / update location preference
     * 
     * @param  \App\Http\Requests\LocationPreferenceRequest  $request
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_location_preference(LocationPreferenceRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_update_location_preference($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }

        if($cv->has_hobbies == true) {
            return redirect()->route('cv.hobbies', $cv['uuid']);
        }
        return redirect()->route('cv.show', $cv['uuid']);
    }

    /**
     * Display view for hobbies
     * @param  \App\Models\CV  $cv
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
     * @param  \App\Models\CV  $cv
     * 
    */
    public function update_hobbies(HobbiesRequest $request, CV $cv) 
    {
        if(!$this->cvServices->handle_update_hobbies($request, $cv)){
            return back()->with('error', 'An error occured! Refresh and try again');
        }
        return redirect()->route('cv.show', $cv['uuid']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CV  $cv
     * @return \Illuminate\Http\Response
    */
    public function destroy(CV $cv)
    {
        if(!$cv->delete()) {
            return 'false';
        }
        return 'true';
    }
}
