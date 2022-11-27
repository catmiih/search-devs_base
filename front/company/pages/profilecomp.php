<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/profilecomp.css" />


<div class="perfil">
    <div id="feedperfil">
        <div id="profile_banner">
            <img class="banner" src="../../assets/<?php echo $comp->findImage($id, 'banner')[0]; ?>" alt="">
            <div id="profile">
                <div class="profile_pic">
                    <img src="../../assets/<?php echo $comp->findImage($id, 'profile')[0]; ?>" />
                </div>
                <div id="containerperfil">
                    <div id="align">
                        <h4><?php echo $comp->getUser($id)[6]; ?></h4>

                        <form action="" method="post">
                            <button href="#" class="btn edit" name="edit"><i class="fa-solid fa-gear"></i></button>
                        </form>
                    </div>
                    <p><?php echo $comp->getUser($id)[1]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row feed">
        <div class="col info">
            <h2>Informações:</h2>

            <div class="row input">
                <p class="col label">Responsável:</p>
                <input type="text" placeholder="<?php echo $comp->getUser($id)[7]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

            <div class="row input">
                <p class="col label"> Telefone:</p>
                <input type="text" placeholder="<?php echo $comp->getUser($id)[5]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>

            </div>
            <div class="row input">
                <p class="col label">Email:</p>
                <input type="text" placeholder="<?php echo $comp->getUser($id)[2]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

        </div>
        <div class="col description">
            <h2>Descrição do perfil:</h2>
            <textarea class="form-control desc" name="desc" disabled><?php if (empty($comp->getUser($id)[10])) {
                                                                            echo "Olá! Sou novo no SEARCH DEVS&#8482;!";
                                                                        } else {
                                                                            echo $comp->getUser($id)[10];
                                                                        } ?></textarea>
        </div>
    </div>

    <hr>

    <div class="row feed project">
        <h2>Projetos em andamento:</h2>

        <div class="showProj">
            
        </div>
    </div>
</div>