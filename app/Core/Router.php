<?php


namespace App\Core;


use App\Handlers\CustomExceptionHandler;
use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter
{

    public function __construct() {

        require_once INC_ROOT .'/config/helpers.php';

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

        // change default namespace for all routes
        parent::setDefaultNamespace('\App\Controllers');

        // Do initial stuff
        parent::start();

    }
}