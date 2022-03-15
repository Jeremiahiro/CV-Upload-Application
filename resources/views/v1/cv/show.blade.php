@extends('v1.layouts.app')
@section('title')
Preview CV
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="CV View" />
        <div class="px-5 py-3">
            <div class="mb-3 d-flex">
                <button class="btn btn-secondary px-4" href="{{ route('cv.index') }}">Edit</button>
                <button class="btn btn-warning px-4 mx-3" href="{{ route('cv.index') }}">Save</button>
            </div>

            <div style="background: rgba(184, 184, 184, 0.3);border-bottom-color: rgb(194,196,212)">
                <div style="margin: 0px;padding-right: auto;">
                    <div style="margin: 30px;background: transparent;margin-bottom: 0px;">
                        <div
                            style="margin: 30px;margin-top: 0;padding-top: 10px;padding-left: 30px;margin-bottom: 15px;">
                            <div style="height: 60px;width: 2px;background: black;"></div>
                            <div style="padding-left: 30px;">
                                <h3
                                    style="color: black;font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;">
                                    {{ $cv->first_name }}
                                </h3>
                                <h3
                                    style="color: black;font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;">
                                    {{ $cv->last_name }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div style="background: transparent;width: 100%;">
                        <div class="">
                            <div class="row" style="margin-left: 0px;">
                                <div class="col-md-4 d-xl-flex justify-content-xl-center align-items-xl-center"
                                    style="background: var(--bs-yellow);">
                                    <div style="height: 102px;width: 4px;background: #ffffff;margin-left: -77px;"></div>
                                    <div>
                                        <div class="d-xl-flex justify-content-xl-center align-items-xl-center"
                                            style="padding: 0px;height: 80px;">
                                            <h4 class="text-uppercase"
                                                style="color: black;font-family: Poppins, sans-serif;padding-left: 10px;">
                                                {{ $cv->title() }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-xxl-flex align-items-xxl-center" style="padding-left: 20px;">
                                    <div>
                                        <p class="d-xxl-flex align-items-xxl-center"
                                            style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-geo-alt fs-4"
                                                style="color: var(--bs-yellow);margin-right: 15px;">
                                                <path
                                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z">
                                                </path>
                                                <path
                                                    d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                </path>
                                            </svg>
                                            {{ Str::limit(($cv->street . ', ' . $cv->state->name . ', ' . $cv->country->name), 50) }}
                                        </p>
                                        <p class="d-xxl-flex align-items-xxl-center"
                                            style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;">
                                            <i class="fa fa-calendar fs-4"
                                                style="color: var(--bs-yellow);margin-right: 15px;"></i>&nbsp;
                                            {{ \Carbon\Carbon::parse($cv->dob)->format('d/m/Y') }}
                                        </p>
                                        <p class="d-xxl-flex align-items-xxl-center"
                                            style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-right fs-4"
                                                style="color: var(--bs-yellow);margin-right: 15px;">
                                                <path
                                                    d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z">
                                                </path>
                                            </svg>&nbsp;{{ $cv->gender }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 d-xxl-flex align-items-xxl-center" style="padding-left: 20px;">
                                    <div>
                                        <p class="d-xxl-flex align-items-xxl-center"
                                            style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-4"
                                                style="color: var(--bs-yellow);margin-right: 15px;">
                                                <path
                                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                                </path>
                                            </svg>{{ $cv->mobile_phone }}</p>
                                        <p class="d-xxl-flex align-items-xxl-center"
                                            style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-4"
                                                style="color: var(--bs-yellow);margin-right: 15px;">
                                                <path
                                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                                </path>
                                            </svg>&nbsp;{{ $cv->home_phone }}</p>
                                        <p class="d-xxl-flex align-items-xxl-center"
                                            style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope fs-4"
                                                style="color: var(--bs-yellow);margin-right: 15px;">
                                                <path fill-rule="evenodd"
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                                                </path>
                                            </svg>&nbsp;{{ $cv->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" style="font-family: Poppins, sans-serif;color: black;">
                    <div class="row py-5">
                        <div class="col-md-4">
                            <div class="row flex-column">
                                {{-- Secondary Education --}}
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    Secondary Education
                                                </h4>
                                            </div>
                                            @foreach ($cv->secondary_educations as $secondary_education)
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <h5 class="font-bold">{{ $secondary_education->name }}</h5>
                                                <p class="m-1">
                                                    {{ \Carbon\Carbon::parse($secondary_education->start_date)->format('Y') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($secondary_education->end_date)->format('Y') }}
                                                </p>
                                                <h5>{{ $secondary_education->qualification->name }}</h5>
                                            </div>

                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div
                                            style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>

                                {{-- Tertiary Institutions --}}
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    Tertiary Institutions
                                                </h4>
                                            </div>
                                            @foreach ($cv->tertiary_educations as $institution)
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <h5 class="font-bold">
                                                    {{ $institution->institution->name }}
                                                </h5>
                                                <p class="m-1">
                                                    {{ $institution->institution_type ? $institution->institution_type->name : $institution->other_type }}
                                                </p>
                                                <p class="p-0 m-0">
                                                    {{ \Carbon\Carbon::parse($institution->start_date)->format('Y') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($institution->end_date)->format('Y') }}
                                                </p>
                                                <h5>{{ $institution->qualification->name }}</h5>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div
                                            style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>

                                {{-- Referees --}}
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    Referees
                                                </h4>
                                            </div>
                                            @foreach ($cv->referees as $referee)
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <h5 class="">{{ $referee->name }}</h5>
                                                <p class="m-1">
                                                    {{ $referee->email }}
                                                </p>
                                                <p class="m-1">
                                                    {{ $referee->phone }}
                                                </p>
                                                <p class="m-1">
                                                    {{ $referee->address }}
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div
                                            style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row flex-column">
                                {{-- Professional Qualifications --}}
                                @if ($cv->professional_qualification)
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    Professional Qualifications
                                                </h4>
                                            </div>
                                            @foreach ($cv->qualifications as $qualification)
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <h5 class="font-bold">{{ $qualification->name }}</h5>
                                                <p class="m-1">
                                                    {{ $qualification->qualification ? $qualification->qualification->name : $qualification->other_qualification_type }}
                                                </p>
                                                <p class="m-1">
                                                    {{ \Carbon\Carbon::parse($qualification->date)->format('d/m/Y') }}
                                                </p>
                                                <p class="m-1"
                                                    title="{{ $qualification->awarding_institution ? $qualification->awarding_institution->name : $qualification->other_institutions_type }}">
                                                    {{ Str::limit($qualification->awarding_institution ? $qualification->awarding_institution->name : $qualification->other_institutions_type, 40) }}
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- NYSC Service Year --}}
                                @if ($cv->nysc_detail)
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                        NYSC Service Year
                                                </h4>
                                            </div>
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <h5 class="font-bold">
                                                    {{ $cv->nysc_detail->state->name }}
                                                </h5>
                                                <p class="m-1">
                                                    {{ \Carbon\Carbon::parse($cv->nysc_detail->date)->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div
                                            style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- My Location and Industry Employment Preferences --}}
                                @if ($cv->preferred_state || $cv->preferred_industry)
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    My Location and Industry Employment Preferences
                                                </h4>
                                            </div>

                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <p class="m-1">
                                                    {{ $cv->preferred_state->name }}
                                                </p>
                                                <p class="m-1">
                                                    {{ $cv->preferred_industry->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div
                                            style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row flex-column">
                                {{-- Experience --}}
                                @if ($cv->job_expereinces)
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    Experience
                                                </h4>
                                            </div>
                                            @foreach ($cv->job_expereinces as $expereince)
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <h5 class="font-bold">{{ $expereince->employer }}</h5>
                                                <p class="m-1">
                                                    {{ $expereince->role }}
                                                </p>
                                                <p class="m-1">
                                                    {{ \Carbon\Carbon::parse($expereince->date)->format('d/m/Y') }}
                                                </p>
                                                <p class="m-1">
                                                    {{ Str::limit($expereince->job_description, 40) }}
                                                </p>
                                                <p class="m-1">
                                                    {{ Str::limit($expereince->sector ? $expereince->sector->name : $expereince->other_industry, 40) }}
                                                </p>
                                                <p class="m-1">
                                                    {{ $expereince->no_of_positions }} Position(s)
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- Hobbies --}}
                                @if ($cv->has_hobbies)
                                <div class="col"
                                    style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                                    <div>
                                        <div class="d-grid float-none">
                                            <div class="d-flex">
                                                <i class="fa fa-circle fs-5 text-start d-inline-block"
                                                    style="color: var(--bs-yellow);width: 17px;margin-right: 24px; margin-top: 6px"></i>
                                                <h4 class="d-inline-block font-bold text-uppercase">
                                                    Hobbies
                                                </h4>
                                            </div>
                                            <div class="mb-2"
                                                style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">
                                                <p class="m-1">
                                                    {{ json_decode($cv->hobbies) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center" style="text-align: center;">
                                        <div
                                            style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
