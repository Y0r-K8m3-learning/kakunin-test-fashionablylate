<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


Route::middleware('auth')->group(function () {

        Route::get('/', [ContactController::class, 'index']);

});

//Route::post('/register', [AuthController::class, 'store']);
//Route::get('/admin', [AdminController::class, 'search']);
//Route::post('/admin', [AuthController::class, 'login']);
// Route::get('/admin/search', [AdminController::class, 'search']);
// Route::post('/contact/confirm', [ContactController::class, 'confirm']);
// Route::delete('/contact/delete', [ContactController::class, 'destroy']);
// Route::post('/contact/store', [ContactController::class, 'store']);
// Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');







