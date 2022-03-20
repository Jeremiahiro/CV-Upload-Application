@extends('v1.layouts.app')
@section('title')
CV View
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="CV View" />
        <div class="px-5 py-3">
            <div class="row flex-wrap d-flex">
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Personal details</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.create') }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.personal_details', $cv)
                    </div>
                </div>
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Contact details</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.contact-details', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.contact_details', $cv)
                    </div>
                </div>
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Secondary Education</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.secondary-education', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.secondary_education', $cv)
                    </div>
                </div>


                {{--  --}}

                @if ($cv->tertiary_educations)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Tertiary Institution</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.tertiary-institution', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.tertiary_institution', $cv)
                    </div>
                </div>
                @endif
                @if ($cv->qualifications)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Professional Qualification</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.professional-qualification', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.professional_qualification', $cv)
                    </div>
                </div>
                @endif
                {{-- @if ($cv->nysc_detail) --}}
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Your NYSC Service Year</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.nysc_details', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.nysc_details', $cv)
                    </div>
                </div>
                {{-- @endif --}}


                {{--  --}}
                @if ($cv->job_expereinces)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Current Employement History</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.employement_history', [$cv, 'current']) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.employement_history', [$cv, $type = 'current'])
                    </div>
                </div>
                @endif
                @if ($cv->job_expereinces)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Previous Employement History</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.employement_history', [$cv, 'previous']) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.employement_history', [$cv, $type = 'previous'])
                    </div>
                </div>
                @endif
                @if ($cv->job_expereinces)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Professional Qualification</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.employement_role', [$cv, 1]) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.employement_role', $cv)
                    </div>
                </div>
                @endif


                {{--  --}}
                @if ($cv->referees)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Referee</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.referee', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.referees', $cv)
                    </div>
                </div>
                @endif
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Your Industry and Location Preference</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.location_preference', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.location_preference', $cv)
                    </div>
                </div>
                @if ($cv->has_hobbies)
                <div class="col col-4 flex-1" style="margin-bottom: 40px">
                    <div>
                        <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Hobbies and Other Information</p>
                    </div>
                    <div class="htmlContents" data-link="{{ route('cv.hobbies', $cv) }}" style="cursor:pointer; overflow: hidden">
                        @include('v1.cv.partials.hobbies', $cv)
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
    .htmlContents * {font-size:6px!important;}
</style>
@endsection
@push('javascript')
<script>
    $(document).ready(function() {
        $("[data-link]").click(function() {
            window.location.href = $(this).attr("data-link");
            return false;
        });
    });
</script>
@endpush
