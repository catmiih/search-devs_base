<?php

session_start();

if (!isset($_SESSION["id_user"])) {
    // Usuário não logado! Redireciona para a página de login
    header("Location: ../login.php");
    exit;
}

if ($_SESSION["type"] != 'user') {
    header("Location: ../company/dashboard.php");
    exit;
}

$username = $_SESSION["username"];
$id = $_SESSION["id_user"];

require_once '../../back/class/user.php';

$user = new User();
$user->conectar('search-devs_base', 'localhost', 'root', '');

?>

<div class="side-menu">
    <div id="sidebar" class="position-absolute top-0 start-0">
        <center>

            <div class="container prof">
                <form action="" method="post">
                    <button class="btn-img" type="submit" name="1">
                        <div class="user">
                            <img src="../../assets/<?php echo $user->findImage($id, 'profile')[0]; ?>" />
                        </div>
                    </button>
                </form>

                <div id="info">
                    <h1><?php echo $user->getUser($id)[2]; ?></h1>
                    <p><?php if (empty($user->getUser($id)[11])) {
                            echo "Nenhum cargo";
                        } else {
                            echo $user->getUser($id)[11];
                        } ?></p>
                </div>
            </div>

            <form action="" method="post">
                <div class="nav">
                    <br>
                    <button class="btn-menu" id="see" type="submit" name="1">Ver perfil</button>
                    <button class="btn-menu" id="search" type="submit" name="2">Descobrir profissionais</button>
                    <button class="btn-menu" id="new" type="submit" name="3">Novas propostas</button>
                    <button class="btn-menu" id="projects" type="submit" name="4">Projetos em andamento</button>
                </div>


                <div id="footerSidebar" class="position-absolute bottom-0 start-0 footer">
                    <h1>Plano Atual: Comum</h1>
                    <button type="submit" id="vip" name="5" class="btn">Torne-se Vip</button>
                    <br>
                    <p>Copyright &copy; 2022 Search Devs. Todos os direitos reservados </p>
                </div>

        </center>
    </div>
    <div id="logout">
        <button class="btn-menu logout" id="logout" type="submit" name="exit">SAIR &nbsp; <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
    </div>
    </form>
</div>