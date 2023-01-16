<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""></title>
    
    <!-- page css -->
    <link href="{{ asset('dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    @include('layouts.css')
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    @include('layouts.preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:linear-gradient(to bottom, rgba(51, 51, 255, 0.42), rgba(128, 128, 255, 0.50)),url(../finance2.jpg);">
            <div class="text-center">
                <x-jet-validation-errors class="mb-4"  style="list-style:none;"/>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <label>Your Email</label>
                                <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                            <label>Your Password</label>
                                <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember" >
                                        <label class="form-check-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    <div class="ms-auto">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-10">
                                <button class="btn w-100 btn-lg btn-info btn-squared text-white" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('layouts.javascript')
    
</body>
</html>

