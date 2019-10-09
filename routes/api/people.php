<?php

/**
* Rotas para tabela Users
*
* @uses PeopleController
*/
$router->group(['prefix' => 'People'], function($router) {

    $router->get('/',     "PeopleController@index");
    $router->get('/{id}', "PeopleController@show");

    $router->post('/',       "PeopleController@create");
    $router->put('/{id}',    "PeopleController@edit");
    $router->delete('/{id}', "PeopleController@destroy");

});