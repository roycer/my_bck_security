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

$router->group(['prefix' => 'api/v1/'], function ($router) {

    /**
     * Routes for resource auth
     */
    $router->post('login','AuthsController@authenticate');
    $router->post('valid','AuthsController@valid');

    /**
     * Routes for resource weights
     */
    $router->get('comx510', 'WeightsController@all');
//    $router->get('weights/{id}', 'WeightsController@get');
    $router->post('weights', 'WeightsController@add');
//    $router->put('weights/{id}', 'WeightsController@put');
//    $router->put('weights/{id}', 'WeightsController@put');
    $router->delete('weights/{id}', 'WeightsController@remove');

});





