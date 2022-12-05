<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/details.css" />

<?php

require_once '../../back/class/project.php';

$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');

$project = $proj->readInfo($projectID)[0][0];

?>

<div class="perfil">
    <div id="feedperfil">
        <div id="profile_banner">
            <img class="banner" src="../../assets/<?php echo $comp->findImage($id, 'banner')[0]; ?>" alt="">
            <div id="profile" class="col">
                <div class="profile_pic">
                    <img src="../../assets/<?php echo $comp->findImage($id, 'profile')[0]; ?>" />
                </div>
                <div id="containerperfil">
                    <div id="align">
                        <h4><?php echo $project["Proj_name"]; ?></h4>

                        <?php if ($id != $project["Proj_comp"]) { ?>
                            <div class="btn-group row">
                                <div class="confirm">
                                    <button href="" class="btn-see btn-yes"><i class="fa-solid fa-check"></i></button>
                                    <button href="" class="btn-see btn-no"><i class="fa-solid fa-x"></i></button>
                                </div>
                            </div>
                        <?php } else if ($project["Proj_dev"] == null){ ?>
                            <div class="btn-group row">
                                <div class="confirm">
                                    <form action="" method="post">
                                        <input type="hidden" name="projID" value="<?php echo $project["Proj_ID"] ?>">
                                        <button class="btn-see btn-dev" name="8" type="submit"><i class="fa-solid fa-user"></i> &nbsp; Verificar desenvolvedores </button>
                                    </form>
                                </div>
                            </div>
                        <?php }else {
                            ?>
                            
                            <div class="btn-group row">
                                <div class="confirm">
                                    <form action="" method="post">
                                        <input type="hidden" name="projID" value="<?php echo $project["Proj_ID"] ?>">
                                        <button class="btn-see btn-yes" name="" type="submit">Finalizar projeto </button>
                                    </form>
                                </div>
                            </div>

                            <?php
                        } ?>
                    </div>
                    <p><?php echo $comp->getUser($id)[1]; ?></p>
                </div>

            </div>
        </div>
    </div>

    <br>

    <div class="skills">
        <div class="col description">
            <h2>Detalhes do projeto:</h2>
            <p><?php echo $project["Proj_desc"]; ?></p>
        </div>

        <hr>

        <div class="row evaluation justify-content-between">

            <h2 style="font-weight:700" class="col">Habilidades:</h2>

            <div class="level-options col">
                <p style="margin: 1%;">Nível:</p>
                <label>
                    <button class="btn-select btn-level level-1 selected" id="level-1" type="button">1</button>
                </label>
                <label>
                    <button class="btn-select btn-level level-2 selected" id="level-2" type="button">2</button>
                </label>

                <label>
                    <input type="radio" name="lvl" id="3" value="3" />
                    <button class="btn-select btn-level level-3 selected" id="level-3" type="button">3</button>
                </label>

                <label>
                    <input type="radio" name="lvl" id="4" value="4" />
                    <button class="btn-select btn-level level-4 selected" id="level-4" type="button">4</button>
                </label>
                <label>
                    <input type="radio" name="lvl" id="5" value="5" />
                    <button class="btn-select btn-level level-5 selected" id="level-5" type="button">5</button>
                </label>
            </div>
            <br>
            <div class="show-skills">
                <?php

                $skills = $proj->getProjSkills($projectID)[0];

                foreach ($skills as $skill) {

                    $skillCard = "<span id='" . $skill['Skill_ID'] . "' class='btn-level level-" . $skill['Skill_level'] . " skill-tag'><input type='hidden' name='level-" . $skill['Skill_level'] . "' value='" . $skill['Skill_level'] . "'><input type='hidden' name='skill-" . $skill['Skill_level'] . "' value='" . $skill['Skill_ID'] . "'><input type='hidden' name='area' value='" . $user->getAreaSkills($skill['Skill_ID'])[0] . "'> " . $user->getNameSkills($skill['Skill_ID'])[0] . "</span>";

                    echo $skillCard, "\n";
                }

                ?>
            </div>
        </div>
    </div>

    <hr>

    <div class="row feed">
        <h2 style="text-align: center;">Áreas de atuação do projeto</h2>
        <div class="area">
            <div id="check" class="row row-cols-4 justify-content-center" style="text-align: left;">
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Artificial Intelligence" value="1" <?php echo ($proj->getAreaID($projectID, 1)[0] == "1") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Artificial Intelligence">
                        Artificial Intelligence
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Blockchain" value="5" <?php echo ($proj->getAreaID($projectID, 5)[0] == "5") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Blockchain">
                        Blockchain
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="cybersecurity" value="9" <?php echo ($proj->getAreaID($projectID, 9)[0] == "9") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="cybersecurity">
                        Cybersecurity
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Database Analytics" value="2" <?php echo ($proj->getAreaID($projectID, 2)[0] == "2") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Database Analytics">
                        Database Analytics
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Data Science" value="6" <?php echo ($proj->getAreaID($projectID, 6)[0] == "6") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Data Science">
                        Data Science
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Design" value="10" <?php echo ($proj->getAreaID($projectID, 10)[0] == "10") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Design">
                        Design
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Desktop Development" value="3" <?php echo ($proj->getAreaID($projectID, 3)[0] == "3") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Desktop Development">
                        Desktop Development
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="DevOps" value="7" <?php echo ($proj->getAreaID($projectID, 7)[0] == "7") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="DevOps">
                        DevOps
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id=" Mobile Development" value="11" <?php echo ($proj->getAreaID($projectID, 11)[0] == "11") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for=" Mobile Development">
                        Mobile Development
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Web - Back End" value="4" <?php echo ($proj->getAreaID($projectID, 4)[0] == "4") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Web - Back End">
                        Web - Back End
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Web - Front End" value="8" <?php echo ($proj->getAreaID($projectID, 8)[0] == "8") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Web - Front End">
                        Web - Front End
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Outros" value="12" <?php echo ($proj->getAreaID($projectID, 12)[0] == "12") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Outros">
                        Outros
                    </label>
                </div>
            </div>
            <br>
        </div>
    </div>

    <hr>

    <div class="row feed">
        <h2 style="text-align: center;">Informações gerais do projeto:</h2>
        <div class="col info">

            <div class="row input">
                <p class="col label">Nome:</p>
                <input type="text" class="col form-control" placeholder="<?php echo $project["Proj_name"]; ?>" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

            <div class="row input">
                <p class="col label">Início:</p>
                <input type="text" placeholder="<?php echo $project["Proj_start"]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

            <div class="row input">
                <p class="col label">Pag. p/ Hora:</p>
                <input type="text" placeholder="R$<?php echo  number_format($project["Proj_hourPay"], 2, '.', ''); ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

        </div>

        <div class="col info">


            <div class="row input">
                <p class="col label">Empresa:</p>
                <input type="text" placeholder="<?php echo $comp->getUser($id)[1]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>

                <form action="" method="post" class="col-1 toComp">
                    <input type="hidden" name="findComp" value="<?php echo $comp->getUser($id)[0]; ?>">
                    <button href="#" class="btn edit col" name="gotoComp"><i class="fa-solid fa-info"></i></button>
                </form>
            </div>

            <div class="row input">
                <p class="col label"> Fim:</p>
                <input type="text" placeholder="<?php echo $project["Proj_end"]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>

            </div>
            <div class="row input">
                <p class="col label">Horas p/ dia:</p>
                <input type="text" placeholder="<?php echo $project["Proj_time"]; ?> hora(s)" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

        </div>
    </div>
</div>