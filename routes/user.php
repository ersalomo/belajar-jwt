<?php

use Illuminate\Support\Facades\Route;


Route::view('login', 'auth.login')->name('login.index');
Route::view('register', 'auth.register')->name('login.register');
Route::view('home', 'home/home')->name('login.home');
Route::view('accounts', 'home/accounts')->name('home.accounts');
