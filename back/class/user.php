<?php 

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.4 - Aug, 2022.
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
    public function getId() {
        return $this->Dev_ID;
    }
    public function setId($id) {
        $this->Dev_ID = $id;
    }

    public function getName() {
        return $this->Dev_name;
    }
    public function setName($name) {
        $this->Dev_name = $iid;
    }

    public function getLastN() {
        return $this->Dev_lastN;
    }
    public function setLastN($lastN) {
        $this->Dev_name = $lastN;
    }
    


    function salvar() {
        try {
            $this-> conn = new Connect();
            $sql = $this->conn->prepare("insert into produto values (NULL,?,?)");
            @$sql-> bindParam(1,$this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2,$this->getEstoque(), PDO::PARAM_STR);

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