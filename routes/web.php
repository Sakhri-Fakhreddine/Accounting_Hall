<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\EmailController;
use App\Http\Middleware\CheckAccountStatus;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');   
});
//HOME and auth ROUTES
Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [DemandeController::class, 'store'])->name('demande.store');

// Admin routes 
Route::get('/accountants', [AdminController::class, 'accountant'])->name('accountants.index');
Route::get('/demandes', [AdminController::class, 'demande'])->name('demandes.index');
Route::get('/demandes/{id}', [AdminController::class, 'detailsdemande'])->name('detailsdemande');
Route::get('/user/{id}/activer', [AdminController::class, 'activercompte'])->name('compte.activer');
Route::get('/user/{id}/desactiver', [AdminController::class, 'desactivercompte'])->name('compte.desactiver');
Route::get('/user/{accountant}', [AdminController::class, 'show'])->name('accountant.show');

// Demandes Routes
Route::get('/demandes_acceptées', [DemandeController::class, 'demandesacceptées'])->name('demandes_acceptées');
Route::get('/demandes_refusées', [DemandeController::class, 'demandesrefusées'])->name('demandes_refusées');
Route::get('/demandes_encours', [DemandeController::class, 'demandesencours'])->name('demandes_encours');

//CLIENT ROUTES
Route::get('/create_client', [ClientController::class, 'create'])->name('create_client');
Route::post('/create_client', [ClientController::class, 'store'])->name('create_client.store');
Route::get('/show_client', [ClientController::class, 'show'])->name('show_client');
Route::get('/clients/{id}', [ClientController::class, 'view'])->name('show_client_info');
// Route::get('/accountant/show_client_declarations/{id}', [AccountantController::class, 'declarations'])->name('show_client_declarations');
// Route::get('/accountant/show_client_declarations/{client}', [ClientController::class, 'declarations'])->name('show_client_declarations');
Route::get('/client/{id}/declarations', [ClientController::class, 'showDeclarations'])->name('show_client_declarations');


//DECLARATION ROUTES
Route::get('/create_declaration', [DeclarationController::class, 'create'])->name('create_declaration');
Route::post('/create_declaration', [DeclarationController::class, 'store'])->name('create_declaration.store');
Route::get('/show_declaration', [DeclarationController::class, 'index'])->name('show_declaration');
Route::get('/declarations/{id}', [DeclarationController::class, 'show'])->name('declarations.show');
Route::get('/client-declarations/{id}', [DeclarationController::class, 'showclientdeclaration'])->name('clientdeclarations.show');
Route::get('/declarations/{id}/edit', [DeclarationController::class, 'edit'])->name('declarations.edit');
Route::get('/client-declarations/{id}/edit', [DeclarationController::class, 'editclientdeclaration'])->name('clientdeclarations.edit');
Route::put('/declarations/{id}', [DeclarationController::class, 'update'])->name('declarations.update');
Route::delete('/declarations/{id}', [DeclarationController::class, 'destroy'])->name('declarations.destroy');



// google auth routes
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// mailing
Route::post('/send-email', [EmailController::class, 'send'])->name('send.email');

//handling demandes 
Route::put('/demandes/{demande}/accept', [DemandeController::class, 'accept'])->name('demandes.accept');

//default settings routes 
Route::get('/parametres_par_defaut', [AdminController::class, 'parametres_par_defaut'])->name('parametres_par_defaut');
Route::get('/parametres_declaration', [AdminController::class, 'parametres_declaration'])->name('parametres_declaration');
Route::get('/parametres_lignes_declarations', [AdminController::class, 'parametres_lignes_declarations'])->name('parametres_lignes_declarations');