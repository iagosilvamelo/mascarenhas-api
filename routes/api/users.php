<?php

/**
* Rotas para tabela Users
*
* @uses UsersController
*/
$router->group(['prefix' => 'User'], function($router) {

    $router->get('/',     "UsersController@index");
    $router->get('/{id}', "UsersController@show");

    $router->post('/',       "UsersController@create");
    $router->put('/{id}',    "UsersController@edit");
    $router->delete('/{id}', "UsersController@destroy");

    // $router->post('/Login',  "AuthController@login");
    // $router->post('/Logof',  "AuthController@logof");

});