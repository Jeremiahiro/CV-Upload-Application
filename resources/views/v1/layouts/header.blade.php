<header class="d-flex flex-wrap justify-content-center py-3 px-5 mb-4 border-bottom header">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-3" style="font-weight: 600;">Logo<span class="text-yellow">Name</span></span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Job Listing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        <li class="nav-item">
            <a type="submit" href="{{ route('register') }}" class="mx-2 py-1 px-3 btn btn-primary btn-custom">Sign Up</a>
        </li>
        <li class="nav-item">
          <a type="submit" href="{{ route('login') }}" class="mx-2 py-1 px-3 btn btn-outline-secondary">Log In</a>
        </li>
    </ul>
</header>
