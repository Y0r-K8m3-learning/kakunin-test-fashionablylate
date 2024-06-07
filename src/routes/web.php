<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


Route::middleware('auth')->group(function () {

    Route::get('/', [AuthController::class, 'index']);


      Route::get('/contact', function(){
              return view('contact');
            });

      Route::get('/', [AdminController::class, 'index']);

      Route::get('/contacts/search', [AdminController::class, 'search']);

              Route::get('/contact', [ContactController::class, 'index']);

              Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

              Route::post('/contacts', [ContactController::class, 'store']);

              Route::delete('/todos/delete', [TodoController::class, 'destroy']);

      });

      Route::post('/register', [AuthController::class, 'store']);







