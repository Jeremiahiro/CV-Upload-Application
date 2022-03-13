<div class="container">
    {{-- <a href="#" class="navbar-brand">Brand</a> --}}
    <a href="/" class="navbar-brand d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-3" style="font-weight: 600;">Logo<span class="text-yellow">Name</span></span>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
        </div>
        <div class="navbar-nav ms-auto">
            <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Job Listing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        <li class="nav-item">
            <a type="submit" href="{{ route('register') }}" class="btn btn-warning btn-custom sign_up_btn my-1">Sign Up</a>
        </li>
        <li class="nav-item">
          <a type="submit" href="{{ route('login') }}" class="btn btn-outline-secondary sign_up_btn my-1">Log In</a>
        </li>
        </div>
    </div>
</div>



