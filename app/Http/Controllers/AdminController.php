<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\AccountController;
use App\Models\Accountant;
use App\Models\User;
use App\Models\Demande;
use App\Models\Abonnementsglobal;
use App\Models\Parametres_declarations;
use App\Models\Parametres_lignes_declarations;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     //view accountants 
     public function accountant()
     {
         $accountants = Accountant::all(); // Fetch all users from the database
         return view('admin.comptables', compact('accountants'));
     }
     public function demande()
     {
         $demandes = Demande::all(); // Fetch all users from the database
         return view('demandes.demandes', compact('demandes'));
     }
     public function show($id)
     {
         $accountant = Accountant::findOrFail($id);
         return view('admin.show', compact('accountant'));
     }
     public function detailsdemande($id)
     {
         $demande = Demande::findOrFail($id);
         return view('demandes.detailsdemande', compact('demande'));
     }
     public function approveDemande(Demande $demande ,array $input )
     {
         // Decode accountant details from JSON
         $accountantDetails = json_decode($demande->details, true);
     
         // Ensure no existing user with this email
         if (User::where('email', $accountantDetails['email'])->exists()) {
             throw new \Exception("User with this email already exists.");
         }
     
         // Create the user
         $user = User::create([
             'name' => $accountantDetails['Nomprenom'],
             'email' => $accountantDetails['email'],
             'password' => Hash::make('defaultpassword'), // Set default password (user should change it)
         ]);
     
         // Create the accountant entry
         $accountant = Accountant::create([
             'nom_commercial' => $accountantDetails['nom_commercial'],
             'Nomprenom' => $accountantDetails['Nomprenom'],
             'registre_de_commerce' => $accountantDetails['registre_de_commerce'],
             'code_tva' => $accountantDetails['code_tva'],
             'phone' => $accountantDetails['phone'],
             'email' => $accountantDetails['email'],
             'etat' => 'active',
         ]);
     
         // Create the abonnementsglobal entry
         $abonnement = Abonnementsglobal::create([
             'abonnementactif' => 1, // Active
             'montant'=> $input['montant'],
             'typeabonnement' => $demande->typeabonnements, 
         ]);
     
         // Mark the demande as approved
         $demande->update([
             'etat_demande' => 'approuvée',
             'commentaire'=> $input['commentaire']
         ]);
         //mail the acceptance mail  or refusal 

     
         return $user;
     }
     public function deleteDemande(Demande $demande ,array $input )
     {
        // Mark the demande as approved
        $demande->update([
            'etat_demande' => 'refusée',
            'commentaire'=> $input['commentaire']
        ]);
     }
     public function activercompte( $idAccountant )
     {
        $accountant=Accountant::findOrFail($idAccountant);
        // Mark the demande as approved
        $accountant->update(['etat' => 'active']);
        return redirect()->back()->with('success', 'Accountant account has been activated');
     }
     public function desactivercompte( $idAccountant )
     {
        $accountant=Accountant::findOrFail($idAccountant);
        // Activate the accountant account
        $accountant->update(['etat' => 'inactive']);
        return redirect()->back()->with('success', 'Accountant account has been desactivated');
     }
     public function parametres_par_defaut()
     {
         $parametresdeclarations = 	Parametres_declarations::all(); // Fetch all default settings from database
         $lignes_parametres_declarations = 	Parametres_lignes_declarations::all(); // Fetch all default settings from database
         return view('parametres_par_defauts.parametres', compact('parametresdeclarations','lignes_parametres_declarations'));
     }
     public function parametres_declaration()
     {
         return view('parametres_par_defauts.parametres_declaration');
     }
     public function parametres_lignes_declarations()
     {
         return view('parametres_par_defauts.parametres_ligne_declarations');
     }


 
}
