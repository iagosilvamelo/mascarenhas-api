<?php

/**
* Rotas para tabela Users
*
* @uses InscricaoController
*/
$router->group(['prefix' => 'Inscricao'], function($router) {

    $router->get('/',     "InscricaoController@index");
    $router->get('/{id}', "InscricaoController@show");

    $router->post('/',       "InscricaoController@create");
    $router->put('/{id}',    "InscricaoController@edit");
    $router->delete('/{id}', "InscricaoController@destroy");

});