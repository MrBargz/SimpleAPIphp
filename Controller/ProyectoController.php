<?php
namespace controller\proyecto{
  use  model\proyecto\Proyecto;
  class ProyectoController{   

    private static $response;
    private static $proyecto;
    private static $instance = null;

      private function __construct(){
          self::$proyecto = Proyecto::getInstance();
    }

    public static function getInstance(){
      if(self::$instance == null){
          self::$instance = new self();
      }
      return self::$instance;
    }

    public function get($request){
      if (isset($request[2])){
          self::$response=array(
          "mensaje" => "funcion 'get by ID' no definida",
          "URIData" => $request
        );
      }else{
          self::$response =   self::$proyecto->obtenerProyectosDB();
      }
      return json_encode(self::$response, JSON_PRETTY_PRINT);
    }
  }
}