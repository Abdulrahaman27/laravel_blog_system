<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('blogs.index');
})->name('blogs.index');
Route::get('blogs/create', function(){
    return view('blogs.create');
})->name('blogs.create');
Route::get('blogs/edit', function(){
    return view('blogs.edit');
})->name('blogs.edit');
Route::get('auth/login', function(){
    return view('auth.login');
})->name('login');
Route::get('auth/register', function(){
    return view('auth.register');
})->name('register');
Route::delete('blogs/delete', function(){
    return redirect()->route('blogs.index');
})->name('blogs.destroy');