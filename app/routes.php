<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::any('api/gpio/{gpio}/on', [
    'as' => 'api.gpio.on',
    'uses' => 'ApiController@gpioOn'
])->where('gpio', '[0-9]+');

Route::any('api/gpio/{gpio}/off', [
    'as' => 'api.gpio.off',
    'uses' => 'ApiController@gpioOff'
]);

Route::any('api/gpio/states', [
    'as' => 'api.gpio.states',
    'uses' => 'ApiController@gpioStates'
]);