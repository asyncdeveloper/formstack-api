<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::group(['prefix' => '/api'], function () {
    SimpleRouter::resource('/users', 'UserController');
});

SimpleRouter::start();