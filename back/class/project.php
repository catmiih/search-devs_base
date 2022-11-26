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

    function getProjID($compID) {
        global $pdo;

        $sql = $pdo->prepare("SELECT Proj_ID from project where Proj_comp = $compID");
        $sql->execute();

        if($sql->rowCount() == 0){
            return 1;
        }else {
            $projId = $sql->fetch();
            return $projId[0]+1;
        }
    }

    function getProjSkills($projID)
    {
        global $pdo;

        if ($pdo->prepare("SELECT Skill_ID from skills where Skill_name like ''")) {
            $sql = $pdo->prepare("SELECT * from skills_proj where Proj_ID = '$projID' and Skill_ID != (SELECT Skill_ID from skills where Skill_name like '')");
            $sql->execute();
        } else {
            $sql = $pdo->prepare("SELECT * from skills_proj where Proj_ID = '$projID'");
            $sql->execute();
        }

        if ($sql->rowCount() > 0) {
            $skills[] = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $skills;
        }else {
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

    function Create($name, $type, $start, $end, $pay, $comp)
    {
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO project (`Proj_name`, `Proj_type`, `Proj_start`, `Proj_end`, `Proj_pay`, `Proj_dev`, `Proj_comp`) VALUES ($name,$type,$start,$end,$pay,$comp");

        $sql->execute();
        return true;
    }

}
