@extends('v1.user.layouts.app')

@section('main')


<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="border-bottom: 1px solid var(--bs-yellow);">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <h3 class="fw-bold" style="color: black;font-weight: bold;width: auto;">CV VIEW</h3>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
            </div>
        </nav>
        <div class="container-fluid"><button class="btn btn-primary" type="button" style="margin-right: 20px;margin-left: 30px;background: var(--bs-gray-500);color: var(--bs-dark);font-weight: bold;padding-right: 25px;padding-left: 25px;">Edit</button><button class="btn btn-primary" type="button" style="color: var(--bs-dark);font-weight: bold;background: var(--bs-yellow);padding-right: 25px;padding-left: 25px;">Button</button></div>
        <div class="col" style="margin: 30px;background: var(--bs-gray-200);padding-left: 10px;padding-top: 5px;">
            <div style="height: 50px;width: 2px;background: var(--bs-dark);margin: 20px;"></div>
            <h2 style="margin-left: 30px;font-family: Poppins, sans-serif;color: #000;font-weight: bold;">NAME</h2>
            <h2 style="margin-left: 30px;font-family: Poppins, sans-serif;color: #000;font-weight: bold;">SURNAME</h2>
            <div>
                <div class="container" style="padding: 0;">
                    <div class="row" style="margin: 0;">
                        <div class="col-md-4 d-xl-flex justify-content-xl-center align-items-xl-center" style="padding: 0;text-align: center;">
                            <div class="d-xl-flex">
                                <h4 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-weight: bold;color: rgb(0,0,0);">MARKETING MANAGER</h4>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
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


@endsection
