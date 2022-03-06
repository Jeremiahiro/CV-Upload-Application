<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            font-size:small;
            font-weight: 600;
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar-dark fixed-top">
            @include('v1.layouts.header')
        </nav>
    </header>

    <!-- Begin page content -->
    <main class="m">



        @yield('main')
        </main>

        <footer class="footer mt-auto py-3 bg-dark">
            <div class="">
                @include('v1.layouts.footer')
            </div>
        </footer>


        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    </body>

    </html>
