<?php
namespace model\proyecto{
    require __DIR__."/Database.php";
    use PDO;
    use model\database\Database;
    class Proyecto{
        private $pdo;
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

        function get(){
            $data = $this->pdo->prepare('call get_proyectos()');
            $data->execute();
            return $data->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
