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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('welcome');
});

Route::get('/email', function(){
    return view('email.notify');
});

Route::get('/clients/grid', 'ClientsController@grid');
Route::resource('/clients', 'ClientsController');

Route::get('/projects/grid', 'ProjectsController@grid');
Route::resource('/projects', 'ProjectsController');
