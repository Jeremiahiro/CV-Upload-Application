@extends('v1.layouts.app')
@section('title')
Employment Roles
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="9" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.employement_role.create', [$cv['uuid'], $employement['id']]) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Employement Roles</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($roles as $role)
                                <div class="col col-lg-6 mb-2">
                                    <div class="w-100 data">
                                        <div class="m-2 d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($role->employement_roles_id ? $role->position->name : $role->other_employement_role, 30) }} 
                                                </span>
                                                <br>
                                                <small>
                                                {{ $role->start_date }} - {{ $role->end_date }}
                                                </small>
                                                <br>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-role-data cursor-pointer"
                                                            data-role="{{ $role }}"
                                                            data-employement="{{ $employement }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.employement_role.delete', [$cv['uuid'], $role['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Delete Data"
                                                            class="text-danger"
                                                        >
                                                            <i class="fa fa-trash text-danger delete-role-data"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <x-employment-roles-select-field :required="true" />

                        </div>

                        <div class="form-group mb-3" id="other_employment_roles-container">
                            <label class="form-label" for="other_employment_roles">If the position / role is unlisted, please enter it here</label>
                            <input
                                id="other_employment_roles"
                                type="text"
                                class="form-control form-input input-round @error('other_employment_roles') is-invalid @enderror"
                                name="other_employment_roles"
                                value="{{ old('other_employment_roles') }}"
                                placeholder="Other Position / Role"
                            >
                            @error('other_employment_roles')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label class="form-label" for="from_date">Date in Position / Role</label>
                                <input
                                    id="from_date"
                                    type="month"
                                    class="form-control form-input input-round @error('from_date') is-invalid @enderror"
                                    name="from_date"
                                    value="{{ old('from_date') }}"
                                    max="{{ now()->toDateString('M-Y') }}"
                                    required
                                >
                                
                                @error('from_date')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label invisible" for="role"></label>
                                <input
                                    id="to_date"
                                    type="month"
                                    class="form-control form-input input-round @error('to_date') is-invalid @enderror"
                                    name="to_date"
                                    value="{{ old('to_date') }}"
                                    max="{{ now()->toDateString('M-Y') }}"
                                    format="d-m-y"
                                    required
                                >
                                
                                @error('to_date')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="job_description">What are your responsibilities in this role / position?</label>
                            <textarea name="job_description" id="job_description" class="form-control" rows="5">{{ old('job_description') }}</textarea>
                            @error('job_description')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Do you have any referees that an employer may contact?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="referees"
                                    id="has_contact"
                                    value="1"
                                    required
                                    {{ old('referees') === '1' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="has_contact">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="referees"
                                    id="no_contact"
                                    value="0"
                                    required
                                    {{ old('referees') === '0' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="no_contact">No</label>
                            </div>
                        </div>

                        <div>
                            <div class="form-group mb-3" id="addMore">
                                @if ($employement->roles->count() != $employement->no_of_positions)
                                    <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
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
                                        Add
                                    </button>
                                @endif
                            </div>
                            <div class="form-group mb-3" id="update">
                                <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                    <i class="fa fa-check"></i>
                                    <span class="update_text">Update</span>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a
                                href="{{ route('cv.employement_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
                                id="previousBtn"
                                class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2"
                            >
                                Prev
                            </a>

                            <a
                                href="{{ route('cv.referee', $cv['uuid']) }}"
                                id="nextForm"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2"
                            >
                                Next
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
@push('javascript')
    <script>
        $(document).ready(function () {

            const other_employment_roles = $('#other_employment_roles-container');
            const updateBtn = $('#update');
            updateBtn.hide();
            other_employment_roles.hide()

            $('#previousBtn').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            });

            $('#select-role').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_employment_roles.show(500)
                } else {
                    other_employment_roles.hide(500)
                }
            });
            
            $('.edit-role-data').click(function(e) {
                updateBtn.show(500);
              
                const data = $(this).data('role');
                const employement = $(this).data('employement');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/employement-role/'+employement + '/' + data.id
                
                if(confirm('Changes you made may not be saved')) {
                    handleUpdateData(data);
                }

                function handleUpdateData(data) {
                    var type = 'others';
                    if(data.sector != null) {
                        type = data.sector.id;
                    }
                    $('#position').val(data.position);
                    $('#from_date').val(data.start_date);
                    $('#to_date').val(data.end_date);
                    $('#job_description').val(data.job_description);

                    if(data.referees == 1) {
                        $('#has_contact').prop('checked', true);
                    } else {
                        $('#no_contact').prop('checked', true);
                    }
                };
            });

        });
    </script>
@endpush
