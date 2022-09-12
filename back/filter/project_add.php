<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.8 - Aug, 2022.
*/

include_once ('../connect.php');

function getProject($projId) {
    global $pdo;

    /* Pick information of the company/project. */
    $projID = 1;
    $projName = $pdo->prepare("SELECT Proj_name FROM project WHERE Proj_ID = $projID");
    $type = $pdo->prepare("SELECT Proj_type FROM project WHERE Proj_ID = $projID"); /* ⬅ Occupation area */
    $proj_level= $pdo->prepare("SELECT Proj_level FROM project WHERE Proj_ID = $projID");

    $s = $pdo->prepare("SELECT Skill_ID FROM skill_proj WHERE Proj_ID = $projID");
    $skills=[];

    /*Pick all skills and transform in array.*/ 
    while($skill = $s->fetch_array()) {
        $skills[] = $skill['skill_proj'];
    }


    /* Specific Config */
    $dateStart = $pdo->prepare("SELECT Proj_start FROM project WHERE Proj_ID = $projID");
    $dateEnd = $pdo->prepare("SELECT Proj_end FROM project WHERE Proj_ID = $projID");
    $payment = $pdo->prepare("SELECT Proj_pay FROM project WHERE Proj_ID = $projID");

    /* Execute Company SQL */
    $projName->execute();
    $type->execute();
    $proj_level->execute();
    $s->execute();
    $dateStart->execute();
    $dateEnd->execute();
    $payment->execute();


    /* Filter config */
    $list_approve = 20;
    $approved = 0;


    for ($i = 0; $i <= $list_approve; $i++) {

        
        /* Pick informations from developers  */
        $d = $pdo->prepare("SELECT developers.Dev_ID FROM developers inner join dev_ideal on developer.Dev_ID = dev_ideal.Ideal_dev where dev_ideal.Ideal_area = $type");

        while ($devID = mysqli_fetch_array($d)) {

        /* Get developers skill */
        $s = $pdo->prepare("SELECT Skill_ID, Skill_level FROM skills_dev WHERE Dev_ID = $devID");
        $user_skills=[];
        $skill_level = [];
    
        /*Pick all skills and transform in array.*/ 
        while($skill = mysqli_fetch_array($s)) {
            $user_skills[] = $skill['Skill_ID'];
            $skill_level[] = $skill['Skill_level'];
        }


        /* Execute SQL */
        $d->execute();
        $s->execute();

        require_once ('filter_func.php');

            $response = approved($i, $list_approve, $type, $type_user, $skills, $user_skills, $proj_level, $skill_level);
            if($response > 0) {
                $approved++;
                if($response == 1000) {
                    $list_approve = 5;
                }
            }
        }
    }
}

?>