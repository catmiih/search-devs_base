<?php

require_once '../../back/class/user.php';

$user = new User();
$user->conectar('search-devs_base', 'localhost', 'root', '');
session_start();

if (isset($_POST['start'])) {

    if ($user->msg == "") {
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

                    $user->skillDev($id, $skillID, $level);
                } else {
                    $id = $_SESSION['id_user'];
                    $skillID = $sql->fetch();

                    $user->registerSkill($skill, $area);
                    $user->skillDev($id, $skillID, $level);
                }
            }else {
                echo 'Nada de skill aqui: '.$i.'<br>';
            }
        }
    }

    //header('Location: ../user/dashboard.php');
}
