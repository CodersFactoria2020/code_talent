<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/promotion', 'PromotionController');



Route::resource('/candidate', 'CandidateController');


Route::get('/candidate', 'CandidateController@index')->name('candidate');


Route::get('/dashboard', function () {
    return view('dashboardAdmin.dashboard');
});

Route::get('/charts', function () {
    return view('dashboardAdmin.charts');
});
Route::get('/tables', function () {
    return view('dashboardAdmin.tables');
});
Route::get('/promotions', function () {
    return view('dashboardAdmin.promotions');
});


