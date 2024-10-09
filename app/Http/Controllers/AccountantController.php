<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountantController extends Controller
{

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
    // $declarations = Declaration::where('client_id', $client->idClients)->get();

  

    // return view('client.show', compact('client', 'declarations'));
    // }
}
