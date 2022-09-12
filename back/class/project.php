<?php

/* 
    This archive try read all professionals wen can be a possible selected for the project.
    Developed by SearchDevs™ for SearchDevs™ Plataform.

    All rights reserved ©️. All materials are protected by copyright and other rights.
    Version : 1.0.1.8 - Aug, 2022.
*/

include_once '../connect.php';

/* All User Methods */
class Project
{

    function Create($name, $type, $start, $end, $pay, $comp)
    {
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO project (`Proj_name`, `Proj_type`, `Proj_start`, `Proj_end`, `Proj_pay`, `Proj_dev`, `Proj_comp`) VALUES ($name,$type,$start,$end,$pay,$comp");

        $sql->execute();
        return true;
    }

}
