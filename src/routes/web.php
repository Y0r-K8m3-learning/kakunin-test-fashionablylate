<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckLoginStatus;



// ログインが必要なルート

Route::middleware([CheckLoginStatus::class])->group(function () {
   
    Route::get('/', function () {
                return view('contact'); 
    });

    Route::get('/login', function () {
        return view('auth.login');
    });


});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

     Route::middleware(['auth'])->group(function () {

    Route::get('/contact',  [ContactController::class, 'index']);

    Route::get('/admin', [AdminController::class, 'index']);
});


// Route::middleware(['auth'])->group(function () {

//        
// });



Route::post('/register', [AuthController::class, 'store']);
//Route::post('/admin', [AuthController::class, 'login']);

Route::get('/contacts/export', [AdminController::class, 'export'])->name('search.export');


 Route::get('/admin/search', [AdminController::class, 'search']);
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::delete('/contact/delete', [ContactController::class, 'destroy']);
Route::post('/contact/store', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');







