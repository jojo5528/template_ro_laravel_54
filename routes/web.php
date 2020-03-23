<?php

//auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//page
Route::get('/', 'RouteController@index')->name('home');
Route::get('home', function () {
    return redirect()->route('home');
});
Route::prefix('page')->name('page.')->group(function () {
    Route::get('download', 'RouteController@download')->name('download');
    Route::get('information', 'RouteController@info')->name('info');
    Route::get('donate', 'RouteController@donate')->name('donate');
    Route::get('vote', 'RouteController@vote')->name('vote');
    Route::get('share', 'RouteController@share')->name('share');
});