
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
                        require_once "pages/projects.php";
                    } else if (isset($_POST['4'])) {
                        require_once "pages/createproj.php";
                    } else if (isset($_POST['5'])) {
                        require_once "pages/vip.php";
                    } else if (isset($_POST['6'])) {
                        $projectID = $_POST['details'];
                        $id = $_POST['compid'];
                        require_once "pages/details.php";
                    } else if (isset($_POST['7'])) {
                        $search = $_POST['user'];
                        require_once "pages/profile.php";
                    } else if (isset($_POST['8'])) {
                        $projID = $_POST['projID'];
                        require_once "pages/news.php";
                    } else if (isset($_POST['edit'])) {
                        require_once "pages/edit-profile.php";
                    } else if (isset($_POST['gotoComp'])) {
                        $id = $_POST['findComp'];
                        require_once "pages/profilecomp.php";

                    } else if (isset($_POST["yes"])) {
                        $projID = $_POST["projID"];
                        $devID = $_POST["devID"];

                        require_once '../../back/class/project.php';
                        $proj = new Project();
                        $proj->conectar('search-devs_base', 'localhost', 'root', '');

                        $proj->changeProj($projID, $devID, "1", "0");
                        $proj->projStart($projID);

                        require_once "pages/news.php";

                    } else if (isset($_POST["no"])) {
                        $projID = $_POST["projID"];
                        $devID = $_POST["devID"];

                        require_once '../../back/class/project.php';
                        $proj = new Project();
                        $proj->conectar('search-devs_base', 'localhost', 'root', '');

                        $proj->changeProj($projID, $devID, "0", "0");
                        $proj->projStart($projID);
                        require_once "pages/news.php";
                        
                    }else if(isset($_POST['editProj'])) {
                        $projID = $_POST["projID"];
                        require_once "pages/edit-project.php";
                        
                    }else if(isset($_POST['finish'])) {
                        global $pdo;
                        $projID = $_POST["projID"];

                        $sql = $pdo->prepare("DELETE FROM area_project where Proj_ID = '$projID'");
                        $sql->execute();

                        $sql = $pdo->prepare("DELETE FROM skills_proj where Proj_ID = '$projID'");
                        $sql->execute();

                        $sql = $pdo->prepare("DELETE FROM project where Proj_ID = '$projID'");
                        $sql->execute();

                        require_once "pages/projects.php";

                    } else if (isset($_POST['exit'])) {
                        session_destroy();
                        header('Location: ../login.php');
                    } else {
                        require_once "pages/profilecomp.php";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>