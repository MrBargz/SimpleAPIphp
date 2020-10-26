<?php
namespace model\proyecto{
    use PDO;
    use model\database\Database;
    class Proyecto{
        private static $data;
        private static $pdo;
        private static $request;
        private static $instance = null;

        private function __construct(){
            self::$pdo=Database::getInstance();
        }

        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new self();
            }
            return self::$instance;
        }

        function obtenerProyectosDB(){
            self::$data = self::$pdo->prepare('call get_proyectos()');
            self::$data->execute();
            self::$request = self::$data->fetchAll(PDO::FETCH_ASSOC);
            return  self::$request;
        }
    }
}
