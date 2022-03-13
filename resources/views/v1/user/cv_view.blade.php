@extends('v1.layouts.app')

@section('main')


<div class="d-flex flex-column" id="content-wrapper" style="background: white;">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="border-bottom: 1px solid var(--bs-yellow);">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <h3 class="fw-bold" style="color: black;font-weight: bold;width: auto;">Settings</h3>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
            </div>
        </nav>
        <div class="container-fluid"><button class="btn btn-primary" type="button" style="margin-right: 20px;margin-left: 30px;background: var(--bs-gray-500);color: var(--bs-dark);font-weight: bold;padding-right: 25px;padding-left: 25px;">Edit</button><button class="btn btn-primary" type="button" style="color: var(--bs-dark);font-weight: bold;background: var(--bs-yellow);padding-right: 25px;padding-left: 25px;">Button</button></div>
        <div style="background: rgba(156,156,156,0.3);border-bottom-color: rgb(194,196,212);margin: 30px;">
            <div style="margin: 0px;padding-right: auto;">
                <div style="margin: 30px;background: transparent;margin-bottom: 0px;">
                    <div style="margin: 30px;margin-top: 0;padding-top: 10px;padding-left: 30px;margin-bottom: 15px;">
                        <div style="height: 60px;width: 2px;background: black;"></div>
                        <div style="padding-left: 30px;">
                            <h3 style="color: black;font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;">NAME</h3>
                            <h3 style="color: black;font-weight: bold;font-family: Poppins, sans-serif;font-size: 30px;">SURNAME</h3>
                        </div>
                    </div>
                </div>
                <div style="background: transparent;width: 100%;margin-top: 30px;margin-bottom: 30px;">
                    <div class="container" style="padding-right: 0;padding-left: 0;">
                        <div class="row" style="margin-left: 0px;">
                            <div class="col-md-4 d-xl-flex justify-content-xl-center align-items-xl-center" style="background: var(--bs-yellow);">
                                <div style="height: 102px;width: 4px;background: #ffffff;margin-left: -77px;"></div>
                                <div>
                                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="padding: 0px;height: 80px;">
                                        <h4 style="color: black;font-family: Poppins, sans-serif;padding-left: 10px;">MARKETING MANAGER</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-xxl-flex align-items-xxl-center" style="padding-left: 20px;">
                                <div>
                                    <p class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-geo-alt fs-4" style="color: var(--bs-yellow);margin-right: 15px;">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"></path>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                        </svg>33rd lorem ipsum salum adress works now</p>
                                    <p class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;"><i class="fa fa-calendar fs-4" style="color: var(--bs-yellow);margin-right: 15px;"></i>&nbsp;23 /11 /2020</p>
                                    <p class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-right fs-4" style="color: var(--bs-yellow);margin-right: 15px;">
                                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"></path>
                                        </svg>&nbsp;Male</p>
                                </div>
                            </div>
                            <div class="col-md-4 d-xxl-flex align-items-xxl-center" style="padding-left: 20px;">
                                <div>
                                    <p class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-4" style="color: var(--bs-yellow);margin-right: 15px;">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg>33rd lorem ipsum salum adress works now</p>
                                    <p class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone fs-4" style="color: var(--bs-yellow);margin-right: 15px;">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg>&nbsp;23 /11 /2020</p>
                                    <p class="d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;color: black;font-family: Poppins, sans-serif;font-size: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope fs-4" style="color: var(--bs-yellow);margin-right: 15px;">
                                            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                        </svg>&nbsp;Male</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top: 30px;padding-right: 30px;padding-left: 30px;border-bottom-width: 3px;border-bottom-color: var(--bs-yellow);">
                        <div>
                            <div class="d-grid float-none">
                                <h3 class="d-inline-block" style="font-family: Poppins, sans-serif;color: black;font-size: 16px;font-weight: bold;"><i class="fa fa-circle fs-5 text-start d-inline-block" style="color: var(--bs-yellow);width: 17px;margin-right: 30px;"></i>SECONDARY EDUCATION</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                                <h3 style="margin-left: 47px;font-family: Poppins, sans-serif;color: black;font-size: 13px;">School N 4</h3>
                            </div>
                        </div>
                        <div class="text-center" style="text-align: center;">
                            <div style="width: 90%;height: 3px;background: rgba(223,210,163,0.7);margin-top: 5px;"></div>
                        </div>
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
