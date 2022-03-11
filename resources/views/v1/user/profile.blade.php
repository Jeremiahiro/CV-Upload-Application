@extends('v1.user.layouts.app')

@section('main')


<div class="d-flex flex-column" id="content-wrapper">
    <div id="content" style="background: rgb(255,255,255);">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="border-bottom: 1px solid var(--bs-yellow);">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <h3 class="fw-bold" style="color: black;font-weight: bold;width: auto;">Settings</h3>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
            </div>
        </nav>
        <div class="container-fluid">
            <h3 class="text-dark mb-4">Profile</h3>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <div style="text-align: left;">
                        <div class="row">
                            <div class="col"><img class="rounded-circle mb-3 mt-4" src="assets/img/avatars/avatar1.jpeg" width="160" height="160" style="text-align: left;"></div>
                            <div class="col d-flex flex-column justify-content-center align-items-center">
                                <h5 style="font-weight: 700;">Name Someone</h5>
                                <br><br>
                                <a href="#" onclick="editForm()" style="color: var(--bs-yellow);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-fill fs-4">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                </svg>&nbsp;Edit</a>
                            </div>

                        </div>
                        <form>
                            <p style="text-align: left;color: black;font-weight: bold;">Edit Password</p>

                            <div class="mb-3">
                                <input type="password" readonly placeholder="Current Password" style="padding: 5px !important;" class="form-control" id="c_pass">
                              </div>
                              <div class="mb-3">
                                <input type="password" placeholder="New Password" style="padding: 5px !important;" class="form-control" readonly id="n_pass">
                              </div>
                              <div class="mb-3">
                                <input type="password" readonly placeholder="Confirm Password" style="padding: 5px !important;" class="form-control" id="confirm_pass">
                              </div>

                              <button class="btn btn btn-primary ml-auto js-btn-next"
                                                type="button" title="Next">Save</button>
                        </form>
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


<script>
    function editForm()
    {
        document.getElementById("confirm_pass").readOnly = false;
        document.getElementById("n_pass").readOnly = false;
        document.getElementById("c_pass").readOnly = false;
    }
</script>
@endsection
