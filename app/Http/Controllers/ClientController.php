<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Accountant; 
use App\Models\Declaration;
use App\Models\LigneDeclaration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use Auth;

class ClientController extends Controller
{
    public function create()
    {
        return view('accountant.create_client');
    }

    public function show()
    {
        $clients = Client::all();
        return view('accountant.show_client', compact('clients'));
    }

    public function store(Request $request)
    {
        // Validate client data
        $validatedData = $request->validate([
            'Nomprenom' => 'required|string|max:255',
            'nom_commerciale' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:clients',
        ]);

        // Find the authenticated user's accountant information
        $accountant = Accountant::where('idAccountant', auth()->id())->first();

        if (!$accountant) {
            return redirect()->back()->with('error', 'No associated accountant found.');
        }

        // Generate a random password
        $randomPassword = Str::random(10);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['Nomprenom'], // Client's full name
            'email' => $validatedData['email'],    // Client's email
            'password' => Hash::make($randomPassword), // Hash the random password
            // 'password' => '12345678',               // Set static password for now
            'usertype' => 2,                      // Assign usertype as 2 (for client)
        ]);

        // Create the client and associate it with the created user and the accountant
        $client = Client::create($validatedData + ['id_accountant' => $accountant->idAccountant]);

        // Send an email to the user with the random password (optional)
        Mail::send('emails.new_client', ['email' => $user->email, 'password' => $randomPassword], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Your Account Details');
        });

        return redirect('/')->with('success', 'Client created successfully!');
    }
    public function view($id)
        {
            // Get the authenticated user
            $user = Auth::user();
            
            // Find the accountant by the user's email
            $accountant = Accountant::where('email', $user->email)->first();
            
            // Check if the accountant exists
            if (!$accountant) {
                return redirect()->back()->withErrors(['message' => 'Accountant not found for the authenticated user.']);
            }
            
            // Debugging statement to verify accountant
            \Log::info('Accountant found: ', ['accountant' => $accountant]);

            // Find the client by ID and ensure it belongs to the authenticated accountant
            $client = Client::where('idClients', $id)->first();
            
            // Debugging statement to verify client
            \Log::info('Client query result: ', ['client' => $client]);
            
            // Check if the client exists and belongs to the authenticated accountant
            if (!$client) {
                return redirect()->back()->withErrors(['message' => 'Client not found or does not belong to you.']);
            }

            // // Get the declarations for this client
            // $declarations = Declaration::where('client_id', $client->idClients)->get();

            // // Debugging statement to verify declarations
            // \Log::info('Declarations found: ', ['declarations' => $declarations]);

            return view('client.show', compact('client'));
        }

    
    
    
    // public function declarations($id)
    // {
    //     // Get the authenticated user
    //     $user = Auth::user();
        
    //     // Find the accountant by the user's email
    //     $accountant = Accountant::where('email', $user->email)->first();
        
    //     // Check if the accountant exists
    //     if (!$accountant) {
    //         return redirect()->back()->withErrors(['message' => 'Accountant not found for the authenticated user.']);
    //     }
    
    //     // Find the client by ID and ensure it belongs to the authenticated accountant
    //     $client = Client::where('idClients', $id)->where('id_accountant', $accountant->idAccountant)->first();
        
    //     // Check if the client exists and belongs to the authenticated accountant
    //     if (!$client) {
    //         return redirect()->back()->withErrors(['message' => 'Client not found or does not belong to you.']);
    //     }
        
    //     // Get the declarations for this client
    //     $declarations = Declaration::where('client_id', $client->idClients)->get();
    
    //     // Return the view with client and declarations data
    //     return view('client.show', compact('client', 'declarations'));
    // }
    
    public function showDeclarations($id)
        {
            // Get the authenticated user
            $user = Auth::user();
            
            // Find the accountant by the user's email
            $accountant = Accountant::where('email', $user->email)->first();
            
            // Check if the accountant exists
            if (!$accountant) {
                return redirect()->back()->withErrors(['message' => 'Accountant not found for the authenticated user.']);
            }

            // Find the client by ID and ensure it belongs to the authenticated accountant
            $client = Client::where('idClients', $id)->first();
            
            // Check if the client exists and belongs to the authenticated accountant
            if (!$client) {
                return redirect()->back()->withErrors(['message' => 'Client not found or does not belong to you.']);
            }
            
            // Get the declarations for this client
            $declarations = Declaration::where('client_id', $client->idClients)->get();
            \Log::info('Declarations found for the declaration view: ', ['declarations' => $declarations]);
            
            // Group declarations by month
            $groupedDeclarations = $declarations->groupBy(function ($declaration) {
                return \Carbon\Carbon::parse($declaration->declaration_date)->format('F Y');
            });
            
            // Return the view with client and grouped declarations data
            return view('declaration.show_client_declarations', [
                'client' => $client,
                'groupedDeclarations' => $groupedDeclarations
            ]);
        }

    
    
}
