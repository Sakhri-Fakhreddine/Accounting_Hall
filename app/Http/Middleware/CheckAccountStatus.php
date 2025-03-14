<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccountStatus
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $accountant = Auth::user();

            // Check the 'etat' of the accountant
            if ($accountant->etat !== 'active') {
                // Log the user out and redirect with an error message
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Please wait for approval or check your mail for response.']);
            }
        }

        return $next($request);
    }
}