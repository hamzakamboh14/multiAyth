<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('/assets/dist/css/bootstrap.min.css')}}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('/assetslogs/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('/assetslogs/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <x-slot name="logo"></x-slot>
                        <div class="alert-danger">
                        <x-jet-validation-errors class="mb-4" />
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                        @csrf
                            <div class="form-group">
                                <label for="name" value="{{ __('Name') }}"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email" value="{{ __('Email') }}"><i class="zmdi zmdi-email"></i></label>
                                <input id="email"type="email" name="email" :value="old('email')" required  placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password" value="{{ __('Password') }}" ><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" value="{{ __('Confirm Password') }}"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('/assetslogs/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">I am already member</a>
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