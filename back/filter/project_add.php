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
    $projName = $pdo->prepare("SELECT Proj_name FROM project WHERE Proj_ID = $projID");
    $area = $pdo->prepare("SELECT Area_ID from area_project WHERE Proj_ID = $projID");
    $skill = $pdo->prepare("SELECT * FROM skill_proj WHERE Proj_ID = $projID");

    /* Execute Company SQL */
    $projName->execute();
    $area->execute();
    $skill->execute();

    /* Fetch items */

    $type = $area->fetch(); // Project Type

    /* Filter config */
    $list_approve = 20;
    $approved = 0;


    for ($i = 0; $i <= $list_approve; $i++) {
        /* Pick informations from developers  */

        foreach ($type as $types) {
            $d = $pdo->prepare("SELECT Dev_ID FROM dev_area where Area_ID = $types");
        }
        while ($devID = mysqli_fetch_array($d)) {
            /* Get developers skill */
            $s = $pdo->prepare("SELECT Skill_ID, Skill_level FROM skills_dev WHERE Dev_ID = $devID");

            $user_skills = [];
            $skill_level = [];

            /*Pick all skills and transform in array.*/
            while ($skill = mysqli_fetch_array($s)) {
                $user_skills[] = $skill['Skill_ID'];
                $skill_level[] = $skill['Skill_level'];
            }

            /* Execute SQL */
            $d->execute();
            $s->execute();

            require_once('filter_func.php');

            $response = approved($i, $list_approve, $types, $type_user, $skills, $user_skills, $proj_level, $skill_level);
            if ($response > 0) {

                //$sql = $pdo->prepare("INSERT INTO `dev_ideal`(`Ideal_area`, `Ideal_hour`, `Ideal_pay`, `Ideal_dev`, `Ideal_skill`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')");
                echo "dev 1 aprovado";
                $approved++;
                if ($response == 1000) {
                    $list_approve = 5;
                }
            }
        }
    }
}
