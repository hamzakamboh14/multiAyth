<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('/assets/dist/css/bootstrap.min.css')}}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('/assetslogs/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('/assetslogs/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
            <div class="col-md-12">
            @include('message')
            </div>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('/assetslogs/images/signin-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                    </div>
                    <x-slot name="logo"></x-slot>
                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="alert-danger">
                        <x-jet-validation-errors class="mb-4" />
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email" value="{{ __('Email') }}" ><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input id="email"  type="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password" value="{{ __('Password') }}"><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" name="password" required autocomplete="current-password"  placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input id="remember_me" type="checkbox"  name="remember"  class="agree-term" />
                                <label for="remember_me" class="label-agree-term"><span><span></span></span>{{ __('Remember me') }}</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                        @if (Route::has('password.request'))
                        <a class="signup-image-link" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="/assetslogs/vendor/jquery/jquery.min.js"></script>
    <script src="/assetslogs/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>