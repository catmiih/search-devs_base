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

else {
    $name = $_POST['name'];
    $responsible = $_POST['responsible'];
    $date = $_POST['date'];
    $cell = $_POST['cell'];
    $cnpj = $_POST['cnpj'];
    $cpf = $_POST['cpf'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerCompany($name, $responsible, $date, $cell, $cnpj, $cpf, $username, $email, $password);
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

function registerCompany($name, $responsible, $date, $cell, $cnpj, $cpf, $username, $email, $password)
{
    require_once '../back/class/company.php';
    $comp = new Company();

    if (!empty($name) && !empty($responsible) && !empty($date) && !empty($cell) && !empty($cnpj) && !empty($cpf) && !empty($username) && !empty($email) && !empty($password)) {

        $comp->conectar('search-devs_base', 'localhost', 'root', '');
        //echo "$msg";

        if ($comp->msg == "") {
            if ($comp->register($name, $email, $password, $cnpj, $cell, $username, $responsible, $cpf, $date)) {
                header("location: login.php");
            } else {
                echo "<script>window.alert('Usuário já cadastrado.')
                window.location.href='company.php';</script>";
            }
        } else {
            echo "Erro: " . $user->msg;
        }
    } else {
    }
}
