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

            if (!isset($_SESSION)) {
                session_start();

                $_SESSION["id_user"] = $data[0];
                $_SESSION["username"] = $username;
            }

            $id = $pdo->prepare("SELECT Dev_ID FROM skills_dev where Dev_ID = '$data[0]'");
            $id->execute();

            if ($id->rowCount() <= 0) {
                header('Location: ../user/select-fields.php?id=' . MD5($data[0]));
            } else
                header('Location: ../user/dashboard.php?u=' . $username);


            return true;
        } else {
            /* Not Register */
            header('Location: ../login.php');
            return false;
        }
    }

    function registerArea($id, $area)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Dev_name FROM developers WHERE Dev_ID = '$id'");
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $verify = $pdo->prepare("SELECT Area_ID FROM area_dev WHERE Dev_ID = '$id' AND Area_ID = '$area'");
            $verify->execute();

            if ($verify->rowCount() == 0) {
                $newArea = $pdo->prepare("INSERT INTO `area_dev`(`Area_ID`, `Dev_ID`) VALUES ('$area','$id')");
                $newArea->execute();
            }

            return true;
        } else {
            return false;
        }
    }

    function registerSkill($skill, $area)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Area_ID FROM `area` where Area_name like '$area'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $areaID = $sql->fetch();

            $reg = $pdo->prepare("INSERT INTO `skills`(`Skill_name`, `Skill_area`) VALUES ('$skill','$areaID[0]')");
            $reg->execute();
        }
    }

    function skillDev($devID, $skillID, $level)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Skill_ID FROM `skills_dev` where Dev_ID = '$devID'");
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $reg = $pdo->prepare("INSERT INTO `skills_dev`(`Dev_ID`, `Skill_ID`, `Skill_level`) VALUES ('$devID','$skillID[0]','$level')");
            $reg->execute();

            header('Location: ../user/dashboard.php');
        } else {}
    }

    function getUser($username) {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM `developers` where Dev_username like '$username'");
        $sql->execute();

        if($sql->rowCount() > 0) {
            $all = $sql->fetch();

            return $all;
        }
    }
}
