<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMsg;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\DocumentController;  


Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('document.create');
});



Route::get('/email', function () {
    Mail::to('test@example.com')->send(new WelcomeMsg());
});


Route::resource('org-units', App\Http\Controllers\OrgUnitController::class);


Route::resource('documents', App\Http\Controllers\DocumentController::class);



Route::get('/form1', function () {
    return view('welcome1');
});

Route::get('/form2', function () {
    return view('welcome2');
});