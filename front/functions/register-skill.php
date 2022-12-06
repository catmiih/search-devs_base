<?php

require_once '../../back/class/user.php';

$user = new User();
$user->conectar('search-devs_base', 'localhost', 'root', '');

if (isset($_GET['id'])) {
    session_start();

    $i = $_GET['id'];

    $skill = $_POST['skill-' . $i];

    $sql = $pdo->prepare("SELECT Skill_ID FROM `skills` where Skill_name like '$skill'");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $id = $_SESSION['id_user'];
        $skillID = $sql->fetch();

        $user->deleteskill($skillID, $id);
    }

    header('Location: ../user/skills.php');
}

if (isset($_POST['start'])) {

    session_start();

    if ($user->msg == "") {
        $time = 0;

        for ($i = 0; $i <= 50; $i++) {
            if (!empty($_POST['level-' . $i])) {
                $level = $_POST['level-' . $i];
                $area = $_POST['area-' . $i];

                if (!empty($_POST['skill-' . $i])) {
                    $skill = $_POST['skill-' . $i];

                    $sql = $pdo->prepare("SELECT Skill_ID FROM `skills` where Skill_name like '$skill'");
                    $sql->execute();


                    while ($sql->rowCount() <= 0) {
                        $user->registerSkill($skill, $area);

                        $sql->execute();
                    }

                    $sql->execute();

                    if ($sql->rowCount() > 0) {
                        $id = $_SESSION['id_user'];
                        $skillID = $sql->fetch();

                        $user->skillDev($id, $skillID, $level);
                        $time++;
                    }

                    $time++;
                }
            }
        }

        if ($time == 0) {
            header('Location: ../user/skills.php');
        } else {
            header('Location: ../user/dashboard.php');
        }
    }
}
