<?php

/**
* Rotas para tabela Users
*
* @uses EventoController
*/
$router->group(['prefix' => 'Evento'], function($router) {

    $router->get('/',     "EventoController@index");
    $router->get('/{id}', "EventoController@show");

    $router->post('/',       "EventoController@create");
    $router->put('/{id}',    "EventoController@edit");
    $router->delete('/{id}', "EventoController@destroy");

});