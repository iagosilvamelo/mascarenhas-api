<?php

/**
* Rotas para tabela Users
*
* @uses PalestranteController
*/
$router->group(['prefix' => 'Palestrante'], function($router) {

    $router->get('/',     "PalestranteController@index");
    $router->get('/{id}', "PalestranteController@show");

    $router->post('/',       "PalestranteController@create");
    $router->put('/{id}',    "PalestranteController@edit");
    $router->delete('/{id}', "PalestranteController@destroy");

});