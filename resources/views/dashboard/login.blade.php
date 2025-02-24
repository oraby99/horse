@extends('dashboard.layout.login')
@section('title', 'Login')
@section('content')
    <div class="card-body">

        <div class="text-center mt-4">
            <div class="mb-3">
                <img src="{{ asset('assets/images/logo.png') }}" height="100" class="logo-dark mx-auto" alt="">
                <img src="{{ asset('assets/images/logo.png') }}" height="100" class="logo-light mx-auto"
                    alt="">

            </div>
        </div>

        <h4 class="text-muted text-center font-size-18"><b>Sign Up</b></h4>

      
        <div class="p-3">
            <form class="form-horizontal mt-3" action="{{route('admin.login')}}" method="POST">
                @csrf
                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" type="text" required="" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" type="password" required="" name="password" placeholder="Password">
                    </div>
                </div>

                @if (Session::has('error'))
                    <span class="text-danger">Invaild Email and Password</span>
                @endif
                <div class="form-group mb-3 row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 text-center row mt-3 pt-1">
                    <div class="col-12">
                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                {{-- <div class="form-group mb-0 row mt-2">
                    <div class="col-sm-7 mt-3">
                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your
                            password?</a>
                    </div>
                    <div class="col-sm-5 mt-3">
                        <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an
                            account</a>
                    </div>
                </div> --}}
            </form>
        </div>
        <!-- end -->
    </div>
@endsection
