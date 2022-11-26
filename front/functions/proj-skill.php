<?php

require_once '../../back/class/project.php';

$comp = new Project();
$comp->conectar('search-devs_base', 'localhost', 'root', '');

if (isset($_GET['id'])) {
    session_start();

    $i = $_GET['id'];

    $skill = $_POST['skill-' . $i];

    $sql = $pdo->prepare("SELECT Skill_ID FROM `skills` where Skill_name like '$skill'");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $id = $_SESSION['id_user'];
        $skillID = $sql->fetch();

        $comp->deleteskill($skillID, $id);
    }

    header('Location: ../company/dashboard.php');
}

if (isset($_POST['start'])) {

    session_start();

    if ($comp->msg == "") {
        $time=0;

        for ($i = 0; $i <= 50; $i++) {
            if (!empty($_POST['level-' . $i])) {
                $level = $_POST['level-' . $i];
                $skill = $_POST['skill-' . $i];
                $area = $_POST['area-' . $i];

                $sql = $pdo->prepare("SELECT Skill_ID FROM `skills` where Skill_name like '$skill'");
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    $id = $_SESSION['id_user'];
                    $skillID = $sql->fetch();

                    $comp->skillProj($id, $skillID, $level);
                } else {
                    $id = $_SESSION['id_user'];
                    $skillID = $sql->fetch();

                    $comp->registerSkill($skill, $area);
                    $comp->skillProj($id, $skillID, $level);
                }

                $time++;
            } else {
                echo 'Nada de skill aqui: ' . $i . '<br>';
            }
        }

        if($time == 0){
            header('Location: ../company/skills.php');
        }else {
            header('Location: ../company/dashboard.php');
        }
    }
}
