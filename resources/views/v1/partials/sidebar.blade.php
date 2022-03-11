<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
    style="background: var(--bs-dark);">
    <div class="container-fluid p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0 bg-black w-100"
            href="/">
            <div class="sidebar-brand-icon rotate-n-15"></div>
            <div class="sidebar-brand-text mx-3"><span>Logo</span><span style="color: var(--bs-yellow);;">name</span>
            </div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light pt-3" id="accordionSidebar">
            <li class="nav-item text-center">
                <a class="nav-link active px-3" href="{{ route('user.index') }}">
                    <i class="fa fa-user px-2" style="color: var(--bs-yellow);"></i>
                    <span>{{ Str::limit(auth()->user()->first_name, 30) }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active px-3" href="/">
                    <span class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-speedometer2 fs-5" style="color: var(--bs-yellow);">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z">
                            </path>
                        </svg>
                    </span>
                    <span class="px-3">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active px-3" href="/">
                    <span class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-search fs-5" style="color: var(--bs-yellow);">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                            </path>
                        </svg>
                    </span>
                    <span class="px-3">Search Job</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active px-3" href="/">
                    <span class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-chat fs-5" style="color: var(--bs-yellow);">
                            <path
                                d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                            </path>
                        </svg>
                    </span>
                    <span class="px-3">Message</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active px-3" href="{{ route('user.index') }}">
                    <span class="px-2">
                        <i class="icon ion-android-settings fs-5" style="color: var(--bs-yellow);"></i>
                    </span>
                    <span class="px-3">Settings</span>
                </a>
            </li>
        </ul>
        @if (!auth()->user()->cv()->count())
            <div class="py-4 mx-auto">
                <a href="{{ route('cv.create') }}" class="btn btn-warning sidebar-btn px-4 font-weight-bold d-flex"
                    style="font-weight: bold;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                            viewBox="0 0 16 16" class="bi bi-plus fs-5 text-start">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                            </path>
                        </svg>
                    </span>
                    <span class="d-none d-lg-block">
                        ADD CV
                    </span>
                </a>
            </div>
        @endif
		<div class="position-absolute bottom-0 pb-5">
			<a
				class="nav-link active text-light"
				href="{{ route('logout') }}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
			>
				<span class="px-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none"
						class="fs-5" style="color: var(--bs-yellow);">
						<path
							d="M17 16L21 12M21 12L17 8M21 12L7 12M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						</path>
					</svg>
				</span>
				<span class="px-2">Logout</span>
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</div>
	</div>
</nav>
