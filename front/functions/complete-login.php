<?php

require_once 'register-user.php';

echo "<script>alert('$typeUser')</script>";

function verifyUser($typeUser, $name, $username, $email, $password, $cell, $cep, $cpf, $born, $sex)
{
    if ($typeUser == 0) {

        registerUser($name, $username, $email, $password, $cell, $cep, $cpf, $born, $sex);
    }
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
                echo "<script language='javascript' type='text/javascript'>alert('O usuario foi cadastrado com sucesso!')</script>";
            } else {
                header('Location: /front/complete-login');
            }
        } else {
            echo "Erro: " . $user->msg;
        }
    } else {
    }
}
