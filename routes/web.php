<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PetsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/clients', function () {
    return view('clients.index');
});


Route::get('/clients', [ClientsController::class, 'index'])->name('newClient');

Route::post('/clients', [ClientsController::class, 'store'])->name('newClient');

Route::get('/clients/{id}', [ClientsController::class, 'show'])->name('clients-show');

Route::patch('/clients/{id}', [ClientsController::class, 'update'])->name('clients-update');

Route::delete('/clients/{id}', [ClientsController::class, 'delete'])->name('clients-delete');


Route::resource('pets',PetsController::class);

Route::resource('appointments',AppointmentsController::class);

Route::get('/appointments/showall', [AppointmentsController::class, 'showAll']);