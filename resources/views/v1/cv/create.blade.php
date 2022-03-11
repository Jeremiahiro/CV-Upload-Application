@extends('v1.user.layouts.app')
@section('title')
Add CV
@endsection
@section('main')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content" style="background: #ffffff;">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"
            style="border-bottom: 1px solid var(--bs-yellow);">
            <div class="container-fluid">
                <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i
                        class="fas fa-bars"></i></button>
                <h3 class="fw-bold" style="color: black;font-weight: bold;width: auto;">Add CV</h3>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
            </div>
        </nav>
        <div class="container-fluid">
            <section>
                <div id="multple-step-form-n" class="container overflow-hidden"
                    style="margin-top: 0px;margin-bottom: 10px;padding-bottom: 300px;padding-top: 57px;">
                    <div id="progress-bar-button" class="multisteps-form" style="text-align: left;">
                        <div class="d-lg-flex justify-content-lg-center align-items-lg-center row"
                            style="text-align: center;">
                            <div class="col-12 col-lg-8 ml-auto mr-auto mb-4" style="text-align: center;">
                                <div class="multisteps-form__progress" style="text-align: center;"><a
                                        class="btn multisteps-form__progress-btn js-active" role="button"
                                        title="User Info" style="color: var(--bs-yellow);"></a><a
                                        class="btn multisteps-form__progress-btn" role="button" title="User Info"></a><a
                                        class="btn multisteps-form__progress-btn" role="button"
                                        title="User Info">&nbsp;</a><a class="btn multisteps-form__progress-btn"
                                        role="button" title="User Info">&nbsp;</a><a
                                        class="btn multisteps-form__progress-btn" role="button"
                                        title="User Info">&nbsp;</a><a class="btn multisteps-form__progress-btn"
                                        role="button" title="User Info">&nbsp;</a><a
                                        class="btn multisteps-form__progress-btn" role="button"
                                        title="User Info">&nbsp;</a><a class="btn multisteps-form__progress-btn"
                                        role="button" title="User Info">&nbsp;</a><a
                                        class="btn multisteps-form__progress-btn" role="button"
                                        title="User Info">&nbsp;</a><a class="btn multisteps-form__progress-btn"
                                        role="button" title="User Info">&nbsp;</a><a
                                        class="btn multisteps-form__progress-btn" role="button"
                                        title="User Info">&nbsp;</a><a class="btn multisteps-form__progress-btn"
                                        role="button" title="User Info">&nbsp;</a></div>
                            </div>
                        </div>
                    </div>
                    <div id="multistep-start-row" class="row">
                        <div id="multistep-start-column" class="col-12 col-lg-8 m-auto">
                            <form id="main-form" class="multisteps-form__form">
                                <div id="single-form-next"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white js-active"
                                    data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Personal details</p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content" class="multisteps-form__content">
                                        <div id="input-grp-double" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" placeholder="First Name"
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div><label class="form-label">Middle Name</label><input
                                                    class="form-control" type="text" placeholder="Middle Name"
                                                    style="margin-bottom: 15px;"></div>
                                            <div><label class="form-label">Surname / Last Name</label><input
                                                    class="form-control" type="text" placeholder="Surname / Last Name"
                                                    style="margin-bottom: 15px;"></div>
                                            <div><label class="form-label">Date of birth</label><input
                                                    class="form-control" type="date" style="margin-bottom: 15px;"></div>
                                            <div style="margin-bottom: 15px;">
                                                <label class="form-label">Sex</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                </div>
                                            </div>
                                            <!-- <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                    height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                    class="bi bi-plus-circle fs-4"
                                                    style="color: var(--bs-yellow);font-weight: bold;border-width: 2px;">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                    </path>
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                                    </path>
                                                </svg>
                                                <a href="#"
                                                    style="color: var(--bs-yellow);font-weight: bold;margin-left: 15px;">&nbsp;Add
                                                Emplyee</a>
                                            </div> -->
                                        </div>
                                        <div class="text-primary button-row d-flex mt-4" id="next-button"
                                            style="background: transparent;color: black !important;--bs-primary: #f6c23e;--bs-primary-rgb: 246,194,62;--bs-body-color: black;">
                                            <button class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <div id="form-content" class="multisteps-form__content">
                                        <div id="input-grp-double" class="form-row mt-4">
                                            <p style="margin-bottom: 0;color: black;font-weight: bold;">Contact details
                                            </p>
                                            <small
                                                style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                                provide the following information</small>
                                            <div id="form-content" class="multisteps-form__content">
                                                <div id="input-grp-double" class="form-row mt-4">
                                                    <div><label class="form-label">Town / Locality</label><input
                                                            class="form-control" type="text" placeholder="First Name"
                                                            style="margin-bottom: 15px;"></div>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                            <label class="form-label">State</label>
                                                            <select class="form-select" style="margin-bottom: 15px;">
                                                                <option value="1" selected="">Lagos</option>
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                            <label class="form-label">Country</label>
                                                            <select class="form-select" style="margin-bottom: 15px;">
                                                                <option value="1" selected="">Nigeria</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div><label class="form-label">Street</label><input class="form-control"
                                                        type="text" placeholder="" style="margin-bottom: 15px;"></div>
                                                <div><label class="form-label">Mobile Phone Number</label><input
                                                        class="form-control" type="text" placeholder=""
                                                        style="margin-bottom: 15px;"></div>
                                                <div><label class="form-label">Home Phone Number</label><input
                                                        class="form-control" type="text" placeholder=""
                                                        style="margin-bottom: 15px;"></div>
                                                <div><label class="form-label">Email</label><input class="form-control"
                                                        type="text" placeholder="Email" style="margin-bottom: 15px;">
                                                </div>
                                            </div>
                                            <div id="next-prev-buttons-1" class="button-row d-flex mt-4"><button
                                                    class="btn btn btn-primary js-btn-prev" type="button"
                                                    title="Prev">Prev</button><button
                                                    class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                    title="Next">Next</button></div>
                                        </div>
                                    </div>
                                    <!-- <div id="single-form-next-prev"
                                        class="multisteps-form__panel shadow p-4 rounded bg-white"
                                        data-animation="scaleIn">


                                                <div id="next-prev-buttons-1" class="button-row d-flex mt-4"><button
                                                    class="btn btn btn-primary js-btn-prev" type="button"
                                                    title="Prev">Prev</button><button
                                                    class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                    title="Next">Next</button></div>
                                        </div> -->
                                </div>
                                <div id="single-form-next-prev-1"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Secondary Education</p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content" class="multisteps-form__content">
                                        <div id="input-grp-double" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">How many secondary
                                                    schools?</label>
                                                <select class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Name of secondary school</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Dates Attended</label>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div style="margin-bottom: 15px;">
                                                <label class="form-label">Did you attend or are you attending a tertiary
                                                    institution</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div
                                                    class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                    <label class="form-label">State</label>
                                                    <select class="form-select" style="margin-bottom: 15px;">
                                                        <option value="1" selected="">Lagos</option>
                                                    </select>
                                                </div>
                                                <div
                                                    class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                    <label class="form-label">Country</label>
                                                    <select class="form-select" style="margin-bottom: 15px;">
                                                        <option value="1" selected="">Nigeria</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="next-prev-buttons-1" class="button-row d-flex mt-4"><button
                                            class="btn btn btn-primary js-btn-prev" type="button"
                                            title="Prev">Prev</button><button
                                            class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                            title="Next">Next</button></div>
                                </div>

                                <div id="single-form-next-prev-2"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Tertiary Education</p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following
                                        information</small>
                                    <div id="form-content-3" class="multisteps-form__content">
                                        <div id="input-grp-double-3" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of tertiary school</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Type of tertiary school</label>
                                                <input class="form-control" type="text"
                                                    placeholder="College of education" style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">If others, please enter the type of
                                                    institution here?</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Dates Attended</label>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label><select
                                                    class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">OND</option>
                                                    <option value="2">ND</option>
                                                    <option value="3">B. SC</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-2" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-3"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Professional
                                        Qualification
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content-4" class="multisteps-form__content">
                                        <div id="input-grp-double-4" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of profession</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Type of qualification</label>
                                                <input class="form-control" type="text" placeholder="Student master"
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">If others, please enter the type of
                                                    qualification here?</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div><label class="form-label">Date qualification obtained Entry
                                                    date</label><input class="form-control" type="date"
                                                    style="margin-bottom: 15px;"></div>
                                            <div>
                                                <label class="form-label">Awarding institution</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div style="margin-bottom: 15px;">
                                                <label class="form-label">Have you completed your NYSC service or are
                                                    you currently serving?</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-3" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-4"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Your NYSC service year
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content-5" class="multisteps-form__content">
                                        <div id="input-grp-double-5" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">What state did you serve for your National
                                                    service?</label><input class="form-control" type="text"
                                                    placeholder="" style="margin-bottom: 15px;">
                                            </div>
                                            <div><label class="form-label">What month and what year did you commence
                                                    your National service?</label><input class="form-control"
                                                    type="date" style="margin-bottom: 15px;"></div>
                                            <div style="margin-bottom: 15px;">
                                                <label class="form-label">Do you have any preference for location and
                                                    industry type for location?</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px;">
                                                <label class="form-label">Are you currently employed?</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-4" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-5"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Your previous employment
                                        history
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content-6" class="multisteps-form__content">
                                        <div id="input-grp-double-6" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of previous employer</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Industry sector</label><select
                                                    class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">OND</option>
                                                    <option value="2">ND</option>
                                                    <option value="3">B. SC</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">If the employers industrial sector is
                                                    unlisted, please enter it here</label>
                                                <input class="form-control" type="text"
                                                    placeholder="College of education" style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Employment date</label><input
                                                    class="form-control" type="date" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Position /role</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div><label class="form-label">What are your
                                                    responsibilities</label><textarea class="form-control"></textarea>
                                            </div>
                                            <div>
                                                <label class="form-label">How many positions did you hold with this
                                                    employer?</label><input class="form-control" type="text"
                                                    placeholder="" style="margin-bottom: 15px;">
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-5" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-6"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Your Current Employment
                                        Details
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        fill the following information</small>
                                    <div id="form-content-7" class="multisteps-form__content">
                                        <div id="input-grp-double-7" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of employer</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Industry sector</label><select
                                                    class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">OND</option>
                                                    <option value="2">ND</option>
                                                    <option value="3">B. SC</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">If the employers industrial sector is
                                                    unlisted, please enter it here</label>
                                                <input class="form-control" type="text"
                                                    placeholder="College of education" style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Employment date</label><input
                                                    class="form-control" type="date" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Position /role</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div><label class="form-label">What are your
                                                    responsibilities</label><textarea class="form-control"></textarea>
                                            </div>
                                            <div>
                                                <label class="form-label">How many positions did you hold with this
                                                    employer?</label><input class="form-control" type="text"
                                                    placeholder="" style="margin-bottom: 15px;">
                                            </div>

                                        </div>

                                        <div id="next-prev-buttons-6" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-7"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Employment Roles
                                    </p>
                                    <small
                                        style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Position
                                        /role description</small>
                                    <div id="form-content-8" class="multisteps-form__content">
                                        <div id="input-grp-double-8" class="form-row mt-4">
                                            <!-- <div>
                                                    <label class="form-label">Name of employer</label><input class="form-control" type="text"
                                                        placeholder="" style="margin-bottom: 15px;">
                                                </div>

                                                <div>
                                                    <label class="form-label">Industry sector</label><select class="form-select"
                                                        style="margin-bottom: 15px;">
                                                        <option value="1" selected="">OND</option>
                                                        <option value="2">ND</option>
                                                        <option value="3">B. SC</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="form-label">If the employers industrial sector is unlisted, please enter it here</label>
                                                    <input class="form-control" type="text" placeholder="College of education" style="margin-bottom: 15px;">
                                                </div>
                                                 -->
                                            <div>
                                                <label class="form-label">Position /role</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Dates in this position/ role</label>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date" placeholder="FROM">
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date" placeholder="TO">
                                                    </div>
                                                </div>
                                            </div>

                                            <div><label class="form-label">What were your
                                                    responsibilities in this role/ position</label><textarea
                                                    class="form-control"></textarea>
                                            </div>
                                            <div>
                                                <label class="form-label">What date did you stop working with this
                                                    employer?</label><input class="form-control" type="date"
                                                    placeholder="" style="margin-bottom: 15px;">
                                            </div>
                                            <div style="margin-bottom: 15px;">
                                                <label class="form-label">Do you have any referees that an employer may
                                                    contact</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="next-prev-buttons-7" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-8"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Your Referees
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        fill in the following information</small>
                                    <div id="form-content-9" class="multisteps-form__content">
                                        <div id="input-grp-double-9" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of referee</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Referee email</label>
                                                <input class="form-control" type="text"
                                                    placeholder="College of education" style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">Referee's Phone Number</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div><label class="form-label">Referee's address</label><textarea
                                                    class="form-control"></textarea>
                                            </div>
                                            <div class="mt-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewBox="0 0 16 16"
                                                    class="bi bi-plus-circle fs-4"
                                                    style="color: var(--bs-yellow);font-weight: bold;border-width: 2px;">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                                    </path>
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                                    </path>
                                                </svg>
                                                <a href="#"
                                                    style="color: var(--bs-yellow);font-weight: bold;margin-left: 15px;">&nbsp;Add
                                                    Referee</a>
                                            </div>
                                            <div style="margin-bottom: 15px;" class="mt-3">
                                                <label class="form-label">For Industry type</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-8" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-9"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Your location and
                                        industry employment preferences
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content-10" class="multisteps-form__content">
                                        <div id="input-grp-double-10" class="form-row mt-4">
                                            <!-- <div>
                                                    <label class="form-label">Name of tertiary school</label><input class="form-control" type="text"
                                                        placeholder="" style="margin-bottom: 15px;">
                                                </div>

                                                <div>
                                                    <label class="form-label">Type of tertiary school</label>
                                                    <input class="form-control" type="text" placeholder="College of education" style="margin-bottom: 15px;">
                                                </div>
                                                <div>
                                                    <label class="form-label">If others, please enter the type of institution here?</label>
                                                    <input class="form-control" type="text" placeholder="" style="margin-bottom: 15px;">
                                                </div>

                                                <div>
                                                    <label class="form-label">Dates Attended</label>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                            <input class="form-control" type="date">
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                            <input class="form-control" type="date">
                                                        </div>
                                                    </div>
                                                </div> -->
                                            <div>
                                                <label class="form-label">My preferred location for employment is
                                                </label><select class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">Abia</option>
                                                    <option value="2">Oyo</option>
                                                    <option value="3">Lagos</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">My preferred industry for employment is
                                                </label><select class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">Ad / Marketing</option>
                                                    <option value="2">Oyo</option>
                                                    <option value="3">Lagos</option>
                                                </select>
                                            </div>
                                            <div style="margin-bottom: 15px;" class="mt-3">
                                                <label class="form-label">Do you have any hobbies?</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-9" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-10"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Hobbies and other
                                        information
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        fill the following information</small>
                                    <div id="form-content-11" class="multisteps-form__content">
                                        <div id="input-grp-double-11" class="form-row mt-4">
                                            <div><label class="form-label">Please list your hobbies in the text box
                                                    below</label><textarea class="form-control"></textarea>
                                            </div>
                                            <div class="mt-3"><label class="form-label">Please enter any additional
                                                    information you think is important for a potential employer to
                                                    know</label><textarea class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-10" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-11"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Contact details
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content-12" class="multisteps-form__content">
                                        <div id="input-grp-double-12" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of tertiary school</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Type of tertiary school</label>
                                                <input class="form-control" type="text"
                                                    placeholder="College of education" style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">If others, please enter the type of
                                                    institution here?</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Dates Attended</label>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label><select
                                                    class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">OND</option>
                                                    <option value="2">ND</option>
                                                    <option value="3">B. SC</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-11" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Next</button></div>
                                    </div>
                                </div>
                                <div id="single-form-next-prev-12"
                                    class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <p style="margin-bottom: 0;color: black;font-weight: bold;">Contact details
                                    </p>
                                    <small style="margin-bottom: 15px;color: var(--bs-yellow);font-weight: bold;">Please
                                        provide the following information</small>
                                    <div id="form-content-13" class="multisteps-form__content">
                                        <div id="input-grp-double-13" class="form-row mt-4">
                                            <div>
                                                <label class="form-label">Name of tertiary school</label><input
                                                    class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Type of tertiary school</label>
                                                <input class="form-control" type="text"
                                                    placeholder="College of education" style="margin-bottom: 15px;">
                                            </div>
                                            <div>
                                                <label class="form-label">If others, please enter the type of
                                                    institution here?</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>

                                            <div>
                                                <label class="form-label">Dates Attended</label>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 align-self-start order-first">
                                                        <input class="form-control" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label><select
                                                    class="form-select" style="margin-bottom: 15px;">
                                                    <option value="1" selected="">OND</option>
                                                    <option value="2">ND</option>
                                                    <option value="3">B. SC</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label">Qualification Obtained</label>
                                                <input class="form-control" type="text" placeholder=""
                                                    style="margin-bottom: 15px;">
                                            </div>
                                        </div>

                                        <div id="next-prev-buttons-12" class="button-row d-flex mt-4"><button
                                                class="btn btn btn-primary js-btn-prev" type="button"
                                                title="Prev">Prev</button><button
                                                class="btn btn btn-primary ml-auto js-btn-next" type="button"
                                                title="Next">Submit</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
