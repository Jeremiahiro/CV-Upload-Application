<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sticky Footer Navbar Template Â· Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">



    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

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
    </style>


    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
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



<div class="back">


    <div class="div-center">


      <div class="content">


        <div class="text-center">
            <h3>Sign Up to <span class="fs-3">Logo<span class="text-yellow">Name</span></span></h3>
            <div class="container">
                <div class="row">
                  <div class="col">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <small class="form-check-label" for="exampleCheck1">Check me out</small>
                  </div>
                  <div class="col">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <small class="form-check-label" for="exampleCheck1">Check me out</small>
                  </div>
                  </div>
              </div>

        </div>
        <form class="mt-3">
            <div class="mb-3">
              <input placeholder="Email Address" class="form-control  input-round" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input type="password" placeholder="Password" class="form-control input-round" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <input type="password" placeholder="Confirm Password" class="form-control input-round" id="exampleInputPassword1">
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

      </div>


      </span>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-dark">
  <div class="">
    @include('v1.layouts.footer')
  </div>
</footer>


    <script src="js/bootstrap.bundle.min.js"></script>


  </body>
</html>
