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

// categories ----------------------------------------------------------------
$router->get(
    '/',
    [
        'uses' => 'MainController@home', //nomDuController@nomDeLaMethode
        'as'   => 'main-home' // nom de la route
    ]
);

$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list', //nomDuController@nomDeLaMethode
        'as'   => 'category-list' // nom de la route
    ]
);

$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item', //nomDuController@nomDeLaMethode
        'as'   => 'category-item' // nom de la route
    ]
);

// tasks ----------------------------------------------------------------------
$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list', //nomDuController@nomDeLaMethode
        'as'   => 'task-list' // nom de la route
    ]
);

$router->get(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@item', //nomDuController@nomDeLaMethode
        'as'   => 'task-item' // nom de la route
    ]
);

$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@create', //nomDuController@nomDeLaMethode
        'as'   => 'task-create' // nom de la route
    ]
);

$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@updatePut', //nomDuController@nomDeLaMethode
        'as'   => 'task-updatePut' // nom de la route
    ]
);

$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@updatePatch', //nomDuController@nomDeLaMethode
        'as'   => 'task-updatePatch' // nom de la route
    ]
);
