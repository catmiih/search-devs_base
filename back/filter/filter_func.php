<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.0.3 - Aug, 2022.
*/

function approved($approved, $list_approve, $type, $type_user, $skills, $user_skills, $proj_level, $skill_level)
{
    if ($approved <= $list_approve) {
        $result = filterFunction($type, $type_user, $skills, $user_skills, $proj_level, $skill_level);
        if ($result) {
            return $approved+=1;
        }
    }
}

function filterFunction($type, $type_user, $skills, $user_skills, $proj_level, $skill_level)
{

    /* Start Filter */


    $user_type = count(array_diff($type, $type_user));
    /* ---------------------- */

    if ($user_type <= (count($type) / 100) * 20) {

        /* Difference in count of Skills and User_Skills */
        $diff = count(array_diff($skills, $user_skills));
        /* ---------------------- */

        if ($diff <= (count($skills) / 100) * 20) { /* ⬅ Skill difference + Error Margin */
            $result = startFilter($skills, $proj_level, $skill_level);
            return $result;
        } else
            return false;
    } else {
        /* Professional is not good for project. */
        return false;
    }
}

function startFilter($skills, $proj_level, $skill_level)
{

    /* Total Skills with Match */
    global $total_skills;


    /* Loop for scan all skills Level*/
    for ($y = 0; $y <= count($skills) - 1; $y++) {
        if ($proj_level <= ($skill_level[$y])) {
            $total_skills++;
        } else {
        }
    }

    /* ---------------------- */

    if ($total_skills >= (count($skills) - ((count($skills) / 100) * 20))) {
        /* Here is the developers wen all approved for this project. */
        if ($total_skills == count($skills)) {
            /* If has a perfect professional: */
            return $list_approve = 5;
        }
    } else {
    }
}

?>