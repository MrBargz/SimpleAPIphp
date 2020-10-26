<?php
namespace controller\proyecto{
  require __DIR__."/../Model/ProyectoModel.php";
  use  model\proyecto\Proyecto;
  class ProyectoController{

    private  $proyecto;
    private static $instance = null;

    private function __construct(){
          $this->proyecto = Proyecto::getInstance();
    }

    public static function getInstance(){
      if(self::$instance == null){
          self::$instance = new self();
      }
      return self::$instance;
    }

    public function get($request){
      if (isset($request[2])){
          $response =array(
          "mensaje" => "funcion 'get by ID' no definida",
          "URIData" => $request
        );
      }else{
          $response =  $this->proyecto->obtenerProyectosDB();
      }
      return json_encode($response, JSON_PRETTY_PRINT);
    }
  }
}