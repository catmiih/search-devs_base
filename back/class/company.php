<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
*/


/* All Company Methods */

class Company
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

    function register($name, $email, $pass, $cnpj, $num, $user, $responsible, $cpf, $date)
    {
        global $pdo;
        $passMD5 = MD5($pass);

        $sql = $pdo->prepare("SELECT Comp_ID FROM company WHERE Comp_email like '$email' or Comp_user like '$user'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            /* Dev exist */
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO `company`(`Comp_name`, `Comp_email`, `Comp_pass`, `Comp_cnpj`, `Comp_num`, `Comp_user`, `Comp_responsible`, `Comp_cpf`, `Comp_date`) VALUES ('$name', '$email', '$passMD5', '$cnpj', '$num', '$user', '$responsible', '$cpf','$date')");
            $sql->execute();

            return true;
        }
    }

    function login($username, $pass)
    {
        global $pdo;
        $passMD5 = MD5($pass);
        /* Verify Register */
        $sql = $pdo->prepare("SELECT Comp_ID FROM company WHERE Comp_user = '$username' AND Comp_pass like '$passMD5'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            /* Register == True */
            $data = $sql->fetch();

            if (!isset($_SESSION)) {
                session_start();

                $_SESSION["id_user"] = $data[0];
                $_SESSION["username"] = $username;
            }

            //header('Location: ../company/dashboard.php');
            return true;
        } else {
            /* Not Register */
            //header('Location: ../login.php');

            echo 'sem login';
            return false;
        }
    }
}
