<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');
