<?php 

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.4 - Aug, 2022.
*/

class Connect extends PDO {

        private static $instancia;
        private $query;
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $db = "search-devs_base";
        

        public function __construct() {
            parent::__construct("mysql:host=$this->host;dbname=$this->db", "$this->usuario","$this->senha" );
        }

        public static function getInstance() {
            if(!isset(self::$instancia)) {
                try {
                    self::$instancia = new Conectar;
                    echo 'Conectado com sucesso!';
                }
                catch(Exception $e) {
                    echo 'Erro ao conectar';
                    exit();
                }
            }

            return self::$instancia;
        }

        public function sql($query) {

            $this->getInstance();
            $this->query = $query;
            $stmt = $this->pdo->prepare($this->query);
            $stmt->execute();
            $this->pdo = null;
      }

}

?>