<?php

/* session_start();

if(!isset($_SESSION["id_user"]) || !isset($_SESSION["username"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: ../login.php");
exit;
} */

?>

<!DOCTYPE html>
<html lang="pt-br">

<title>SEARCH DEVS&trade; - Dashboard </title>
<link rel="shortcut icon" type="image/png" href="../img/logobarradepesquisa.svg" />

<link rel="stylesheet" href="../../assets/extend/fontawesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="../../assets/extend/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />

<script src="../../assets/extend/js/bootstrap.js"></script>
<script src="../../assets/extend/js/jquery.js"></script>
<script src="../js/sd.js"></script>

<style>
    .selected {
        opacity: .8!important;
    }
</style>

<body>
    <div class="position-relative" style="overflow-x: hidden;">
        <div class="d-flex">
            <!-- <?php require_once 'left-menu.php'; ?> -->
            <?php require_once 'bottom-menu.php'; ?>

            <div class="page">
                <?php

                if (isset($_POST['1'])) {
                    require_once "pages/myprofile.php";
                }
                if (isset($_POST['2'])) {
                    require_once "pages/search.php";
                }

                if (isset($_POST['3'])) {
                    require_once "pages/news.php";
                }

                if (isset($_POST['4'])) {
                    /* Projeto em andamento */
                }

                if (isset($_POST['5'])) {
                    /* Vip */
                }

                if (isset($_POST['6'])) {
                    require_once "pages/details.php";
                }
                if (isset($_POST['7'])) {
                    require_once "pages/profile.php";
                }

                if (isset($_POST['exit'])) {
                    /* Sair da conta */
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>