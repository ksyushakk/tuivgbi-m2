<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[\App\Http\Controllers\UserController::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\UserController::class,'loginPost']);

Route::get('/register',[\App\Http\Controllers\UserController::class,'register'])->name('register');
Route::post('/register',[\App\Http\Controllers\UserController::class,'registerPost']);

Route::middleware('auth')->group(function(){

    Route::middleware('role:user,admin')->group(function(){

        Route::middleware('role:admin')->group(function(){
         Route::group(['prefix' => '/admin', 'as'=> 'admin.' ],function (){
            Route::resource('product', ProductController::class);
         });
        });
    });

        Route::get('/logout', [UserController::class,'logout'])->name('logout');
});
