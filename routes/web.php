<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/Login',  "AuthController@login");
$router->post('/Logof',  "AuthController@logof");

$router->group(['prefix' => 'api'], function($router) {

    require __DIR__.'/api/users.php';

});