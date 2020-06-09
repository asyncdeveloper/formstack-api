<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Origin,Access-Control-Allow-Methods, Authrorization, X_Requested-With');
header("Content-Type: application/json; charset=UTF-8");

define('INC_ROOT', dirname(__DIR__));

//Include all dependencies of our application
require_once INC_ROOT .'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(INC_ROOT);
$dotenv->load();

new App\Core\Database();

require_once 'helpers.php';

/* Load external routes file */
require_once 'routes.php';