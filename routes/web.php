<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('org-units', App\Http\Controllers\OrgUnitController::class);
