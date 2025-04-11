<?php

namespace App\Http\Controllers;

use App\Models\Parametres_declarations;
use App\Models\Accountant;
use App\Models\Parametres_lignes_declarations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function addsettings()
    {
        $user = Auth::user();
        $accountant = Accountant::where('email', $user->email)->first();

        // Initialize as an empty collection
        $parametresdeclarations = collect();

        // Get all possible declaration types, ensuring a collection is returned
        $allTypes = collect(Parametres_declarations::distinct()->pluck('declaration_type'));

        // Debug: Uncomment to check the contents of $allTypes
        // dd($allTypes);

        foreach ($allTypes as $type) {
            if ($accountant && $accountant->idAccountant) {
                // Try to get accountant-specific parameter for this type
                $parametre = Parametres_declarations::where('id_accountant', $accountant->idAccountant)
                    ->where('declaration_type', $type)
                    ->with('lignes') // Correct relationship name
                    ->first();

                if ($parametre) {
                    $parametresdeclarations->push($parametre);
                    continue; // Skip to next type if accountant-specific is found
                }
            }

            // Fallback to default parameter for this type
            $defaultParametre = Parametres_declarations::whereNull('id_accountant')
                ->where('declaration_type', $type)
                ->with('lignes') // Correct relationship name
                ->first();

            if ($defaultParametre) {
                $parametresdeclarations->push($defaultParametre);
            }
        }
        

        // Get all lines from the fetched declarations
        $lignes_parametres_declarations = $parametresdeclarations->isNotEmpty()
            ? $parametresdeclarations->flatMap->lignes // Correct relationship name
            : Parametres_lignes_declarations::all();
            // dd($parametresdeclarations, $lignes_parametres_declarations);

        return view('accountantsettings.parametres_accountant', compact('parametresdeclarations', 'lignes_parametres_declarations'));
    }
    public function updatesettings($id)
    {
        $user = Auth::user();
        $accountant = Accountant::where('email', $user->email)->first();

        // Fetch the declaration by ID
        $declaration = Parametres_declarations::with('lignes')->findOrFail($id);

        // Pass the declaration to the view for editing
        return view('accountantsettings.updatedeclarationparameters', compact('declaration', 'accountant'));
    }

    public function saveUpdatesettings(Request $request, $id)
    {
        $user = Auth::user();
        $accountant = Accountant::where('email', $user->email)->first();

        // Fetch the existing declaration
        $existingDeclaration = Parametres_declarations::find($id);

        if ($existingDeclaration->id_accountant) {
            // Update existing declaration if it already has an accountant ID
            $existingDeclaration->update([
                'declaration_type' => $request->input('declaration_type', $existingDeclaration->declaration_type),
                // Add other fields if needed
            ]);
            $declaration = $existingDeclaration;
        } else {
            // Create a new declaration with accountant ID if it doesn't have one
            $declaration = Parametres_declarations::create([
                'declaration_type' => $existingDeclaration->declaration_type,
                'id_accountant' => $accountant->idAccountant,
            ]);

            // Copy existing lines to the new declaration
            foreach ($existingDeclaration->lignes as $line) {
                Parametres_lignes_declarations::create([
                    'libellée' => $line->libellée,
                    'compte_comptable' => $line->compte_comptable,
                    'debit_credit' => $line->debit_credit,
                    'idparametresdeclarations' => $declaration->id_parametres_declarations,
                ]);
            }
        }

        // Handle line updates (add/delete)
        if ($request->has('lines')) {
            // Delete existing lines not in the request (if any)
            $existingLineIds = $declaration->lignes->pluck('id_lignes_parametres_declarations')->toArray();
            $submittedLineIds = array_filter(array_column($request->input('lines', []), 'id'));

            $linesToDelete = array_diff($existingLineIds, $submittedLineIds);
            Parametres_lignes_declarations::whereIn('id_lignes_parametres_declarations', $linesToDelete)->delete();

            // Add or update lines
            foreach ($request->input('lines') as $lineData) {
                if (isset($lineData['id']) && $lineData['id']) {
                    // Update existing line
                    Parametres_lignes_declarations::where('id_lignes_parametres_declarations', $lineData['id'])
                        ->update([
                            'libellée' => $lineData['libellée'],
                            'compte_comptable' => $lineData['compte_comptable'],
                            'debit_credit' => $lineData['debit_credit'],
                        ]);
                } else {
                    // Add new line
                    Parametres_lignes_declarations::create([
                        'libellée' => $lineData['libellée'],
                        'compte_comptable' => $lineData['compte_comptable'],
                        'debit_credit' => $lineData['debit_credit'],
                        'idparametresdeclarations' => $declaration->id_parametres_declarations,
                    ]);
                }
            }
        }

        return redirect()->route('add_settings')->with('success', 'Declaration settings updated successfully!');
    }
}