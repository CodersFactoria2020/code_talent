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
    return view('dashboard');
});

Route::get('/charts', function () {
    return view('charts');
});
Route::get('/tables', function () {
    return view('tables');
});
