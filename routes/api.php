<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/*
$app->post('/auth/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'api.auth.login']);

$app->group(['middleware' => 'jwt.auth','namespace' => 'App\Http\Controllers'
], function ($app) {
    $app->get('/', ['uses' => 'APIController@getIndex', 'as' => 'api.index']);
    $app->get('/auth/user', ['uses' => 'Auth\AuthController@getUser', 'as' => 'api.auth.user']);
    $app->patch('/auth/refresh', ['uses' => 'Auth\AuthController@patchRefresh', 'as' => 'api.auth.refresh']);
    $app->delete('/auth/invalidate', ['uses' => 'Auth\AuthController@deleteInvalidate', 'as' => 'api.auth.invalidate']);
});
*/

$app->get('/', function () use ($app) {
	return $app->version();
});

$app->group(['prefix' => 'api', 'namespace' => 'Api'], function() use ($app){
	$app->group(['prefix' => 'v1', 'namespace' => 'V1'], function() use ($app){
		$app->group(['prefix' => 'auth', 'namespace' => 'Auth'], function() use ($app){
			$app->post('/', ['uses' => 'AuthController@postLogin']);
		});
		$app->group(['prefix' => 'users', 'namespace' => 'User'], function() use ($app){
			$app->post('/', ['uses' => 'UserController@create']);
		});
		$app->group(['prefix' => 'districts', 'namespace' => 'District', 'middleware' => 'jwt.auth'], function() use ($app){
			$app->get('/', ['uses' => 'DistrictController@all']);
		});
		$app->group(['prefix' => 'animals', 'namespace' => 'Animal', 'middleware' => 'jwt.auth'], function() use ($app){
			$app->get('/', ['uses' => 'AnimalController@all']);
		});
		$app->group(['prefix' => 'races', 'namespace' => 'Race', 'middleware' => 'jwt.auth'], function() use ($app){
			$app->get('/', ['uses' => 'RaceController@all']);
		});
		$app->group(['prefix' => 'post_types', 'namespace' => 'PostType', 'middleware' => 'jwt.auth'], function() use ($app){
			$app->get('/', ['uses' => 'PostTypeController@all']);
		});
		$app->group(['prefix' => 'user_types', 'namespace' => 'UserType', 'middleware' => 'jwt.auth'], function() use ($app){
			$app->get('/', ['uses' => 'UserTypeController@all']);
		});
		$app->group(['prefix' => 'posts', 'namespace' => 'Post', 'middleware' => 'jwt.auth'], function() use ($app){
			$app->get('/', ['uses' => 'PostController@all']);
			$app->post('/', ['uses' => 'PostController@create']);
			$app->get('/me', ['uses' => 'PostController@getUserPosts']);
		});
	});
});

