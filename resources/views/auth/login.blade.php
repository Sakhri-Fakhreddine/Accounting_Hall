<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Accountant Home</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>
    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="relative">
                    <div style="position: relative; width: 400px; background-color: #FFFFFF; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('assets/images/email.png') }}" alt="Email Icon" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); width: 20px; height: 20px; opacity: 0.7;">
                        <x-input type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                            placeholder="Enter your Email"
                            style="width: 100%; padding: 10px 10px 10px 40px; border: none; border-radius: 10px; background-color: #FFFFFF; color: #333333; font-size: 16px; outline: none;" />
                    </div>

                    <div style="margin-top: 1rem; position: relative; width: 400px; background-color: #FFFFFF; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <img src="assets/images/padlock.png" alt="Password Icon" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); width: 20px; height: 20px; opacity: 0.7;">
                        <input id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password"
                            style="width: 100%; padding: 10px 10px 10px 40px; border: none; border-radius: 10px; background-color: #FFFFFF; color: #333333; font-size: 16px; outline: none;">
                        <img src="assets/images/show.png" alt="Show Password Icon" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); width: 20px; height: 20px; cursor: pointer;"
                            onclick="togglePasswordVisibility('password', this)">
                    </div>
                </div>

                <div class="block mt-4 flex items-center justify-between">
    <label for="remember_me" class="flex items-center">
        <x-checkbox id="remember_me" name="remember" />
        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
    @if (Route::has('password.request'))
        <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-0 rounded-md"
            href="{{ route('password.request') }}">
            <span class="underline text-sm hover:underline text-gray-600 hover:text-gray-900">
            <strong>{{ __('Forgot your password?') }}</strong>
            </span>
        </a>
    @endif
</div>

<div class="flex items-center justify-end mt-4">
    <x-button class="w-full flex justify-center items-center">
        {{ __('Log in') }}
    </x-button>
</div>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 20px;">
    <a class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-0 rounded-md" href="{{ route('register') }}">
        Not Registered Yet? 
        <span class="underline text-sm hover:underline text-gray-600 hover:text-gray-900">
            <strong>{{ __('Create an account') }}</strong>
        </span>
    </a>
</div>



                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 20px;">
                    <a href="{{ url('auth/google') }}">
                        <button class="gsi-material-button">
                            <div class="gsi-material-button-state"></div>
                            <div class="gsi-material-button-content-wrapper">
                                <div class="gsi-material-button-icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                        style="display: block;">
                                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                                        <path fill="none" d="M0 0h48v48H0z"></path>
                                    </svg>
                                </div>
                                <span class="gsi-material-button-contents">Continue with Google</span>
                            </div>
                        </button>
                    </a>
                </div>

                <div class="social-media" style="margin-top: 20px; text-align: center;">
                    <div><span class="mx-2 font-semibold text-sm">Or continue with social media</span>
                    </div>
                    <div class="social-icons" style="display: flex; justify-content: center; gap: 10px; margin-top: 10px;">
                        <a href="#" class="icon-social-facebook">
                            <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook Sign-In" style="width: 30px; height: 30px;">
                        </a>
                        <a href="#" class="icon-social-instagram">
                            <img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram Sign-In" style="width: 30px; height: 30px;">
                        </a>
                        <a href="#" class="icon-social-github">
                            <img src="{{ asset('assets/images/github.png') }}" alt="Github Sign-In" style="width: 30px; height: 30px;">
                        </a>
                        <a href="#" class="icon-social-linkedin">
                            <img src="{{ asset('assets/images/linkedin.png') }}" alt="Linkedin Sign-In" style="width: 30px; height: 30px;">
                        </a>
                        <a href="#" class="icon-social-youtube">
                            <img src="{{ asset('assets/images/youtube.png') }}" alt="YouTube Sign-In" style="width: 30px; height: 30px;">
                        </a>
                    </div>
                </div>
            </form>
        </x-authentication-card>
    </x-guest-layout>
    @if ($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
    @endif
    <style>
    .gold-border {
        border-color: gold !important;
        box-shadow: 0 0 5px gold;
    }

    input {
        border: 2px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        transition: border 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }


        .gsi-material-button {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        -webkit-appearance: none;
        background-color: #131314;
        background-image: none;
        border: 1px solid #747775;
        -webkit-border-radius: 20px;
        border-radius: 20px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #e3e3e3;
        cursor: pointer;
        font-family: 'Roboto', arial, sans-serif;
        font-size: 14px;
        height: 40px;
        letter-spacing: 0.25px;
        outline: none;
        overflow: hidden;
        padding: 0 12px;
        position: relative;
        text-align: center;
        -webkit-transition: background-color .218s, border-color .218s, box-shadow .218s;
        transition: background-color .218s, border-color .218s, box-shadow .218s;
        vertical-align: middle;
        white-space: nowrap;
        width: auto;
        max-width: 400px;
        min-width: min-content;
        border-color: #8e918f;
        }

        .gsi-material-button .gsi-material-button-icon {
        height: 20px;
        margin-right: 12px;
        min-width: 20px;
        width: 20px;
        }

        .gsi-material-button .gsi-material-button-content-wrapper {
        -webkit-align-items: center;
        align-items: center;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: nowrap;
        flex-wrap: nowrap;
        height: 100%;
        justify-content: space-between;
        position: relative;
        width: 100%;
        }

        .gsi-material-button .gsi-material-button-contents {
        -webkit-flex-grow: 1;
        flex-grow: 1;
        font-family: 'Roboto', arial, sans-serif;
        font-weight: 500;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: top;
        }

        .gsi-material-button .gsi-material-button-state {
        -webkit-transition: opacity .218s;
        transition: opacity .218s;
        bottom: 0;
        left: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
        }

        .gsi-material-button:disabled {
        cursor: default;
        background-color: #13131461;
        border-color: #8e918f1f;
        }

        .gsi-material-button:disabled .gsi-material-button-state {
        background-color: #e3e3e31f;
        }

        .gsi-material-button:disabled .gsi-material-button-contents {
        opacity: 38%;
        }

        .gsi-material-button:disabled .gsi-material-button-icon {
        opacity: 38%;
        }

        .gsi-material-button:not(:disabled):active .gsi-material-button-state, 
        .gsi-material-button:not(:disabled):focus .gsi-material-button-state {
        background-color: white;
        opacity: 12%;
        }

        .gsi-material-button:not(:disabled):hover {
        -webkit-box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
        box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
        }

        .gsi-material-button:not(:disabled):hover .gsi-material-button-state {
        background-color: white;
        opacity: 8%;
        }
</style>
    <script>
        function togglePasswordVisibility(passwordId, toggleIcon) {
            const passwordField = document.getElementById(passwordId);
            const isPasswordVisible = passwordField.type === "text";

            if (isPasswordVisible) {
                passwordField.type = "password";
                toggleIcon.src = "assets/images/show.png";
            } else {
                passwordField.type = "text";
                toggleIcon.src = "assets/images/hidden.png";
            }
        }
    </script>
   

</body>

</html>
