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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($app) {

    $app->get('users', 'UserController@viewAll');
    $app->get('user/{userID}', 'UserController@view');
    $app->post('user', 'UserController@create');
    $app->put('user/{userID}', 'UserController@update');
    $app->delete('user/{userID}', 'UserController@delete');
});