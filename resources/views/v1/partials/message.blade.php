<div class="alert__message">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong class="text-capitalize mr-3 f-14">Success!</strong>
            <div class="mr-5 pr-5 f-14">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-fixed" role="alert">
            <strong class="text-capitalize mr-3 f-14">Error!</strong>
            <div class="mr-5 pr-5 f-14">
                {{ session('error') }}
            </div>
        </div>
    @endif

    @if(isset($errors) && $errors->any())
        <div class="alert alert-danger alert-dismissible fade show alert-fixed" role="alert">
            <strong class="text-capitalize mr-3 f-14">Error!</strong>
            <ul class="mr-5 pr-5 f-14">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-info alert-dismissible fade show alert-fixed" role="alert">
            <strong class="text-capitalize mr-3 f-14">Info!</strong>
            <div class="mr-5 pr-5 f-14">
                {{ session('message') }}
            </div>
        </div>
    @endif

</div>
<style>
    .alert__message {
        position: fixed; 
        top: 60px; 
        right: 5px; 
        max-width: 50%;
        z-index: 9999; 
        border-radius:0;
    }
</style>
@push('javascript')
    <script>
        $(".alert__message").fadeTo(2000, 3000).slideUp(3000, function(){
            $(".alert__message").slideUp(3000);
        });
    </script>
@endpush

