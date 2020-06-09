<?php

use App\Handlers\CustomExceptionHandler;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::group(['exceptionHandler' => CustomExceptionHandler::class], function () {
    SimpleRouter::get('/', function () {
        return response()->json([
            'message' => 'Welcome to PHP Rest API visit api/users'
        ]);
    });

    SimpleRouter::group(['prefix' => 'api'], function () {
        SimpleRouter::resource('/users', 'UserController');
    });
});

SimpleRouter::start();