<?php
require __DIR__.'/../Model/ProyectoModel.php';
$proyecto = Proyecto::getInstance();
$http = $_SERVER['REQUEST_METHOD'];

switch ($http) {

  case 'GET':
    if (isset($uriData[2])){
      $request=array(
        "mensaje" => "funcion 'by ID' no definida",
        "URIData" => $uriData
      );
    }else{
      $request = $proyecto->obtenerProyectosDB(); 
    }
    header("HTTP/1.1 200 OK");
    echo json_encode($request, JSON_PRETTY_PRINT);
  break;

  default:
    header("HTTP/1.1 404 Not Found");
  break;
}
?>