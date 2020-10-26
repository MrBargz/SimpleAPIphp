<?php

namespace controller\route{
    require __DIR__.'/ProyectoController.php';
    use controller\proyecto\ProyectoController;
    use model\proyecto\Proyecto;

    class App{
        private static $instance = null;
        private $uri;
        private $obj;
        private $http;

        private function __construct($uri,$http){
            $this->uri=$uri;
            $this->obj=$this->findObj($uri[1]);
            $this->http = $http;
        }
        public static function getInstance($uri,$http){
            if(self::$instance == null){
                self::$instance = new self($uri,$http);
            }
            return self::$instance;
        }

        public function run(){
            if(!isset($this->obj)){
                header("HTTP/1.1 404 Not Found");
            }else{
                echo json_encode($this->execMethod($this->http),JSON_PRETTY_PRINT);
                header("HTTP/1.1 200 OK");
            }
            return null;
        }

        private function findObj($obj){
            $base=[
                "Proyecto" => Proyecto::getInstance()
            ];
            if (array_key_exists($obj, $base)) {
                return $base[$obj];
            }
            else{
                return null;
            }
        }

        private function execMethod($http){
            $base=[
                "GET" => $this->obj->get()
            ];
            return $base[$http];
        }
    }
}