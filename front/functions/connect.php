<?php

$usermail = $_POST['usermail'];
$pass = $_POST['pass'];

require_once '../../back/class/user.php';
$user = new User();

if (!empty($usermail) && !empty($pass)) {

    //echo "$msg";
    $user->conectar('search-devs_base', 'localhost', 'root', '');

    if ($user->msg == "") {

        $sql = $pdo->prepare("SELECT Dev_ID FROM developers WHERE Dev_email like '$usermail' or Dev_username like '$usermail");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            /* Is a Dev */
            $pass = $_POST['pass'];
            $id = $pdo->prepare("SELECT Dev_ID FROM developers WHERE Dev_email like '$usermail' or Dev_username like '$usermail'");

            $email = $pdo->prepare("SELECT Dev_email FROM developers WHERE Dev_ID like '$id'");
            $user = $pdo->prepare("SELECT Dev_username FROM developers WHERE Dev_ID like '$id'");

            $user->login($email, $user, $pass);
        } else {

            $sql2=$pdo->prepare("SELECT Comp_ID FROM company WHERE Comp_email like '$usermail' || Comp_user like '$usermail'");
            $sql2->execute();

            if($sql2->rowCount() > 0) {
            /* Is a Company */
            require_once '../../back/class/company.php';
            $comp = new Company();

            $id = $pdo->prepare("SELECT Comp_ID FROM company WHERE Comp_email like '$usermail' || Comp_use like '$usermail'");

            $email = $pdo->prepare("SELECT Comp_email FROM company WHERE Comp_ID like '$id'");
            $user = $pdo->prepare("SELECT Comp_user FROM company WHERE Comp_ID like '$id'");

            $comp->login($email, $user, $pass);
            
            }else {
                echo "dei erro";
            }
        }
    } else {
        echo "Erro: " . $user->msg;
    }
} else {
    echo "alert('Usuário não existe')";
}
