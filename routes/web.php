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
Route::get('page/{page}', 'PagesController@read')->name('page');
Route::get('news/{news}', 'NewsController@read')->name('news');

//guild
Route::get('/guild/{guild}/emblem', 'EmblemController@get_emblem')->name('guild.emblem');

//ucp
Route::prefix('ucp')->middleware('auth')->group(function (){
    Route::get('dashboard', 'UCPController@user_index')->name('user.dashboard');
    Route::get('changepassword', 'UCPController@user_changepassword')->name('user.changepassword');
    Route::match(['put','patch'], 'update/{user}', 'UserController@update_credential')->name('user.update');
    Route::get('changemail', 'UCPController@user_changemail')->name('user.changemail');
});

//manage
Route::prefix('manage')->middleware('gm')->name('manage.')->group(function (){
    Route::get('guide', 'UCPController@gm_guide')->name('guide');
    Route::get('dashboard', 'UCPController@gm_index')->name('dashboard');
    Route::get('news', 'UCPController@gm_news')->name('news');
    Route::get('site', 'UCPController@gm_sites')->name('site');
    Route::get('page', 'UCPController@gm_pages')->name('page');
    Route::resource('woe', 'WOEController');
    Route::post('woe/truncate', 'WOEController@truncate')->name('woe.truncate');
});