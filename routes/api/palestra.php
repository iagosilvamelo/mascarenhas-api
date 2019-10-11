<?php

/**
* Rotas para tabela Users
*
* @uses PalestraController
*/
$router->group(['prefix' => 'Palestra'], function($router) {

    $router->get('/',     "PalestraController@index");
    $router->get('/{id}', "PalestraController@show");

    $router->post('/',       "PalestraController@create");
    $router->put('/{id}',    "PalestraController@edit");
    $router->delete('/{id}', "PalestraController@destroy");

});