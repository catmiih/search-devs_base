<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.

*/

function getProject($projId)
{
    global $pdo;

    /* Pick information of the company/project. */
    $projID = $projId;
    $area = $pdo->prepare("SELECT Area_ID from area_project WHERE Proj_ID = $projID");
    $skill = $pdo->prepare("SELECT * FROM skills_proj WHERE Proj_ID = $projID");

    /* Execute Company SQL */
    $area->execute();
    $skill->execute();

    /* Fetch items */
    $types = $area->fetchAll(PDO::FETCH_ASSOC); // Project Type
    foreach ($types as $typess) {
        $type[] = $typess["Area_ID"];
    }

    $skillProj = $skill->fetchAll(PDO::FETCH_ASSOC);
    foreach ($skillProj as $SkillsP) {
        $Pskill[] = $SkillsP["Skill_ID"];
        $Plevel[] = $SkillsP["Skill_level"];
    }


    /* Filter config */
    $list_approve = 20;
    $approved = 0;


    for ($i = 0; $i <= $list_approve; $i++) {
        /* Pick informations from developers  */

        echo $Pskill[0];
        
        $d = $pdo->prepare("SELECT Dev_ID from developers where Dev_ID = (SELECT Dev_ID FROM skills_dev where Skill_ID = '$Pskill[0]' and Dev_ID not in (SELECT Dev_ID from dev_ideal))");
        $d->execute();

        if ($d->rowCount() > 0) {

            $devIdeal = $pdo->prepare("SELECT Dev_ID FROM dev_ideal where Proj_ID = $projID");
            $devIdeal->execute();
            if ($devIdeal->rowCount() <= 0) {

                $devID = $d->fetch();

                /* Get developers skill */
                $s = $pdo->prepare("SELECT * FROM skills_dev WHERE Dev_ID = $devID[0]");
                $s->execute();

                /* Get Dev Area */
                $a = $pdo->prepare("SELECT Area_ID FROM area_dev where Dev_ID = $devID[0]");
                $a->execute();

                /*Pick all skills and transform in array.*/
                $userS = $s->fetchAll(PDO::FETCH_ASSOC);
                foreach ($userS as $userSS) {
                    $user_skills[] = $userSS["Skill_ID"];
                    $skill_level[] = $userSS["Skill_level"];
                }

                $typeU = $a->fetchAll(PDO::FETCH_ASSOC);
                foreach ($typeU as $typesx) {
                    $type_user[] = $typesx["Area_ID"];
                }

                require_once('filter_func.php');

                $response = approved($i, $list_approve, $type, $type_user, $Pskill, $user_skills, $Plevel, $skill_level);
                if ($response > 0) {
                    $sql = $pdo->prepare("INSERT INTO `dev_ideal`(`Dev_ID`, `Proj_ID`, `points`) VALUES ('$devID[0]','$projID', $response)");
                    $sql->execute();

                    $approved++;
                    if ($response == 1000) {
                        $list_approve = 5;
                    }
                } else {
                }
            } else {
                $list_approve = 0;
            }
        }else {
            $approved++;
        }
        
        return true;
    }
}
