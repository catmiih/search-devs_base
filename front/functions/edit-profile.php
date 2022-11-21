<?php

session_start();
$id = $_SESSION["id_user"];

if (isset($_POST['area'])) {

    $area = $_POST["area"];

    for ($i = 0; $i < count($area); $i++) {

        require_once '../../back/class/user.php';
        $user = new User();

        $user->conectar('search-devs_base', 'localhost', 'root', '');
        //echo "$msg";

        if ($user->msg == "") {
            if ($user->registerArea($id, $area[$i])) {
                //header('Location: skills.php');
                echo 'Sucesso! no '.$area[$i].' <br>';
            } else {
                echo "Erro: " . $user->msg;
            }
        }
    }
}else 
    echo ' to desmarcado: <br>'.$_POST['area'];


?>