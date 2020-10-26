<?php
$uriData = explode("/",$_SERVER["REQUEST_URI"]);
$http =  $_SERVER['REQUEST_METHOD'];
require __DIR__ . '/Controller/App.php';
use controller\route\App;
$app = App::getInstance($uriData,$http);
$app->run();
