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
    return view('dashboard.index');
});

Route::get('/females', function () {
    return view('reproducers/females.index');
});

Route::get('/males', function () {
    return view('reproducers/males.index');
});

Route::get('/calendar', function () {
    return view('calendar.index');
});

Route::post('/login', 'Auth\LoginController@login');
