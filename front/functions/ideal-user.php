<?php

require_once '../../back/class/project.php';
$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');
//echo "$msg";

$type = $pdo->prepare("SELECT Area_ID from area_project WHERE Proj_ID = $projID");
$type->execute();

$types = $type->fetch();


/* EXECUTAR E DAR FETCH NA I.A */


/* foreach ($type as $types) {
    //$d = $pdo->prepare("SELECT Dev_ID FROM dev_area where Area_ID = $types");
} */

echo "<script>alert('" . $types[0] . "')</script>";

/* SE O DEV FOR IDEAL, APARECE AQUI */
if (1 == 1) {
    require_once '../../back/class/user.php';
    $user = new User();

    $user->conectar('search-devs_base', 'localhost', 'root', '');
    //echo "$msg";

    if ($user->msg == "") {
        $search = $_POST['ideal'];

        if (!empty($search)) {
            $searchID = $user->searchUser($search);

            if (!!$searchID) {
                for ($i = 0; $i < count($searchID); $i++) {
                    $findID = $searchID[$i][0];

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
                        <div class="btn-group">
                        <form action="" method="post" style="width: 100%;">
                                <input type="hidden" name="user" value="' . $findID . '" style="display: none;">
                                <button type="submit" name="7" class="btn">Ver perfil</button>
                        </form>
                        </div>

                        <div class="btn-group col">
                            <div class="confirm">
                                <button href="" class="btn-see btn-yes col"><i class="fa-solid fa-check"></i></button>
                                <button href="" class="btn-see btn-no col"><i class="fa-solid fa-x"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';

                    echo $user_card;
                }
            } else {
                echo '0';
            }
        } else
            echo '0';
    }
}
