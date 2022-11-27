<?php

session_start();
$id = $_SESSION["id_user"];
$username = $_SESSION["username"];

if ($_SESSION["type"] == 'user') {

    require_once '../../back/class/user.php';
    $user = new User();

    $user->conectar('search-devs_base', 'localhost', 'root', '');
    //echo "$msg";

    if ($user->msg == "") {
        if (isset($_POST['public']) && isset($_POST['username']) && isset($_POST['office']) && isset($_POST['name']) && isset($_POST['cell'])) {
            $username = $_POST['username'];
            $office = $_POST['office'];
            $name = $_POST['name'];
            $cell = $_POST['cell'];

            $sql = $pdo->prepare("UPDATE `developers` SET `Dev_name`='$name',`Dev_username`='$username',`Dev_Num`='$cell',`dev_office`='$office' WHERE Dev_ID = $id");
            $sql->execute();

            /* Image Update */
            $banner = $_FILES["banner"];
            $profile = $_FILES["profile"];

            $path = "../../assets/uploads/user/";

            if ($banner["size"] != '0') {
                $filename = explode('.', $banner['full_path']);

                if ($filename[sizeof($filename) - 1] != 'jpg' && $filename[sizeof($filename) - 1] != 'png') {
                    die('Você não pode fazer isso. Banner');
                } else {
                    $newName = $id . '_banner.' . 'jpg';

                    if (!file_exists($path . $id)) {
                        mkdir($path . $id);
                    }

                    $upload = move_uploaded_file($banner['tmp_name'], $path . $id . '/' . $newName);

                    if ($upload) {
                        echo 'Dei upload <br>';
                        $user->saveFile($id, 'banner');
                    }
                }
            }

            if ($profile["size"] != '0') {
                $filename = explode('.', $profile['full_path']);

                if ($filename[sizeof($filename) - 1] != 'jpg' && $filename[sizeof($filename) - 1] != 'png') {
                    die('Você não pode fazer isso. Perfil');
                } else {
                    $newName = $id . '_profile.' . 'jpg';
                    echo $newName;

                    if (!file_exists($path . $id)) {
                        mkdir($path . $id);
                    }
                    $upload = move_uploaded_file($profile['tmp_name'], $path . $id . '/' . $newName);

                    if ($upload) {
                        echo 'Dei upload';
                        $user->saveFile($id, 'profile');
                    }
                }
            }

            header('Location: ../user/dashboard.php');
        }

        if (isset($_POST['area'])) {

            for ($i = 0; $i < 12; $i++) {
                $user->excludeArea($id, $i + 1);
            }

            for ($i = 0; $i < 12; $i++) {

                $area = $_POST["area"];

                if ($area[$i] ?? null) {
                    $user->registerArea($id, $area[$i]);
                    echo 'Sucesso! no ' . $area[$i] . ' <br>';
                } else {
                    echo 'Excuido o ' . $i + 1, '<br>';
                }
            }

            header('Location: ../user/dashboard.php');
        }

        if (isset($_POST['general']) && isset($_POST['email'])) {
            $email = $_POST['email'];
            $desc = $_POST['desc'];

            if (isset($_POST['password'])) {
                $passMD5 = md5($_POST['password']);
                $newpass = $_POST['newpass'];

                $sql = $pdo->prepare("SELECT `Dev_pass` FROM `developers` WHERE $passMD5 = `Dev_pass`");
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    $sql = $pdo->prepare("UPDATE `developers` SET `Dev_pass`='" . md5($newpass) . "' WHERE Dev_ID = $id");
                    $sql->execute();
                }
            }

            $sql = $pdo->prepare("UPDATE `developers` SET `Dev_email`='$email', `dev_description` = '$desc' WHERE Dev_ID = $id");
            $sql->execute();

            header('Location: ../user/dashboard.php');
        }

        if (isset($_POST['personal'])) {
            $cep = $_POST['CEP'];
            $cpf = $_POST['CPF'];
            $born = $_POST['born'];

            $sex = $_POST['Sex-Select'];

            $sql = $pdo->prepare("UPDATE `developers` SET `Dev_cep`='$cep',`Dev_cpf`='$cpf',`Dev_born`='$born',`Dev_sex`='$sex' WHERE Dev_ID = $id;");
            $sql->execute();

            header('Location: ../user/dashboard.php');
        }
    }
} else {
    require_once '../../back/class/company.php';
    $comp = new Company();

    $comp->conectar('search-devs_base', 'localhost', 'root', '');
    //echo "$msg";

    if ($comp->msg == "") {
        if (isset($_POST['public']) && isset($_POST['username']) && isset($_POST['office']) && isset($_POST['name']) && isset($_POST['cell'])) {
            $username = $_POST['username'];
            $office = $_POST['office'];
            $name = $_POST['name'];
            $cell = $_POST['cell'];

            $sql = $pdo->prepare("UPDATE `company` SET `Comp_name`='$office',`Comp_username`='$username',`Comp_Num`='$cell',`Comp_responsible`='$name' WHERE Comp_ID = $id");
            $sql->execute();

            /* Image Update */
            $banner = $_FILES["banner"];
            $profile = $_FILES["profile"];

            $path = "../../assets/uploads/company/";

            if ($banner["size"] != '0') {
                $filename = explode('.', $banner['full_path']);

                if ($filename[sizeof($filename) - 1] != 'jpg' && $filename[sizeof($filename) - 1] != 'png') {
                    die('Você não pode fazer isso. Banner');
                } else {
                    $newName = $id . '_banner.' . 'jpg';

                    if (!file_exists($path . $id)) {
                        mkdir($path . $id);
                    }

                    $upload = move_uploaded_file($banner['tmp_name'], $path . $id . '/' . $newName);

                    if ($upload) {
                        echo 'Dei upload <br>';
                        $comp->saveFile($id, 'banner');
                    }
                }
            }

            if ($profile["size"] != '0') {
                $filename = explode('.', $profile['full_path']);

                if ($filename[sizeof($filename) - 1] != 'jpg' && $filename[sizeof($filename) - 1] != 'png') {
                    die('Você não pode fazer isso. Perfil');
                } else {
                    $newName = $id . '_profile.' . 'jpg';
                    echo $newName;

                    if (!file_exists($path . $id)) {
                        mkdir($path . $id);
                    }
                    $upload = move_uploaded_file($profile['tmp_name'], $path . $id . '/' . $newName);

                    if ($upload) {
                        echo 'Dei upload';
                        $comp->saveFile($id, 'profile');
                    }
                }
            }

            header('Location: ../company/dashboard.php');
        }


        if (isset($_POST['general']) && isset($_POST['email'])) {
            $email = $_POST['email'];
            $desc = $_POST['desc'];

            if (isset($_POST['password'])) {
                $passMD5 = md5($_POST['password']);
                $newpass = $_POST['newpass'];

                $sql = $pdo->prepare("SELECT `Comp_pass` FROM `company` WHERE $passMD5 = `Comp_pass`");
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    $sql = $pdo->prepare("UPDATE `company` SET `Comp_pass`='" . md5($newpass) . "' WHERE Comp_ID = $id");
                    $sql->execute();
                }
            }

            $sql = $pdo->prepare("UPDATE `company` SET `Comp_email`='$email', `Comp_description` = '$desc' WHERE Comp_ID = $id");
            $sql->execute();

            header('Location: ../company/dashboard.php');
        }

        if (isset($_POST['personal'])) {
            $cnpj = $_POST['CNPJ'];
            $cpf = $_POST['CPF'];
            $born = $_POST['born'];

            $sex = $_POST['Sex-Select'];

            $sql = $pdo->prepare("UPDATE `company` SET `Comp_cnpj`='$cnpj',`Comp_cpf`='$cpf',`Comp_date`='$born' WHERE Comp_ID = $id;");
            $sql->execute();

            header('Location: ../company/dashboard.php');
        }
    }
}
