<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Accountant; // Import the Accountant model
use App\Models\Demande;
use App\Models\Abonnementsglobal;
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
    // public function create(array $input): User
    // {
    //     Validator::make($input, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => $this->passwordRules(),
    //         'nom_commercial' => ['required', 'string', 'max:255'], // Add validation for accountant fields
    //         // 'Nomprenom' => ['required', 'string', 'max:255'],
    //         'registre_de_commerce' => ['required', 'string', 'max:255'],
    //         'code_tva' => ['required', 'string', 'max:255'],
    //         'phone' => ['required', 'string', 'max:255'],
    //         'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    //     ])->validate();

    //     // Create the user
    //     $user = User::create([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //         'password' => Hash::make($input['password']),
    //     ]);

    //     // Create the accountant entry
    //     Accountant::create([
    //         'nom_commercial' => $input['nom_commercial'],
    //         'Nomprenom' => $input['name'],
    //         'registre_de_commerce' => $input['registre_de_commerce'],
    //         'code_tva' => $input['code_tva'],
    //         'phone' => $input['phone'],
    //         'email' => $input['email'], // Assuming it’s the same
    //         'etat' => 'inactive',
    //     ]);

    //      // Create the abonnementsglobal entry
    //     $abonnement = Abonnementsglobal::create([
    //         'abonnementactif' => 0, // Inactive initially
    //         // 'montant' => $input['montant'], // Assuming this comes from input
    //         'typeabonnement' => $input['typeabonnement'], // Assuming this comes from input
    //     ]);

    //     // Create the demande entry
    //     Demande::create([
    //         'typeabonnements' => $input['typeabonnement'],
    //         'etat_demande' => 'en cours de traitements',
    //         'commentaire' => null, // Add if needed
    //         'comptable' => $user->id, // Assuming the user is linked to the accountant
    //         'abonnementglobals' => $abonnement->idabonnementglobals,
    //     ]);

    //         return $user;
    //     }
    public function create(array $input)
    {
        Validator::make($input, [
            'nom_commercial' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'registre_de_commerce' => ['required', 'string', 'max:255'],
            'code_tva' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Ensure email is unique for later user creation
            'typeabonnement' => ['required', 'string', 'max:255'], 
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Combine all accountant details into a JSON object
        $accountantDetails = json_encode([
            'nom_commercial' => $input['nom_commercial'],
            'Nomprenom' => $input['name'],
            'registre_de_commerce' => $input['registre_de_commerce'],
            'code_tva' => $input['code_tva'],
            'phone' => $input['phone'],
            'email' => $input['email'],
        ]);
        // Create the demande entry
        $demande = Demande::create([
            'etat_demande' => 'en cours de traitements', // Ensure correct ENUM value
            'details_comptable' => $accountantDetails, // Store all details of accountant in a single column
            'typeabonnement' => $input['typeabonnement'],
            'commentaire' => null, // Placeholder for admin comments
            'idcomptable' => null,
            'idabonnementglobals' => null,
        ]);

        // Redirect back to home page after successful request
        return redirect()->route('home')->with('success', 'Votre demande a été soumise avec succès.');

    }
}
