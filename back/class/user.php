<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.7 - Aug, 2022.
*/


/* All User Methods */
class User
{

    function Connect($dbname, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $usuario, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            global $msg;
            $msg = $erro->getMessage();
        }
    }

    function register($name, $username, $email, $pass, $num, $cep, $cpf, $born, $sex)
    {
        global $pdo;
        $passMD5 = MD5($pass);

        $sql = $pdo->prepare("SELECT Dev_id FROM developers WHERE Dev_cpf = $cpf");
        $sql->execute();

        try {
            if ($sql->rowCount() > 0) {
                /* Dev exist */
                return false;
            } else {
                $sql = $pdo->prepare("INSERT INTO `developers`( `Dev_name`, `Dev_username`, `Dev_email`, `Dev_pass`, `Dev_Num`, `Dev_cep`, `Dev_cpf`, `Dev_born`, `Dev_sex`) VALUES ($name,$username,$email,$passMD5,$num,$cep,$cpf,$born,$sex)");
                $sql->execute();
                echo "<script>alert('funcionou')</script>";
                return true;
            }
        } catch (Exception $e) {
            echo "<script>alert('Ocorreu um erro. Cod.: $e')</script>";
        }
    }

    public function login($email, $username, $pass)
    {
        global $pdo;
        $passMD5 = MD5($pass);
        /* Verify Register */
        $sql = $pdo->prepare("SELECT Dev_id FROM developers WHERE Dev_email = '$email' || Dev_username = '$username' AND Dev_pass = '$passMD5'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            /* Register == True */
            $data = $sql->fetch();
            session_start();
            $_SESSION['ID'] = $data[MD5($email)];
            return true;
        } else {
            /* Not Register */
            return false;
        }
    }
}
