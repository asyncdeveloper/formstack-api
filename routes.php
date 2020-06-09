<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::group(['prefix' => '/api', 'exceptionHandler' => \App\Handlers\CustomExceptionHandler::class ], function () {
    SimpleRouter::resource('/users', 'UserController');
});

SimpleRouter::start();