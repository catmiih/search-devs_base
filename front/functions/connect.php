<?php

$usermail = addslashes($_POST['usermail']);
$pass = addslashes($_POST['password']);

require_once '../../back/class/user.php';
$user = new User();

if (!empty($usermail) && !empty($pass)) {

    //echo "$msg";
    $user->conectar('search-devs_base', 'localhost', 'root', '');

    if ($user->msg == "") {

        $sql = $pdo->prepare("SELECT `Dev_ID` FROM `developers` WHERE `Dev_username` = '$usermail' || `Dev_email` = '$usermail'");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            /* Is a Dev */

            $idR = "SELECT * FROM `developers` WHERE `Dev_username` like '$usermail' || `Dev_email` like '$usermail'";
            $result = $pdo->query($idR);
            $id = $result->fetch();

            $usern = "SELECT Dev_username FROM developers WHERE Dev_ID = '$id[0]'";
            $result2 = $pdo->query($usern);
            $username = $result2->fetch();

            $user->login($username[0], $pass);
                
        } else {

            $sql2 = $pdo->prepare("SELECT Comp_ID FROM company WHERE Comp_email like '$usermail' || Comp_user like '$usermail'");
            $sql2->execute();

            if ($sql2->rowCount() > 0) {
                /* Is a Company */
                require_once '../../back/class/company.php';
                $comp = new Company();

                $id = $pdo->prepare("SELECT * FROM company WHERE Comp_email like '$usermail' || Comp_user like '$usermail'");
                $idComp = $id->fetch();

                $user = $pdo->prepare("SELECT Comp_user FROM company WHERE Comp_ID like '$idComp[0]'");
                $username = $user->fetch();

                $comp->login($username[0], $pass);
            } else {
                echo "dei erro";
            }
        }
    } else {
        echo "Erro: " . $user->msg;
    }
} else {
    echo "alert('Usuário não existe')";
}
