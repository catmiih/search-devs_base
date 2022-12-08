<?php

require_once '../../back/class/project.php';

$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');

if (!isset($_SESSION)) {
    session_start();
}

/* Register Project */

if (isset($_POST["newProject"])) {

    $id = $_POST["projID"];

    $nameProj = $_POST["nameProj"];
    $descProj = $_POST["descProj"];
    $dateStart = $_POST["start"];
    $vHour = $_POST["vHour"];
    $dateEnd = $_POST["end"];
    $dHour = $_POST["dHour"];

    $eValue = $_POST["eValue"];

    function update($name, $hours, $start, $end, $hPay, $pay, $desc, $projID) {
        global $pdo;

        $sql = $pdo->prepare("UPDATE `project` SET `Proj_name`='$name',`Proj_time`='$hours',`Proj_start`='$start',`Proj_end`='$end',`Proj_hourPay`='$hPay',`Proj_pay`='$pay',`Proj_desc`='$desc' WHERE Proj_ID = '$projID'");
        $sql->execute();
        return true;
    }

    if (update($nameProj, $dHour, $dateStart, $dateEnd, $vHour, $eValue, $descProj, $id)) {

        if (isset($_POST['area'])) {
            echo "id do projeto: $id <br><br>";

            for ($i = 0; $i < 12; $i++) {
                $proj->excludeArea($id, $i + 1);
            }

            for ($i = 0; $i < 12; $i++) {

                $area = $_POST["area"];

                if ($area[$i] ?? null) {
                    if ($proj->registerArea($id, $area[$i])) {
                        echo 'Sucesso! no ' . $area[$i] . ' <br>';
                    } else {
                        echo 'Erro no ' . $area[$i] . '<br>';
                    }
                } else {
                    echo 'Excuido o ' . $i + 1, '<br>';
                }
            }
        }
    }
}


/* Register Skills */

if (isset($_GET['id'])) {
    session_start();

    $i = $_GET['id'];

    $skill = $_POST['skill-' . $i];

    $sql = $pdo->prepare("SELECT Skill_ID FROM `skills` where Skill_name like '$skill'");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $skillID = $sql->fetch();

        $proj->deleteskill($skillID, $id);
    }

    header('Location: ../company/dashboard.php');
}

if (isset($_POST['start'])) {

    session_start();

    $id = $_POST["projID"];
    echo $id;

    if ($proj->msg == "") {
        $time = 0;

        for ($i = 0; $i <= 50; $i++) {
            if (!empty($_POST['level-' . $i])) {
                $level = $_POST['level-' . $i];
                $area = $_POST['area-' . $i];

                if (!empty($_POST['skill-' . $i])) {
                    $skill = $_POST['skill-' . $i];

                    $sql = $pdo->prepare("SELECT Skill_ID FROM `skills` where Skill_name like '$skill'");
                    $sql->execute();

                    do {
                        $proj->registerSkill($skill, $area);
                    } while ($sql->rowCount() < 0);

                    if ($sql->rowCount() > 0) {
                        $skillID = $sql->fetch();

                        $proj->skillProj($id, $skillID[0], $level);
                    }
                }
                $time++;
            }
        }

        header('Location: ../company/dashboard.php');
    }
}
