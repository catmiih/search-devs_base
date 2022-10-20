<?php

global $typeUser;
$typeUser = $_POST['type_user'];


if ($typeUser == 0) {
    $name = $_POST['name'];
    $born = $_POST['born'];
    $cell = $_POST['cell'];
    $cep = $_POST['cep'];
    $cpf = $_POST['cpf'];
    $sex = $_POST['Sex-Select'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($name, $username, $email, $password, $cell, $cep, $cpf, $born, $sex);
}


function registerUser($name, $username, $email, $password, $cell, $cep, $cpf, $born, $sex)
{
    require_once '../back/class/user.php';
    $user = new User();

    if (!empty($name) && !empty($born) && !empty($cell) && !empty($cep) && !empty($cpf) && !empty($sex) && !empty($username) && !empty($email) && !empty($password)) {

        $user->conectar('search-devs_base', 'localhost', 'root', '');
        //echo "$msg";

        if ($user->msg == "") {
            if ($user->register($name, $username, $email, $password, $cell, $cep, $cpf, $born, $sex)) {
                header("location: login.php");
            } else {
                echo "<script>window.alert('Usuário já cadastrado.')
                window.location.href='developer.php';</script>";
            }
        } else {
            echo "Erro: " . $user->msg;
        }
    } else {
    }
}
