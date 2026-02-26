<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//homepage
Route::get('/', function () {
    return 'Homepage';
});

//lista utenti
Route::get('/users', [UserController::class, 'index']); //la route users va a chiamare tutta la classe di usercontroller con il metodo index

//creazione utente
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'save']); 

//modifica utente
Route::get('/users/update/{id}', [UserController::class, 'update']);
Route::post('/users/update/{id}', [UserController::class, 'saveUpdate']);

//elimina utente
Route::delete('/users/delete/{id}', [UserController::class, 'delete']);