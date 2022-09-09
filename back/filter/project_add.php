<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.7 - Aug, 2022.
*/

include_once ('../connect.php');

function getProject($projId) {
    global $pdo;

    /* Pick information of the company/project. */
    $projID = $projId;
    $projName = $pdo->prepare("SELECT Proj_name FROM project WHERE Proj_ID = $projID");
    $type = $pdo->prepare("SELECT Proj_type FROM project WHERE Proj_ID = $projID"); /* ⬅ Occupation area */
    $skills = ['?'] /*Pick all skills and transform in array.*/ ;
    $proj_level= $pdo->prepare("SELECT Proj_level FROM project WHERE Proj_ID = $projID");


    /* Specific Config */
    $dateStart = $pdo->prepare("SELECT Proj_start FROM project WHERE Proj_ID = $projID");
    $dateEnd = $pdo->prepare("SELECT Proj_end FROM project WHERE Proj_ID = $projID");
    $payment = $pdo->prepare("SELECT Proj_pay FROM project WHERE Proj_ID = $projID");

    /* Execute Company SQL */
    $projName->execute();
    $type->execute();
    $proj_level->execute();
    $dateStart->execute();
    $dateEnd->execute();
    $payment->execute();

    /* Pick informations from developers  */

    /* Filter config */
    $list_approve = 20;
    $approved = 0;

for ($i = 0; $i <= $list_approve; $i++) {

    $type_user = $pdo->prepare("SELECT Dev_type FROM project WHERE Proj_ID = $projID");
    $user_skills = ['HTML5','JAVA','CSS3'];
    $skill_level = ['5','4','5'];

    require_once ('filter_func.php');

        $response = approved($i, $list_approve, $type, $type_user, $skills, $user_skills, $proj_level, $skill_level);
        if($response > 0) {
            $approved++;
        }
}
?>