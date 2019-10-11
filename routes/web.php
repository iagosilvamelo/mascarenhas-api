<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function($router) {

    require __DIR__.'/api/auth.php';
    require __DIR__.'/api/users.php';
    require __DIR__.'/api/people.php';
    require __DIR__.'/api/evento.php';
    require __DIR__.'/api/palestra.php';
    require __DIR__.'/api/palestrante.php';

});