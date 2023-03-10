<?php

use Illuminate\Support\Facades\Route;


Route::get('test', function () {
    return 'hy';
});
// Route::get('/', fn () => view('layouts.app-layout'))->name('login');
// Route::view('/{any}', 'layouts.app-layout')->where('any', '.*');
Route::view('login', 'auth.login')->name('login.index');
Route::view('register', 'auth.register')->name('login.register');
Route::group([
//    'middleware' => ['jwt.verify']
], function ($header) {
    Route::view('home', 'home.dashboard')->name('home.home');
    Route::view('accounts', 'home/accounts')->name('home.accounts');
    Route::view('profile', 'home/profile',)->name('home.profile');
    Route::view('show-user/{id}', 'home/show-user')->name('home.show-user');
    Route::view('users', 'home/users')->name('home.show-users');
});
