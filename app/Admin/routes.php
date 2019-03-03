<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->get('users', 'UsersController@index');
    $router->get('users/{id}/edit', 'UsersController@edit');
    $router->put('users/{id}', 'UsersController@update');
    $router->get('posts', 'PostsController@index');
    $router->get('posts/create', 'PostsController@create');
    $router->post('posts', 'PostsController@store');
    $router->get('posts/{id}/edit', 'PostsController@edit');
    $router->put('posts/{id}', 'PostsController@update');
    $router->get('replies', 'RepliesController@index');
    $router->get('links', 'LinksController@index');
    $router->get('links/create', 'LinksController@create');
    $router->post('links', 'LinksController@store');
    $router->get('links/{id}/edit', 'LinksController@edit');
    $router->put('links/{id}', 'LinksController@update');
});
