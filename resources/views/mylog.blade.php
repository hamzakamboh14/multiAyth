<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>

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
                        <h2 class="form-title">Reset Your Password</h2>
                       @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                 <div class="alert alert-success">
                       
                    <x-jet-validation-errors class="mb-4" />
                       </div>
                        <x-slot name="logo"></x-slot>
                        <form method="POST" action="{{ route('password.update') }}" class="register-form" id="register-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <label for="email" value="{{ __('Email') }}"><i class="zmdi zmdi-email"></i></label>
                                <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus/>
                            </div>
                            <div class="form-group">
                                <label for="password" value="{{ __('Password') }}" ><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" name="password" required autocomplete="new-password"  placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" value="{{ __('Confirm Password') }}"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="{{ __('Reset Password') }}"/>
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