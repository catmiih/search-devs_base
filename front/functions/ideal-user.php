<?php

require_once '../../back/class/project.php';
$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');
//echo "$msg";

$ideals = $proj->idealDev($projID, "comp");

if (!!$ideals && count($ideals) > 0) {

    /* Read All Ideal Devs*/

    $sql = $pdo->prepare("SELECT Dev_ID from dev_ideal where Proj_ID = $projID");
    $sql->execute();

    $idealDevs = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($idealDevs as $ideal) {


        require_once '../../back/class/user.php';
        $user = new User();

        $user->conectar('search-devs_base', 'localhost', 'root', '');
        //echo "$msg";

        if ($user->msg == "") {

            if (!empty($ideal)) {
                $searchID = $ideal["Dev_ID"];


                if (!empty($searchID)) {
                    $findID = $searchID;

                    if (empty($user->getUser($findID)[11])) {
                        $office = "Nenhum cargo";
                    } else {
                        $office = $user->getUser($findID)[11];
                    }

                    $user_card = '
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
                                        <p>' . $office . '</p>
                                    </div>
                                    <div class="btn-group row">
                                    <form action="" method="post" style="width: 100%;">
                                            <input type="hidden" name="user" value="' . $findID . '" style="display: none;">
                                            <button type="submit" name="7" class="btn">Ver perfil</button>
                                    </form>
                                    </div>

                                    <div class="btn-group row">
                                        <form method="post">
                                            <div class="confirm">
                                                <input type="hidden" name="projID" value="' . $projID . '" style="display: none;"/>
                                                <input type="hidden" name="devID" value="' . $findID . '" style="display: none;"/>
                                                <button href="" class="btn-see btn-yes col" name="yes" type="submit"><i class="fa-solid fa-check"></i></button>
                                                <button href="" class="btn-see btn-no col" name="no" type="submit"><i class="fa-solid fa-x"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';

                    echo $user_card;
                }
            }
        }
    }
} else {
    echo "<h5 style='text-align: center;'>Nenhum desenvolvedor encontrado</h5>";
}
