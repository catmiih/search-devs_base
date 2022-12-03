<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
*/


/* All Project Methods */

class Project
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

    function deleteskill($skillID, $projID)
    {
        global $pdo;

        $sql = $pdo->prepare("DELETE FROM `skills_proj` where Proj_ID = '$projID' and Skill_ID = '$skillID[0]'");
        $sql->execute();

        header('Location: ../../front/company/skills.php');
    }

    function skillProj($projID, $skillID, $level)
    {
        global $pdo;

        $verify = $pdo->prepare("SELECT * FROM `skills_proj` where Proj_ID = '$projID' and Skill_ID = '$skillID[0]'");
        $verify->execute();

        if ($verify->rowCount() > 1) {
            $deleteRow = "DELETE FROM skills_proj WHERE Skill_ID in (select Skill_ID from (SELECT *,ROW_NUMBER() OVER (PARTITION BY Proj_ID ORDER BY (Skill_ID) ) as posicao FROM skills_proj) skills_proj where Proj_ID = '$projID' and Skill_ID = '$skillID[0]' and posicao > 2)";

            $delete = $pdo->prepare($deleteRow);
            $delete->execute();
        } else {
            $sql = $pdo->prepare("SELECT Skill_ID FROM `skills_proj` where Proj_ID = '$projID' and Skill_ID = '$skillID[0]'");
            $sql->execute();

            if ($sql->rowCount() <= 0) {
                $reg = $pdo->prepare("INSERT INTO `skills_proj`(`Proj_ID`, `Skill_ID`, `Skill_level`) VALUES ('$projID','$skillID[0]','$level')");
                $reg->execute();
            }
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

    function getProjID($compID)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Proj_ID from project where Proj_comp = $compID");
        $sql->execute();

        if ($sql->rowCount() == 0) {
            return 1;
        } else {
            $projId = $sql->fetch();

            $verify = $pdo->prepare("SELECT * from skills_proj where Proj_ID = '$projId[0]'");
            $verify->execute();

            if ($verify->rowCount() > 0) {
                return $projId[0] + 1;
            } else {
                return $projId[0];
            }
        }
    }

    function getProjSkills($projID)
    {
        global $pdo;

        if ($pdo->prepare("SELECT Skill_ID from skills where Skill_name like ''")) {
            $sql = $pdo->prepare("SELECT * from skills_proj where Proj_ID = '$projID' and Skill_ID != (SELECT Skill_ID from skills where Skill_name like '')");
            $sql->execute();
        }
        $sql = $pdo->prepare("SELECT * from skills_proj where Proj_ID = '$projID'");
        $sql->execute();


        if ($sql->rowCount() > 0) {
            $skills[] = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $skills;
        } else {
            $skills[] = [];
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

    function registerArea($id, $area)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Proj_name FROM project WHERE Proj_ID = '$id'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $verify = $pdo->prepare("SELECT Area_ID FROM area_project WHERE Proj_ID = '$id' AND Area_ID = '$area'");
            $verify->execute();

            if ($verify->rowCount() == 0) {
                $newArea = $pdo->prepare("INSERT INTO `area_project`(`Area_ID`, `Proj_ID`) VALUES ('$area','$id')");
                $newArea->execute();
            }
            return true;
        } else {
            echo "Não encontrei o $id e a area $area<br>";
            return false;
        }
    }

    function excludeArea($id, $area)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Proj_name FROM project WHERE Proj_ID = '$id'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $verify = $pdo->prepare("SELECT Area_ID FROM area_project WHERE Proj_ID = '$id' AND Area_ID = '$area'");
            $verify->execute();

            if ($verify->rowCount() > 0) {
                $newArea = $pdo->prepare("DELETE FROM `area_project` WHERE Proj_ID = '$id' AND Area_ID = '$area'");
                $newArea->execute();
            }

            return true;
        } else {
            return false;
        }
    }

    function getAreaID($projID, $areaID)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT Area_ID from area_project where Proj_ID = '$projID' and Area_ID = '$areaID'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $area = $sql->fetch();
            return $area;
        } else
            $area = [null];
        return $area;
    }

    function Create($name, $hours, $start, $end, $hPay, $pay, $comp, $desc)
    {
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO `project`(`Proj_name`, `Proj_time`, `Proj_start`, `Proj_end`, `Proj_hourPay`, `Proj_pay`, `Proj_comp`, `Proj_desc`) VALUES ('$name','$hours','$start','$end','$hPay','$pay','$comp','$desc');");

        $sql->execute();
        return true;
    }

    function readProj($comp)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM project where Proj_comp = '$comp'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $project[] = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $project[] = [];
        }

        return $project;
    }

    function idealDev($projID) {
        require_once __DIR__."\\../filter/project_add.php";

        try {
            echo getProject($projID);
        }catch(Exception $error) {
            echo $error;
        }

        return ;
    }
}
