<?php

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
    return view('dashboard');
});


Route::resource('employes', 'employesControler');

Route::resource('companies', 'companiesControler');

Route::get('/dashboard', 'dashboardControler@index');

Auth::routes();

