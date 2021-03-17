<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    // Routes
    $api->group(['namespace' => 'App\Http\Controllers'], function ($api) {
        $api->post('login', [
            'uses' => 'LoginController@login',
        ]);
        // Routes within this version group will require authentication.
        $api->group(['middleware' => ['jwt.auth'], 'prefix' => 'projects'], function ($api) {
            $api->get('', [
                'uses' => 'ProjectController@index',
            ]);
            $api->get('{id}', [
                'uses' => 'ProjectController@show',
            ]);
            $api->post('', [
                'uses' => 'ProjectController@store',
            ]);
            $api->put('{id}', [
                'uses' => 'ProjectController@update',
            ]);
            $api->delete('{id}', [
                'uses' => 'ProjectController@destroy',
            ]);
        });
    });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
