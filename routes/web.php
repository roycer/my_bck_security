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

    $router->get('modules','UsersController@modules');
    $router->put('password','UsersController@password');

    /**
     * Modules
     */
    $router->get('modules-security', 'ModulesController@all');
    $router->get('modules-security/{id}', 'ModulesController@get');
    $router->post('modules-security', 'ModulesController@add');
    $router->put('modules-security/{id}', 'ModulesController@put');
    $router->delete('modules-security/{id}', 'ModulesController@remove');

    /**
     * Groups
     */
    $router->get('groups', 'GroupsController@all');
    $router->get('groups/{id}', 'GroupsController@get');
    $router->post('groups', 'GroupsController@add');
    $router->put('groups/{id}', 'GroupsController@put');
    $router->delete('groups/{id}', 'GroupsController@remove');

    /**
     * Users
     */
    $router->get('users', 'UsersController@all');
    $router->get('users/{id}', 'UsersController@get');
    $router->post('users', 'UsersController@add');
    $router->put('users/{id}', 'UsersController@put');
    $router->delete('users/{id}', 'UsersController@remove');

    /**
     * UserGroups
     */
    $router->get('user-groups', 'UserGroupsController@all');
    $router->get('user-groups/{id}', 'UserGroupsController@get');
    $router->post('user-groups', 'UserGroupsController@add');
    $router->put('user-groups/{id}', 'UserGroupsController@put');
    $router->delete('user-groups/{id}', 'UserGroupsController@remove');
});





