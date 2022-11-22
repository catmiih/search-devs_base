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
                header('Location: ../user/select-fields.php');
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

    function excludeArea($id, $area)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Dev_name FROM developers WHERE Dev_ID = '$id'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $verify = $pdo->prepare("SELECT Area_ID FROM area_dev WHERE Dev_ID = '$id' AND Area_ID = '$area'");
            $verify->execute();

            if ($verify->rowCount() > 0) {
                $newArea = $pdo->prepare("DELETE FROM `area_dev` WHERE Dev_ID = '$id' AND Area_ID = '$area'");
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

        $verify = $pdo->prepare("SELECT * FROM `skills_dev` where Dev_ID = '$devID' and Skill_ID = '$skillID[0]'");
        $verify->execute();

        if ($verify->rowCount() > 1) {
            $deleteRow = "DELETE FROM skills_dev WHERE Skill_ID in (select Skill_ID from (SELECT *,ROW_NUMBER() OVER (PARTITION BY Dev_ID ORDER BY (Skill_ID) ) as posicao FROM skills_dev) skills_dev where Dev_ID = '$devID' and Skill_ID = '$skillID[0]' and posicao > 2)";

            $delete = $pdo->prepare($deleteRow);
            $delete->execute();
        } else {
            $sql = $pdo->prepare("SELECT Skill_ID FROM `skills_dev` where Dev_ID = '$devID' and Skill_ID = '$skillID[0]'");
            $sql->execute();

            if ($sql->rowCount() <= 0) {
                $reg = $pdo->prepare("INSERT INTO `skills_dev`(`Dev_ID`, `Skill_ID`, `Skill_level`) VALUES ('$devID','$skillID[0]','$level')");
                $reg->execute();
            }
        }
    }

    function deleteskill($skillID, $devID)
    {
        global $pdo;

        $sql = $pdo->prepare("DELETE FROM `skills_dev` where Dev_ID = '$devID' and Skill_ID = '$skillID[0]'");
        $sql->execute();

        header('Location: ../../front/user/skills.php');
    }

    function getUser($id)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM `developers` where Dev_ID = '$id'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $all = $sql->fetch();

            return $all;
        }
    }

    function getUserSkills($userId)
    {

        global $pdo;

        if ($pdo->prepare("SELECT Skill_ID from skills where Skill_name like ''")) {
            $sql = $pdo->prepare("SELECT * from skills_dev where Dev_ID = '$userId' and Skill_ID != (SELECT Skill_ID from skills where Skill_name like '')");
            $sql->execute();
        } else {
            $sql = $pdo->prepare("SELECT * from skills_dev where Dev_ID = '$userId'");
            $sql->execute();
        }

        if ($sql->rowCount() > 0) {
            $skills[] = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $skills;
        }
    }

    function getNameSkills($skillId)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Skill_name from skills where Skill_ID = '$skillId'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $skills = $sql->fetch();

            return $skills;
        }
    }

    function getAreaSkills($skillId)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Skill_area from skills where Skill_ID = '$skillId'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $area = $sql->fetch();

            $exec = $pdo->prepare("SELECT Area_name from area where Area_ID = '$area[0]'");
            $exec->execute();

            if ($exec->rowCount() > 0) {
                $area[] = $exec->fetch();
                return $area;
            }
        }
    }

    function getAreaID($userID, $areaID)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Area_ID from area_dev where Dev_ID = '$userID' and Area_ID = '$areaID'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $area = $sql->fetch();
            return $area;
        } else
            $area = [null];
        return $area;
    }

    function saveFile($userID, $type) {
        global $pdo;

        $path = 'uploads/'.$userID.'/'.$userID.'_'.$type.'.jpg';

        $sql = $pdo->prepare("SELECT file_id from files where user_id = '$userID' and `path` like '$path'");
        $sql->execute();

        if($sql->rowCount() == 0){
            $file = 'uploads/'.$userID.'/'.$userID.'_'.$type.'.jpg';

            $insert = $pdo->prepare("INSERT INTO `files`(`path`, `user_id`) VALUES ('$file','$userID')");
            $insert->execute();
        }
    }

    function findImage($userID, $type){
        
        global $pdo;
        $path = 'uploads/'.$userID.'/'.$userID.'_'.$type.'.jpg';

        $sql = $pdo->prepare("SELECT path from files where user_id = '$userID' and `path` like '$path'");
        $sql->execute();

        if($sql->rowCount() > 0){
            $img = $sql->fetch();

            return $img;
        }
        else {
            $img[] = 'uploads/default_'.$type.'.jpg';
            return $img;
        }
    }

    function searchUser($search) {
        global $pdo;

        $sql = $pdo->prepare("SELECT `Dev_ID` FROM `developers` WHERE Dev_name like '%$search%';");
        $sql->execute();

        if($sql->rowCount() > 0){
            $result[] = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
    }
}
