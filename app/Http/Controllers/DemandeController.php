<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Accountant;
use App\Models\Abonnementsglobal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DemandeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        Validator::make($request->all(), [
            'nom_commercial' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'registre_de_commerce' => ['required', 'string', 'max:255'],
            'code_tva' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 
            'typeabonnement' => ['required', 'string', 'max:255'], 
            // 'terms' => ['required'],
        ])->validate();

        // Create the demande
        Demande::create([
            'etat_demande' => 'en cours de traitements',
            'details_comptable' => json_encode([
                'nom_commercial' => $request->nom_commercial,
                'Nomprenom' => $request->name,
                'registre_de_commerce' => $request->registre_de_commerce,
                'code_tva' => $request->code_tva,
                'phone' => $request->phone,
                'email' => $request->email,
            ]),
            'typeabonnement' => $request->typeabonnement,
            'commentaire' => null,
            'idcomptable' => null,
            'idabonnementglobals' => null,
        ]);

        // Redirect back to home page after successful request
        return redirect()->route('home')->with('success', 'Votre demande a été soumise avec succès.');
    }
    public function accept(Request $request, Demande $demande)
    {
        $validated = $request->validate([
            'montant' => 'required|numeric|min:0',
            'comment' => 'nullable|string|max:500'
        ]);

        // Decode the JSON details
        $accountantDetails = json_decode($demande->details_comptable, true);
        DB::transaction(function () use ($demande, $validated, $accountantDetails) {
            // 1. Create User
            $user = User::create([
                'name' => $accountantDetails['Nomprenom'],
                'email' => $accountantDetails['email'],
                'password' => Hash::make('defaultpassword'), // Set default password (user should change it)
            ]);

            // 2. Create Accountant
            $accountant = Accountant::create([
                'nom_commercial' => $accountantDetails ['nom_commercial'],
                'Nomprenom' => $accountantDetails ['Nomprenom'],
                'registre_de_commerce' => $accountantDetails['registre_de_commerce'],
                'code_tva' => $accountantDetails['code_tva'],
                'phone' => $accountantDetails['phone'],
                'email' => $accountantDetails['email'],
                'etat' => 'active',
            ]);
            // dd($accountant); // Vérifie si l'ID est bien créé
            // $accountant = Accountant::where('email', $accountantDetails['email'])->first(); // Recharge l'accountant

            if (!$accountant->idAccountant) {
                throw new \Exception("L'accountant n'a pas été créé correctement");
            }
            // 3. Create Abonnement
            $abonnement = Abonnementsglobal::create([
                'etat_abonnement' => 1, // Active
                'montant' => $validated['montant'],
                'typeabonnement' => $demande->typeabonnement,
                'idcomptable' => $accountant->idAccountant, 
            ]);
            $abonnement = Abonnementsglobal::where('idcomptable', $accountant['idAccountant'])->first(); // Recharge l'accountant

            // 4. Update Demande
            $demande->update([
                'idabonnementglobals' => $abonnement->idabonnementglobals,
                'idcomptable' => $accountant->idAccountant,
                'etat_demande' => 'acceptée',
                'commentaire' => $validated['comment'] ?? null
            ]);
        });

        return redirect()->back()->with('success', 'Demande accepted, accountant created, and abonnement registered');
    }
    public function demandesacceptées(){
        $accpeteddemandes = Demande::where('etat_demande','acceptée')->get(); // Fetch all the accepted demandes from the database
        return view('demandes.acceptées', compact('accpeteddemandes'));
    }
    public function demandesrefusées(){
        $refuseddemandes = Demande::where('etat_demande','refusée')->get(); // Fetch all the refused demandes from the database
        return view('demandes.refusées', compact('refuseddemandes'));
    }
    public function demandesencours(){
        $pendingdemandes = Demande::where('etat_demande','en cours de traitments')->get(); // Fetch all the refused demandes from the database
        return view('demandes.encours', compact('pendingdemandes'));
    }
}