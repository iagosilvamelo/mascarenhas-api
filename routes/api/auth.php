<?php


$router->group(['prefix' => 'Auth'], function($router) {

    $router->post('/Login',  "AuthController@login");
	$router->post('/Logof',  "AuthController@logof");

});
