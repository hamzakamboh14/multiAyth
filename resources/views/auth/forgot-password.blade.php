<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>

    <link rel="stylesheet" href="/assets/dist/css/bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="/assetslogs/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/assetslogs/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Enter Your Email</h2>
                        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p><br>
                       @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                 <div class="alert-danger">
                       
                    <x-jet-validation-errors class="mb-4" />
                       </div>
                        <x-slot name="logo"></x-slot>
                        <form method="POST" action="{{ route('password.email') }}" class="register-form" id="register-form">
                        @csrf
                            <div class="form-group">
                                <label for="email" value="{{ __('Email') }}"><i class="zmdi zmdi-email"></i></label>
                                <input id="email" type="email" name="email" :value="old('email')" required autofocus  required  placeholder="Your Email"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="{{ __('Email Password Reset Link') }}"/>
                            </div>
                        </form>
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