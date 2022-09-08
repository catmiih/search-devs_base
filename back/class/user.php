<?php 

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.5 - Aug, 2022.
*/

include_once '../connect.php';

/* Get Elements */
class User {
    private $id;
    private $name;
    private $lastN;
    private $email;
    private $pass;
    private $num;
    private $cep;
    private $cpf;
    private $born;
    private $sex;
    private $conn;


/* Getter and Setter */

    /* Get DEV ID */
    public function getId() {
        return $this->Dev_ID;
    }
    public function setId($id) {
        $this->Dev_ID = $id;
    }

    /* Get DEV Name */
    public function getName() {
        return $this->Dev_name;
    }
    public function setName($name) {
        $this->Dev_name = $name;
    }

    /* Get DEV Last Name */
    public function getLastN() {
        return $this->Dev_lastN;
    }
    public function setLastN($lastN) {
        $this->Dev_name = $lastN;
    }

    /* Get DEV Email */
    public function getEmail() {
        return $this->Dev_email;
    }
    public function setEmail($email) {
        $this->Dev_email = $email;
    }

    /* Get DEV Pass */
    public function getPass() {
        return $this->Dev_pass;
    }
    public function setPass($pass) {
        $this->Dev_pass = $pass;
    }

    /* Get DEV Tel-Number */
    public function getNum() {
        return $this->Dev_Num;
    }
    public function setNum($num) {
        $this->Dev_Num = $num;
    }

    /* Get DEV CEP */
    public function getCEP() {
        return $this->Dev_cep;
    }
    public function setCEP($cep) {
        $this->Dev_cep = $cep;
    }

    /* Get DEV CPF */
    public function getCPF() {
        return $this->Dev_cpf;
    }
    public function setCPF($cpf) {
        $this->Dev_cpf = $cpf;
    }

    /* Get DEV Born Date */
    public function getBorn() {
        return $this->Dev_born;
    }
    public function setBorn($born) {
        $this->Dev_born = $born;
    }

    /* Get DEV Sex */
    public function getSex() {
        return $this->Dev_sex;
    }
    public function setSex($sex) {
        $this->Dev_sex = $sex;
    }
    


    function register($login,$senha) {
        global $pdo;

        try {
            $this-> conn = new Connect();
            $sql = $pdo -> prepare("SELECT $id FROM developers WHERE login = $login");
            $sql-< 
            if($sql->execute() == 1) {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc) {
            echo"Erro ao salvar registro.".$exc->getMessage();
        }
    }

    function alterar() {
        try {

            $this->conn= new Conectar();
            $sql = $this->conn->prepare("select * from produto where id = ?");
            @$sql -> bindParam(1, $this->getId(), PDO::PARAM_STR);
            $sql->execute();

            return $sql->fetchAll();
            $this->conn=null;

        }catch(PDOException $exc) {
            echo "Erro ao alterar".$exc->getMessage();
        }
    }

    function alterar2() {
        try {

            $this->conn= new Conectar();
            $sql = $this->conn->prepare("UPDATE produto SET nome = ?, estoque = ? WHERE id = ?");
            
            @$sql -> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql -> bindParam(2, $this->getEstoque(), PDO::PARAM_STR);
            @$sql -> bindParam(3, $this->getId(), PDO::PARAM_STR);

            if($sql->execute() == 1) {
                return "Registro alterado com sucesso!";
            }

            $this->conn=null;

        }catch(PDOException $exc) {
            echo "Erro ao salvar o registro.".$exc->getMessage();
        }
    }

    function consultar() {
        try {

            $this->conn= new Conectar();
            $sql = $this->conn->prepare("select * from produto where nome like ?");
            @$sql -> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            $sql->execute();

            return $sql->fetchAll();
            $this->conn=null;

        }catch(PDOException $exc) {
            echo "Erro ao consultar".$exc->getMessage();
        }
    }

    function excluir() {
        try {

            $this->conn= new Conectar();
            $sql = $this->conn->prepare("delete from produto where id = ?");
            @$sql -> bindParam(1, $this->getId(), PDO::PARAM_STR);
            
            if($sql->execute() == 1) {
                return "Excluido com sucesso!";
            }
            else {
                return "Erro na exclusão.";
            }

            $this->conn=null;

        }catch(PDOException $exc) {
            echo "Erro ao excluir".$exc->getMessage();
        }
    }

    function listar() {

        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from produto order by id");
            $sql->execute();

            return $sql->fetchAll();
            $this->conn=null;
        }catch (PDOException $exc) {
            echo "Erro ao executar consulta.".$exc->getMessage();
        }
    }

}
?>