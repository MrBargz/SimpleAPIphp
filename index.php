<?php
$uriData=explode("/",$_SERVER["REQUEST_URI"]);
require 'Controller/Route.php';
use controller\route\Route;

$app = Route::getInstance($uriData[1],$uriData[2],"");
$app->run();
