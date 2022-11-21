<?php

session_start();
$id = $_SESSION["id_user"];

for ($i = 0; $i < 12; $i++) {
    if (isset($_POST['area'])) {

        $area = $_POST["area"];

        require_once '../../back/class/user.php';
        $user = new User();

        $user->conectar('search-devs_base', 'localhost', 'root', '');
        //echo "$msg";

        if ($user->msg == "") {

            if($area[$i] ?? null){
                $user->registerArea($id, $area[$i]);
                echo 'Sucesso! no ' . $area[$i] . ' <br>';
            }else {
                $user->excludeArea($id, $i+1);
                echo 'Excuido o '.$i+1,'<br>';
            }

            /* if ($user->registerArea($id, $i)) {
                //header('Location: skills.php');
                echo 'Sucesso! no ' . $area[$i] . ' <br>';
            } else {
                echo "Erro: " . $user->msg;
            } */
        }
    } else
        echo ' to desmarcado: '.$i.'<br>';
}

?>
