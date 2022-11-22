<link rel="stylesheet" type="text/css" href="../css/search.css" />


<div class="discover-pro">
    <div class="row search align-self-center justify-content-between">
        <h2 class="col-4">Descobrir profissionais</h2>
        <div class="col-7 barra">
            <form class="d-flex" role="search">
                <input class="form-control me-2" name="search" type="text   " placeholder="Procurar" aria-label="Search">
                <button class="btn btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <hr>
    </div>

    <div class="row show-result">

        <?php

        require_once '../../back/class/user.php';
        $user = new User();

        $user->conectar('search-devs_base', 'localhost', 'root', '');

        if(isset($_POST['user'])){
            $search = $_POST['user'];
            $findID = $user->searchUser($search);
        }

        ?>
        <!-- Usuário ⬇️ -->

        <?php $user_card = '
        <div class="user-card">
            <div id="profile_banner">
                <img class="banner" src="../../assets/' . $user->findImage($findID, "banner")[0] . '" alt="">
                <div id="profile">
                    <div class="profile_pic">
                        <img src="../../assets/' . $user->findImage($findID, "profile")[0] . '" />
                    </div>
                    <div id="containerperfil">
                        <div id="align">
                            <h4>' . $user->getUser($findID)[2] . '</h4>
                        </div>
                        <p>' . $user->getUser($findID)[11] . '</p>
                    </div>
                    <div class="btn-group">
                    <form action="" method="post" style="width: 100%;">
                            <input type="hidden" name="user" value="' . $findID . '" style="display: none;">
                            <button type="submit" name="7" class="btn">Ver perfil</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        ';

        echo $user_card;
        ?>

    </div>
</div>