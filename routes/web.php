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
        'uses' => 'CategoryController@item', // nomdDuController@NomDeLaMethode
        'as'   => 'category-item' // nom de la route
    ]
);


$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list', // nomdDuController@NomDeLaMethode
        'as'   => 'task-list' // nom de la route
    ]
);


$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@add', // nomdDuController@NomDeLaMethode
        'as'   => 'task-add' // nom de la route
    ]
);



$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update', // nomdDuController@NomDeLaMethode
        'as'   => 'task-update' // nom de la route
    ]
);

$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update', // nomdDuController@NomDeLaMethode
        'as'   => 'task-patch' // nom de la route
    ]
);

$router->delete(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@delete', // nomdDuController@NomDeLaMethode
        'as'   => 'task-delete' // nom de la route
    ]
);
