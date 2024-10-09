<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Declaration;
use App\Models\Client;
use App\Models\LigneDeclaration; 
use App\Http\Controllers\LignededeclarationController; // Import LigneDeclarationController
use Auth;

class DeclarationController extends Controller
{
    // Show the form to create a new declaration
    public function create()
    {
        return view('declaration.create');
    }

    // Store the new declaration and associated LigneDeclarations
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'declaration_type' => 'required',
            'declaration_date' => 'required|date',
            'details' => 'nullable|string',
            'lignededeclarations' => 'required|array', // Validate that ligne_declarations is an array
            'lignededeclarations.*.typedeclaration' => 'required|string',
            'lignededeclarations.*.documents' => 'nullable|file|mimes:pdf,jpg,png', // Validate file type
            'lignededeclarations.*.datepiece' => 'required|date',
            'lignededeclarations.*.libelle' => 'required|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Find the client by the user's email
        $client = Client::where('email', $user->email)->first();

        // Check if the client exists
        if (!$client) {
            return redirect()->back()->withErrors(['message' => 'Client not found for the authenticated user.']);
        }

        // Create the Declaration
        $declaration = Declaration::create([
            'declaration_type' => $request->declaration_type,
            'declaration_date' => $request->declaration_date,
            'details' => $request->details,
            'client_id' => $client->idClients,
        ]);

        // Use LigneDeclarationController to handle ligne_declarations
        $ligneDeclarationController = new LignededeclarationController();
        $success = $ligneDeclarationController->store($request->lignededeclarations, $declaration->id);

        // Handle failure of storing LigneDeclarations
        if (!$success) {
            return redirect()->back()->withErrors(['message' => 'Failed to create line declarations.']);
        }

        // Redirect to declaration index with success message
        return redirect('/')->with('success', 'Declaration created successfully!');
    }

    // Show the list of declarations for the authenticated user
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the client by the user's email
        $client = Client::where('email', $user->email)->first();

        // Fetch declarations based on client ID
        $declarations = Declaration::where('client_id', $client->idClients)->get();

        return view('declaration.index', compact('declarations'));
    }

    // Show the edit form for a specific declaration
    public function edit($id)
    {
        // Find the declaration
        $declaration = Declaration::findOrFail($id);
        
        // You may want to check if the declaration belongs to the client
        $user = Auth::user();
        $client = Client::where('email', $user->email)->first();

        if ($declaration->client_id !== $client->idClients) {
            return redirect()->back()->withErrors(['message' => 'Unauthorized access to this declaration.']);
        }

        return view('declaration.edit', compact('declaration'));
    }

    // Update the specified declaration
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'declaration_type' => 'required',
            'declaration_date' => 'required|date',
            'details' => 'nullable|string',
        ]);

        // Find the declaration
        $declaration = Declaration::findOrFail($id);
        
        // You may want to check if the declaration belongs to the client
        $user = Auth::user();
        $client = Client::where('email', $user->email)->first();

        if ($declaration->client_id !== $client->idClients) {
            return redirect()->back()->withErrors(['message' => 'Unauthorized access to this declaration.']);
        }

        // Update the declaration
        $declaration->update([
            'declaration_type' => $request->declaration_type,
            'declaration_date' => $request->declaration_date,
            'details' => $request->details,
        ]);

        return redirect('/')->with('success', 'Declaration updated successfully!');
    }

    // Delete the specified declaration
    public function destroy($id)
    {
        // Find the declaration
        $declaration = Declaration::findOrFail($id);
        
        // You may want to check if the declaration belongs to the client
        $user = Auth::user();
        $client = Client::where('email', $user->email)->first();

        if ($declaration->client_id !== $client->idClients) {
            return redirect()->back()->withErrors(['message' => 'Unauthorized access to this declaration.']);
        }

        // Delete the declaration
        $declaration->delete();

        return redirect('/')->with('success', 'Declaration deleted successfully!');
    }

    // Show the details of a specific declaration
    public function show($id)
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Find the client by the user's email
        $client = Client::where('email', $user->email)->first();
    
        // Find the declaration by ID and ensure it belongs to the authenticated client
        $declaration = Declaration::where('id', $id)->where('client_id', $client->idClients)->first();
    
        // Check if the declaration exists
        if (!$declaration) {
            return redirect()->back()->withErrors(['message' => 'Declaration not found or does not belong to you.']);
        }
    
        // Get the declaration lines related to the found declaration
        $declarationlines = LigneDeclaration::where('declaration_id', $declaration->id)->get();
    
        return view('declaration.show', compact('declaration', 'declarationlines'));
    }
}
