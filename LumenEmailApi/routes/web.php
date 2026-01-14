<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Grupo de rutas para los emails
$router->group(['prefix' => 'emails'], function () use ($router) {
    $router->get('/', 'EmailController@index');    // Ver historial
    $router->post('/', 'EmailController@send');    // Enviar correo
});