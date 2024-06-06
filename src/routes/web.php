<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('auth')->group(function () {

    Route::get('/', [AuthController::class, 'index']);
});

    Route::post('/register', [AuthController::class, 'store']);

      Route::get('/contact', function(){
        return view('contact');
      });

            Route::get('/', function(){
        return view('contact');
      });


