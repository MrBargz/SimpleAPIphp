<?php

namespace controller\route{
    use controller\proyecto\ProyectoController;
    class Route{
        private static $instance = null;
        private $path = null;
        private $data = null;
        private $arg = null;
        private function __construct($path,$arg,$data){
            $this->path=$path;
            $this->data=$data;
            $this->arg=$arg;
        }
        public static function getInstance($path,$arg,$data){
            if(self::$instance == null){
                self::$instance = new self($path,$arg,$data);
            }
            return self::$instance;
        }

        public function run(){


            print "path: ".$this->path."</br>";
            print "arg: ".$this->arg;
            header("HTTP/1.1 200 OK");
            return null;
        }
    }
}