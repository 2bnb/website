<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// until the front end exists these are useful for testing
// TODO: remove after testing
Route::resources([
    'users' => 'API\UserController',
    'roles' => 'Auth\RoleController',
    'permissions' => 'Auth\PermissionController',
]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('login/discord', 'Auth\LoginController@redirectToProvider');
Route::get('login/discord/callback', 'Auth\LoginController@handleProviderCallback');
