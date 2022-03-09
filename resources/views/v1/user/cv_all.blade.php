@extends('v1.user.layouts.app')

@section('main')


<div class="d-flex flex-column" id="content-wrapper">
    <div id="content" style="background: white;">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="border-bottom: 1px solid var(--bs-yellow);">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <h3 class="fw-bold" style="color: black;font-weight: bold;width: auto;">Settings</h3>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
            </div>
        </nav>
        <div class="container" style="margin-top: 25px;"><button class="btn btn-primary" type="button" style="color: var(--bs-dark);font-weight: bold;background: var(--bs-yellow);padding-right: 25px;padding-left: 25px;margin-left: 0px;margin-bottom: 20px;">Save</button>
            <div class="row">
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Personal details</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Contact details</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Secondary Education</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Tertiary Institution</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Professional Qualification</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Your NYSC Service year</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Your previous employment History</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Employment roles</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Current e<strong>mployment roles</strong><br></p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Your referees</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Your Industry employment preferences</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
                <div class="col-md-3" style="margin-bottom: 20px;">
                    <p style="color: black;font-weight: bold;font-family: Poppins, sans-serif;margin-bottom: 12px;font-size: 13px;">Hobbies and other information</p><img class="img-thumbnail img-fluid" src="{{ asset('assets/img/clipboard-image.png') }}">
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
        </div>
    </footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

@endsection
