<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\AccountController;
use App\Models\Accountant;

class AdminController extends Controller
{
     //view accountants 
     public function accountant()
     {
         $accountants = Accountant::all(); // Fetch all users from the database
         return view('admin.comptables', compact('accountants'));
     }
     public function show($id)
     {
         $accountant = Accountant::findOrFail($id);
         return view('admin.show', compact('accountant'));
     }
 
}
