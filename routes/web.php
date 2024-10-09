<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeclarationController;

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

    Route::get('/accountants', [AdminController::class, 'accountant'])->name('accountants.index');

    // Using route model binding for Accountant
    Route::get('/user/{accountant}', [AdminController::class, 'show'])->name('accountant.show');
});

//HOME ROUTES
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/', [HomeController::class, 'index']);

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
Route::get('/declarations/{id}/edit', [DeclarationController::class, 'edit'])->name('declarations.edit');
Route::put('/declarations/{id}', [DeclarationController::class, 'update'])->name('declarations.update');
Route::delete('/declarations/{id}', [DeclarationController::class, 'destroy'])->name('declarations.destroy');