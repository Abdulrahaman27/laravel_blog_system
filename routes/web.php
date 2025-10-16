<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('blogs.index');
})->name('blogs.index');
Route::get('blogs/create', function(){
    return view('blogs.create');
})->name('blogs.create');
Route::get(('auth/login'), function(){
    return view('auth.login');
})->name('login');

