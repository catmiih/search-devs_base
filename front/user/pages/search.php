<link rel="stylesheet" type="text/css" href="../css/search.css" />


<div class="discover-pro">
    <div class="row search align-self-center justify-content-between">
        <h2 class="col-4">Descobrir profissionais</h2>
        <div class="col-7 barra">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <hr>
    </div>

    <div class="row show-result">

        <!-- Usuário ⬇️ -->

        <?php $findID= 2; ?>

        <div class="user-card">
            <div id="profile_banner">
                <img class="banner" src="../../assets/<?php echo $user->findImage($findID, $username, 'banner')[0]; ?>" alt="">
                <div id="profile">
                    <div class="profile_pic">
                        <img src="../../assets/<?php echo $user->findImage($findID, $username, 'profile')[0]; ?>" />
                    </div>
                    <div id="containerperfil">
                        <div id="align">
                            <h4><?php echo  $user->getUser($findID)[2]; ?></h4>
                        </div>
                        <p><?php echo  $user->getUser($findID)[11]; ?></p>
                    </div>
                    <div class="btn-group">
                    <form action="" method="post" style="width: 100%;">
                        
                            <input type="hidden" name="user" value="null" style="display: none;">
                            <button type="submit" name="7" class="btn">Ver perfil</button>
                    </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>