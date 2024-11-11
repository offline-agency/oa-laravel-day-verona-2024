<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard-reverb', function () {
    return view('dashboard-reverb');
});

Route::get('/dashboard-pusher', function () {
    return view('dashboard-pusher');
});

Route::get('/', function () {
    return view('welcome');
});
