<?php
require __DIR__.'/DB.php';

class Proyecto{   

    private $pdo;
    private $data;
    private $request;
    private static $instance = null;   
    
    private function __construct(){     
        $this->pdo=Database::getInstance();
    }
    
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    function obtenerProyectosDB(){
        $this->data = $this->pdo->prepare('call get_proyectos()');
        $this->data->execute();
        $this->request = $this->data->fetchAll(PDO::FETCH_ASSOC);
        return $this->request;
    }
}
?>
