<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.0.0 - Aug, 2022.
*/

function filterFunction($projId, $approved, $list_approve) {

    /* Pick information of the company/project. */
    $projId = "";
    $nameProj = "";
    $type = []; /* ⬅ Occupation area */
    $skills = [];
    $proj_level= "";

    /* Pick informations from developers  */
    $devID = "";
    $nameDev = "PEGARDOSQL";
    $type_user = [];
    $user_skills = [];
    $skill_level = [];

    $y = 0;

    /* Total Skills with Match */
    $total_skills = 0;

    /* START FILTER */
    if ($approved <= $list_approve) {
        if ($type == $type_user) {

        /* Difference of Skills and User_Skills */
            $diff = count(array_diff($skills,$user_skills));
        /* ---------------------- */

            if ($diff >= (count($skills)/100) * 20) { /* ⬅ Skill difference + Error Margin */

                /* Loop for scan all skills Level*/
                for($y = 0; $y <= count($skills); $y++ ) {
                    if ($proj_level >= ($skill_level[$y] - 1))
                        $total_skills++;
                /* ---------------------- */

            if ($total_skills >= (count($skills) - ((count($skills)/100) * 20))){
                    /* Here is the developers wen all approved for this project. */
                if ($total_skills == count($skills)) {
                    /* If has a perfect professional: */
                    return $approved++ & $list_approve=5;    
                } else
                    return $approved++;
                }
            }
        }else{
                exit;
            }
        }else {
            /* Professional is not good for project. */
            return 0;
        }
    }
}

?>