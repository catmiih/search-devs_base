<?php



require_once('register-login.php');

$typeUser = $_POST['type_user'];
$user = new User;

if ($typeUser == 0) {

    global $name;
    global $born;
    global $cell;
    global $cep;
    global $cpf;
    global $sex;

    $name = $_POST['name'];
    $born = $_POST['born'];
    $cell = $_POST['cell'];
    $cep = $_POST['cep'];
    $cpf = $_POST['cpf'];
    $sex = $_POST['Sex-Select'];

    $c->Connect('search-devs_base', 'localhost', 'root', '');

    if ($user->register($name, $name,$name,$name,$name,$name,$name,$name,$name)) {
        echo "<script>alert('funcionou')</script>";
    } else {
        echo "<script>alert('erro')</script>";
    }


    /* if($_SERVER['REQUEST_METHOD'] == 'POST') { 

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo "<script>alert('erro')</script>";

        $c->Connect('search-devs_base', 'localhost', 'root', '');

        if ($user->register($name, $username, $email, $password, $cell, $cep, $cpf, $born, $sex)) {
            echo "<script>alert('funcionou')</script>";
        }else {
            echo "<script>alert('erro')</script>";
        }
    } */
}
