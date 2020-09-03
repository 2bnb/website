<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->prefix('api')->group(function() {
		Route::apiResources([
		'users' => 'API\UserController',
		'bots' => 'API\BotController',
		'roles' => 'Auth\RoleController',
		'permissions' => 'Auth\PermissionController',
	]);
});
