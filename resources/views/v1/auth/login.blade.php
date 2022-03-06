@extends('v1.layouts.app')



@section('main')



<div class="back">


    <div class="div-center">


      <div class="content">


        <div class="text-center">
            <h5 class="head-text">Sign In to <span class="fs-">Logo<span class="text-yellow">Name</span></span></h3>
            {{-- <div class="container mt-4">
                <div class="row">
                  <div class="col firstcol">
                <span>
                <input type="checkbox" id="box-1">
                <label for="box-1">Jobseeker</label>

                </span>
                  </div>
                  <div class="col">
                    <input type="checkbox" id="box-3">
                    <label for="box-3">Recruitment</label>
                  </div>
                  </div>
              </div> --}}

        </div>
        <div>
		{{-- <div class="tag">Checkbox Big</div> --}}
		<div class="boxes">
  {{-- <input type="checkbox" id="box-1"> --}}


  {{-- <input type="checkbox" id="box-2" checked> --}}
  {{-- <label for="box-2">Gentrify pickled kale chips </label> --}}

  {{-- <input type="checkbox" id="box-3"> --}}

</div>
	</div>
        <form class="mt-4">
            <div class="mb-3">
              <input placeholder="Mail" class="form-control  input-round" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input type="password" placeholder="Password" class="form-control input-round" id="exampleInputPassword1">
            </div>
            {{-- <div class="mb-3">
                <input type="password" placeholder="Confirm Password" class="form-control input-round" id="exampleInputPassword1">
              </div> --}}

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-custom">Log in</button>
            </div>
          </form>
          <div class="text-center mt-4">

      <small>Forgot Password? <a class="text-yellow" href="{{ route('password.request') }}">Check</a></small>
          </div>
        </div>


      </span>
    </div>


@endsection


