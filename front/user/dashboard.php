<!DOCTYPE html>
<html lang="pt-br">

<title>SEARCH DEVS&trade; - Dashboard </title>
<link rel="shortcut icon" type="image/png" href="../img/logobarradepesquisa.svg" />

<link rel="stylesheet" href="../../assets/extend/fontawesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="../../assets/extend/css/bootstrap.css" />

<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
<link rel="stylesheet" type="text/css" href="../css/menu-user.css" />

<script src="../../assets/extend/js/bootstrap.js"></script>
<script src="../../assets/extend/js/jquery.js"></script>
<script src="../js/sd.js"></script>

<style>
    .selected {
        opacity: .8 !important;
    }
</style>

<body>
    <div class="position-relative" style="overflow-x: hidden;">
        <?php require_once 'bottom-menu.php'; ?>
        <div class="d-flex">
            <?php require_once 'left-menu.php'; ?>

            <div class="page">
                <div class="content">
                    <?php

                    if (isset($_POST['2'])) {
                        require_once "pages/search.php";
                    } else if (isset($_POST['3'])) {
                        $devID = $_SESSION["id_user"];
                        require_once "pages/news.php";
                    } else if (isset($_POST['4'])) {
                        require_once "pages/projects.php";
                    } else if (isset($_POST['5'])) {
                        require_once "pages/vip.php";
                    } else if (isset($_POST['6'])) {
                        $projectID = $_POST['details'];
                        $id = $_POST['compid'];
                        require_once "pages/details.php";
                    } else if (isset($_POST['7'])) {
                        $search = $_POST['user'];
                        require_once "pages/profile.php";
                    } else if (isset($_POST['gotoComp'])) {
                        $id = $_POST['findComp'];
                        require_once "pages/profilecomp.php";
                    } else if (isset($_POST['edit'])) {
                        require_once "pages/edit-profile.php";
                    } else if (isset($_POST["yes"])) {
                        $projID = $_POST["projID"];
                        $devID = $_POST["devID"];

                        require_once '../../back/class/project.php';
                        $proj = new Project();
                        $proj->conectar('search-devs_base', 'localhost', 'root', '');

                        $proj->changeProj($projID, $devID, "1", "1");
                        $proj->projStart($projID);
                        require_once "pages/news.php";

                    } else if (isset($_POST["no"])) {
                        $projID = $_POST["projID"];
                        $devID = $_POST["devID"];

                        require_once '../../back/class/project.php';
                        $proj = new Project();
                        $proj->conectar('search-devs_base', 'localhost', 'root', '');

                        $proj->changeProj($projID, $devID, "0", "1");
                        $proj->projStart($projID);
                        require_once "pages/news.php";
                        
                    } else if (isset($_POST['exit'])) {
                        session_destroy();
                        header('Location: ../login.php');
                    } else {
                        require_once "pages/myprofile.php";
                    }

                    ?>
                </div>

                <?php

                require_once '../../back/class/project.php';
                $proj = new Project();
                $proj->conectar('search-devs_base', 'localhost', 'root', '');
                //echo "$msg";

                $ideal = $proj->idealProj($id, "dev");
                /* SE O DEV FOR IDEAL, APARECE AQUI */
                if (!!$ideal && count($ideal) > 0) {

                ?>

                    <style>
                        @media screen and (min-device-width: 800px) {
                            #new::after {
                                position: absolute;
                                content: "<?php echo (count($ideal)) ?>";
                                color: #fff;
                                background-color: #ff0000;
                                padding: 3% 6%;
                                border-radius: 100%;

                                right: 1%;
                                margin-top: -8%;
                            }
                        }
                    </style>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>