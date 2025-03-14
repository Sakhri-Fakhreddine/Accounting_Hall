<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Demande;
use App\Models\Abonnementsglobal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class AuthController extends Controller
{
    /**
     * Recreating the login logic 
     */
public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    Log::info('Login attempt started.', ['email' => $request->email]);

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        Log::info('Authentication successful.', ['email' => $request->email]);

        $user = Auth::user();
        if ($user->usertype=="1") {
            $accountant = Accountant::where('email', $user->email)->first();

            // Check if accountant exists
            if (!$accountant) {
                Log::warning('Accountant not found.', ['email' => $user->email]);
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Accountant record not found.']);
            }

            // Check the 'etat' of the user
            if ($accountant->etat !== 'active') {
                Log::warning('Inactive account login attempt.', ['email' => $user->email, 'etat' => $accountant->etat]);
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Your account is ' . $accountant->etat . '. Please resolve the issue or check your email.']);
            }

            Log::info('User authenticated and active.', ['email' => $user->email]);
            // If 'etat' is active, proceed with normal login
            return redirect()->intended('/redirect');
        } 
        else {
            Log::info('User authenticated', ['email' => $user->email]);
            // If 'etat' is active, proceed with normal login
            return redirect()->intended('/redirect');
        }

        // If authentication fails
        Log::warning('Authentication failed.', ['email' => $request->email]);
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
    }   }



    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function handleGoogleCallback()
    {
        // Retrieve user information from Google
        $googleUser = Socialite::driver('google')->user();

        // Check if the user already exists in your database
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // Log in the existing user
            Auth::login($user);
        } else {
            // Create a new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
            ]);

            // Log in the new user
            Auth::login($user);
        }

        // Redirect to the desired page after successful login
        return redirect()->route('redirect');
    }

    /**
     * Log the user out of the application.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }


}
