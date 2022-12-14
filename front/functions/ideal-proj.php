<?php

require_once '../../back/class/project.php';
$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');
//echo "$msg";

$devID = $_SESSION["id_user"];

$ideal = $proj->idealProj($devID, "dev");
/* SE O DEV FOR IDEAL, APARECE AQUI */
if (!!$ideal && count($ideal) > 0) {
    require_once '../../back/class/company.php';
    $comp = new Company();

    $comp->conectar('search-devs_base', 'localhost', 'root', '');
    //echo "$msg";

    if ($user->msg == "") {

        if (!empty($ideal)) {
            $searchID = $ideal[0];

            if (!empty($searchID)) {
                for ($i = 0; $i < count($searchID); $i++) {
                    $findID = $searchID[$i]["Proj_ID"];

                    $project = $proj->readInfo($findID)[0];
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
                                            <div id="profile" class="row">
                                                <div class="profile_pic col-2">
                                                    <img src="../../assets/' . $comp->findImage($proj_comp, "profile")[0] . '" />
                                                </div>
                                                <div id="containerperfil" class="col-2">
                                                    <div id="align">
                                                        <h4>' . $proj_name . ' <br> <b>' . $comp->getUser($id)[1] . '</b> </h4>
                                                    </div>
                                                    <p>' . $proj_desc . '</p>
                                                    <br>
                                                </div>

                                                <div class="description">
                                                    <p>' . $proj_desc . '</p>
                                                </div>

                                                <div class="btn-group col">

                                                <div class="confirm row">
                                                    <form method="post" style="display:flex; justify-content:center;">
                                                        <input type="hidden" name="projID" value="' . $proj_ID . '" style="display: none;" />
                                                        <input type="hidden" name="devID" value="' . $devID . '" style="display: none;" />
                                                        <button href="" class="btn-see btn-yes col" name="yes" type="submit"><i class="fa-solid fa-check"></i></button>
                                                        <button href="" class="btn-see btn-no col" name="no" type="submit"><i class="fa-solid fa-x"></i></button>
                                                    </form>
                                                </div>

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
                }
            } else {
                echo "<h5 style='text-align: center;'>Nenhum projeto encontrado, volte mais tarde!</h5>";
            }
        } else
            echo '0';
    }
} else {
    echo "<h5 style='text-align: center;'>Nenhum projeto encontrado, volte mais tarde!</h5>";
}
