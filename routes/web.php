<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\UserController;
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

$router->get('/swagger', function () {
    return file_get_contents(app()->basePath('public/swagger.php'));
});


$router->post('/register', 'UserController@register');
$router->post('/login','UserController@login');
