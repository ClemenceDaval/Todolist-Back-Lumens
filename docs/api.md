<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get(
    '/',
    [
        'uses' => 'MainController@home', // nomdDuController@@NomDeLaMethode
        'as'   => 'main-home' // nom de la route
    ]
);


$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list', // nomdDuController@@NomDeLaMethode
        'as'   => 'category-list' // nom de la route
    ]
);

$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item', // nomdDuController@@NomDeLaMethode
        'as'   => 'category-item' // nom de la route
    ]
);


