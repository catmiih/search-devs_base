<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
*/


/* All User Methods */

class User
{

    private $pdo;
    public $msg = "";

    public function conectar($dbname, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $usuario, $senha);
        } catch (PDOException $erro) {
            global $msg;
            $msg = $erro->getMessage();
        }
    }

    function register($name, $username, $email, $pass, $num, $cep, $cpf, $born, $sex)
    {
        global $pdo;
        $passMD5 = MD5($pass);

        $sql = $pdo->prepare("SELECT Dev_ID FROM developers WHERE Dev_email like '$email' or Dev_username like '$username'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            /* Dev exist */
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO `developers`(`Dev_name`, `Dev_username`, `Dev_email`, `Dev_pass`, `Dev_Num`, `Dev_cep`, `Dev_cpf`, `Dev_born`, `Dev_sex`) VALUES ('$name','$username','$email','$passMD5','$num','$cep','$cpf','$born','$sex');");
            $sql->execute();

            return true;
        }
    }

    function login($username, $pass)
    {
        global $pdo;
        $passMD5 = MD5($pass);
        /* Verify Register */
        $sql = $pdo->prepare("SELECT Dev_ID FROM developers WHERE Dev_username = '$username' AND Dev_pass like '$passMD5'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            /* Register == True */
            $data = $sql->fetch();
            
            $id_u = $_SESSION["id_user"]=$data[0];
            $name = $_SESSION["username"]=$username;

            if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
                session_start();
            }

            $id = $pdo->prepare("SELECT Dev_ID FROM skills_dev where Dev_ID = '$data[0]'");
            $id->execute();

            if ($id->rowCount() <= 0) {
                $id_u = $id->fetch();
                header('Location: ../user/select-fields.php?id=' . $id_u);
            } else
                header('Location: ../user/dashboard.php?u=' . $username);


            return true;
        } else {
            /* Not Register */
            header('Location: ../login.php');
            return false;
        }
    }
}
