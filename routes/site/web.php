<?php

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
Route::prefix('site')

    ->group(function (){

        Route::get('/', "WelcomeController@index")->name("welcome");

        Route::resource('books','BookController')->only(['index','show']);
    });


