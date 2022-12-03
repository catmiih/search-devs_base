<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/profilecomp.css" />

<?php

require_once '../../back/class/project.php';

$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');

require_once '../../back/class/company.php';
$comp = new Company();

$comp->conectar('search-devs_base', 'localhost', 'root', '');
?>

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

                        <?php if ($id == $_SESSION["id_user"]) { ?>
                            <form action="" method="post">
                                <button href="#" class="btn edit" name="edit"><i class="fa-solid fa-gear"></i></button>
                            </form>
                        <?php } ?>
                    </div>
                    <p><?php echo $comp->getUser($id)[1]; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row feed container">
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
            <div class="container row justify-content-center">

                <?php
                require_once '../../back/class/project.php';

                $proj = new Project();
                $proj->conectar('search-devs_base', 'localhost', 'root', '');

                $project = $proj->readProj($id)[0];
                $time = 0;

                foreach ($project as $projects) {
                    $time++;

                    $proj_ID = $projects['Proj_ID'];
                    $proj_name = $projects['Proj_name'];
                    $proj_desc = $projects['Proj_desc'];
                    $proj_time = $projects['Proj_time'];
                    $proj_start = $projects['Proj_start'];
                    $proj_end = $projects['Proj_end'];
                    $proj_hourPay = $projects['Proj_hourPay'];
                    $proj_pay = $projects['Proj_ID'];
                    $proj_comp = $projects['Proj_comp'];

                    $projectCard = '<div class="propose-card">
                                        <div id="profile" class="row crd">
                                            <div class="profile_pic col-2 crd">
                                                <img src="../../assets/' . $comp->findImage('.$id.', "profile")[0] . '" />
                                            </div>
                                            <div id="containerperfil" class="col-2 crd">
                                                <div id="align">
                                                    <h4>' . $proj_name . ' <br> <b>' . $comp->getUser($id)[1] . '</b> </h4>
                                                </div>
                                                <p>' . $proj_desc . '</p>
                                                <br>
                                            </div>

                                            <div class="description crd">
                                                <p>' . $proj_desc . '</p>
                                            </div>

                                            <div class="btn-group col crd">

                                                <form action="" method="post" style="width: 100%;">
                                                    <input type="hidden" name="details" value="' . $proj_ID . '" style="display: none;">
                                                    <input type="hidden" name="compid" value="' . $proj_comp . '" style="display: none;">
                                                    <button type="submit" name="6" class="btn-see">Detalhes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>';

                    echo $projectCard;
                }

                if ($time == 0) {
                    echo 'Nenhum projeto encontrado';
                }
                ?>
            </div>
        </div>
    </div>
</div>