<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.0.3 - Aug, 2022.
*/

/* Pick information of the company/project. */
$projId = 10;
$projName = "IBM-WEB";
$type = ['Web']; /* ⬅ Occupation area */
$skills = ['HTML5','CSS3','JAVA'];
$proj_level=1;

/* Specific Config */
$dateStart;
$dateEnd;
$payment;

/* Pick informations from developers  */
$devID = "10";
$type_user = ['Web'];
$user_skills = ['HTML5','JAVA','CSS3'];
$skill_level = ['5','4','5'];

/* Filter config */
$list_approve = 20;
global $approved;

require_once ('filter_func.php');

for ($i = 0; $i < 3; $i++) {
    $response = approved($approved, $list_approve, $type, $type_user, $skills, $user_skills, $proj_level, $skill_level);
}


echo '<script>alert("aprovados: ',$approved,'")</script>';

?>