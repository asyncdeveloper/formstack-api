<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Origin,Access-Control-Allow-Methods, Authrorization, X_Requested-With');
header("Content-Type: application/json; charset=UTF-8");

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

new App\Core\Database();