<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/candidate', 'CandidateController@index')->name('candidate');

Route::resource('candidate', 'CandidateController');



Route::get('/dashboard', function () {
    return view('dashboardAdmin.dashboard');
});

Route::get('/charts', function () {
    return view('dashboardAdmin.charts');
});
Route::get('/tables', function () {
    return view('dashboardAdmin.tables');
});
Route::get('/login', function () {
    return view('dashboardAdmin.login');
});Route::get('/password', function () {
    return view('dashboardAdmin.password');
});Route::get('/register', function () {
    return view('dashboardAdmin.register');
});

