<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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


Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/create_client', [ClientController::class, 'create'])->name('create_client');
Route::post('/create_client', [ClientController::class, 'store'])->name('create_client.store');
Route::get('/show_client', [ClientController::class, 'show'])->name('show_client');