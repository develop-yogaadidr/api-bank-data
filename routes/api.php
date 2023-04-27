<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ExampleController;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function ($router) {
    $router->group(['prefix' => 'pasien'], function ($user){
        $user->get('/', 'PasienController@getAll');
        $user->get('/{nik}', 'PasienController@getByNik');
        $user->post('/', 'PasienController@create');
        $user->post('/{nik}', 'PasienController@updateByNik');
        $user->delete('/{nik}', 'PasienController@deleteByNik');
    });
});
