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
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>
  <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="nom_commercial" value="{{ __('Commercial Name') }}" />
                <x-input id="nom_commercial" class="block mt-1 w-full" type="text" name="nom_commercial" :value="old('nom_commercial')" required />
            </div>

            <div class="mt-4">
                <x-label for="registre_de_commerce" value="{{ __('Commercial Registry') }}" />
                <x-input id="registre_de_commerce" class="block mt-1 w-full" type="text" name="registre_de_commerce" :value="old('registre_de_commerce')" required />
            </div>

            <div class="mt-4">
                <x-label for="code_tva" value="{{ __('TVA Code') }}" />
                <x-input id="code_tva" class="block mt-1 w-full" type="text" name="code_tva" :value="old('code_tva')" required />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
            <x-label for="typeabonnement" value="{{ __('Payment Method') }}" />
            <select id="typeabonnement" class="block mt-1 w-full" type="text" name="typeabonnement" :value="old('typeabonnement')" required >
                <option value="" disabled selected>{{ __('Select a payment method') }}</option>
                <option value="credit_card">{{ __('Annuel') }}</option>
                <option value="paypal">{{ __('Par Client') }}</option>
            </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
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
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2024 Accounting hall.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
</x-guest-layout>

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
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('input');

        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                // Remove gold border from all inputs
                inputs.forEach(i => i.classList.remove('gold-border'));
                // Add gold border to the focused input
                input.classList.add('gold-border');
            });

            // Optional: Remove gold border when input loses focus
            input.addEventListener('blur', () => {
                input.classList.remove('gold-border');
            });
        });
    });
</script>
