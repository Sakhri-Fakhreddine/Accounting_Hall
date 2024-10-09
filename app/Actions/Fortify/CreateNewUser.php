<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Accountant; // Import the Accountant model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'nom_commercial' => ['required', 'string', 'max:255'], // Add validation for accountant fields
            // 'Nomprenom' => ['required', 'string', 'max:255'],
            'registre_de_commerce' => ['required', 'string', 'max:255'],
            'code_tva' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Create the accountant entry
        Accountant::create([
            'nom_commercial' => $input['nom_commercial'],
            'Nomprenom' => $input['name'],
            'registre_de_commerce' => $input['registre_de_commerce'],
            'code_tva' => $input['code_tva'],
            'phone' => $input['phone'],
            'email' => $input['email'], // Assuming it’s the same
        ]);

        return $user;
    }
}
