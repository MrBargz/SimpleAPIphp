<?php
$uriData=explode("/",$_SERVER["REQUEST_URI"]);
    switch ($uriData[1]) {
        case 'Proyecto':
            require __DIR__ . '/Controller/ProyectoController.php';
          break;
          
          default:
            header("HTTP/1.1 404 Not Found");
          break;    
    
}