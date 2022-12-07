<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/details.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />

<style>
    .description {
        height: 30rem;
    }
</style>

<?php
require_once '../../back/class/project.php';

$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');

$projects = $proj->readProj($projID)[0][0];
$time = 0;

$proj_ID = $projects['Proj_ID'];
$proj_name = $projects['Proj_name'];
$proj_desc = $projects['Proj_desc'];
$proj_time = $projects['Proj_time'];
$proj_start = $projects['Proj_start'];
$proj_end = $projects['Proj_end'];
$proj_hourPay = $projects['Proj_hourPay'];
$proj_pay = $projects['Proj_ID'];
$proj_comp = $projects['Proj_comp'];

?>

<div class="perfil">
    <center>
        <div class="row search">
            <h2 class="col">Editando o projeto <b><?php echo $proj_name; ?></b></h2>
        </div>

        <div class="row justify-content-center">

            <hr>
        </div>

        <form action="../functions/editproj.php" method="post">

            <input type="hidden" name="projID" value="<?php echo $proj_ID; ?>">
            <div class="general-info">
                <div class="input row" style="margin: 0!important;">
                    <p class="col-1 label text-create">Nome do projeto:</p>
                    <input type="text" class="col form-control text-create" name="nameProj" value="<?php echo $proj_name; ?>" id="username" maxlength="25" minlength="5">
                </div>
                <div class="row high">
                    <div class="col">
                        <div class="row input crate-text">
                            <p class="col-1 label text-create"> Data de início:</p>
                            <input type="date" class="col form-control text-create" name="start" value="<?php echo $proj_start; ?>" id="start">
                        </div>

                        <div class="row input crate-text">
                            <p class="col-1 label text-create"> Valor por hora:</p>
                            <input type="text" class="col form-control text-create" name="vHour" value="<?php echo $proj_hourPay; ?>" id="vHour" placeholder="15">
                        </div>
                    </div>

                    <div class="col">

                        <div class="row input crate-text">
                            <p class="col-1 label text-create"> Data final:</p>
                            <input type="date" class="col form-control text-create" name="end" value="<?php echo $proj_end; ?>" id="end">
                        </div>

                        <div class="row input crate-text">
                            <p class="col-1 label text-create">Horas por dia:</p>
                            <input type="text" class="col form-control text-create" placeholder="2" name="dHour" value="<?php echo $proj_time; ?>" id="hour" minlength="1" maxlength="2">
                        </div>

                    </div>
                </div>

                <div class="col description input create-description" style="padding: 5%!important">
                    <h2 class="text-create">Descrição do perfil:</h2>
                    <textarea class="form-control desc" name="descProj"><?php echo $proj_desc; ?></textarea>
                </div>


                <hr>

                <div class="area" style="margin: 0;">
                    <h2 class="title">Áreas de atuação</h2>
                    <div class="area">
                        <div id="check" class="row row-cols-4 justify-content-center" style="text-align: left;">
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Artificial Intelligence" value="1" <?php echo ($proj->getAreaID($projID, 1)[0] == "1") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Artificial Intelligence">
                                    Artificial Intelligence
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Blockchain" value="5" <?php echo ($proj->getAreaID($projID, 5)[0] == "5") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Blockchain">
                                    Blockchain
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="cybersecurity" value="9" <?php echo ($proj->getAreaID($projID, 9)[0] == "9") ? "checked" : null; ?>>
                                <label class="form-check-label" for="cybersecurity">
                                    Cybersecurity
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Database Analytics" value="2" <?php echo ($proj->getAreaID($projID, 2)[0] == "2") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Database Analytics">
                                    Database Analytics
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Data Science" value="6" <?php echo ($proj->getAreaID($projID, 6)[0] == "6") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Data Science">
                                    Data Science
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Design" value="10" <?php echo ($proj->getAreaID($projID, 10)[0] == "10") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Design">
                                    Design
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Desktop Development" value="3" <?php echo ($proj->getAreaID($projID, 3)[0] == "3") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Desktop Development">
                                    Desktop Development
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="DevOps" value="7" <?php echo ($proj->getAreaID($projID, 7)[0] == "7") ? "checked" : null; ?>>
                                <label class="form-check-label" for="DevOps">
                                    DevOps
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Mobile Development" value="11" <?php echo ($proj->getAreaID($projID, 11)[0] == "11") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Mobile Development">
                                    Mobile Development
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Web - Back End" value="4" <?php echo ($proj->getAreaID($projID, 4)[0] == "4") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Web - Back End">
                                    Web - Back End
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Web - Front End" value="8" <?php echo ($proj->getAreaID($projID, 8)[0] == "8") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Web - Front End">
                                    Web - Front End
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="area[]" id="Outros" value="12" <?php echo ($proj->getAreaID($projID, 12)[0] == "12") ? "checked" : null; ?>>
                                <label class="form-check-label" for="Outros">
                                    Outros
                                </label>
                            </div>
                        </div>
                        <br>
                    </div>

                </div>
            </div>
            <hr>

            <div class="col-6">
                <div class="row input value-div">
                    <p class="col-1 label text-create"> Valor final:</p>
                    <input type="text" class="col form-control eValue text-create" placeholder="R$ 00 • Preencha todos os campos" name="evaluation" id="showValue" disabled>
                </div>

                <input type="hidden" id="eValue" class="eValue" name="eValue">
            </div>

            <button class="btn-select1 btn-edit" type="submit" name="newProject"><i class="fa-solid fa-arrow-right"></i> &nbsp; Continuar</button>

        </form>

        <hr>

        <div class="skills">
            <div class="row evaluation justify-content-between edit-evaluation">

                <h2 style="font-weight:700; margin-top: 2.45%;" class="col">Habilidades:</h2>

                <div class="level-options col level-edit">
                    <p style="margin: 1%;">Nível:</p>
                    <label>
                        <button class="btn-select btn-level level-1 selected show" id="level-1" type="button">1</button>
                    </label>
                    <label>
                        <button class="show btn-select btn-level level-2 selected" id="level-2" type="button">2</button>
                    </label>

                    <label>
                        <button class="show btn-select btn-level level-3 selected" id="level-3" type="button">3</button>
                    </label>

                    <label>
                        <button class="show btn-select btn-level level-4 selected" id="level-4" type="button">4</button>
                    </label>
                    <label>
                        <button class="show btn-select btn-level level-5 selected" id="level-5" type="button">5</button>
                    </label>
                </div>

                <div class="col">
                    <a class="btn-select1 btn btn-edit1" href="skills.php?idproject=<?php echo $proj_ID; ?>" style="padding: 5%;">Editar skills</a>
                </div>
                <br>
                <div class="show-skills">
                    <?php

                    $skills = $proj->getProjSkills($projID)[0];

                    foreach ($skills as $skill) {

                        $skillCard = "<span id='" . $skill['Skill_ID'] . "' class='btn-level level-" . $skill['Skill_level'] . " skill-tag'><input type='hidden' name='level-" . $skill['Skill_level'] . "' value='" . $skill['Skill_level'] . "'><input type='hidden' name='skill-" . $skill['Skill_level'] . "' value='" . $skill['Skill_ID'] . "'><input type='hidden' name='area' value='" . $user->getAreaSkills($skill['Skill_ID'])[0] . "'> " . $user->getNameSkills($skill['Skill_ID'])[0] . "</span>";

                        echo $skillCard, "\n";
                    }

                    ?>
                </div>
            </div>

            <form action="" method="post">
                <button class="btn-select1 btn-edit btn-edit-cell btn-cell" type="submit" name="excProj"><i class="fa-solid fa-trash"></i> &nbsp; Excluir projeto</button>
            </form>
        </div>
    </center>

</div>

<script>
    $(document).ready(function() {

        $("#username,#start,#vHour,#hour,#end").on('keyup', function() {

            var pHour = parseFloat($('#vHour').val()) || 0;
            var hDay = parseFloat($('#hour').val()) || 0;

            var d1 = $('#start').val();
            var d2 = $('#end').val();

            var calcDay = new Date(d2) - new Date(d1);
            if (calcDay == null) {
                calcDay = 0
            }
            var days = calcDay / (1000 * 60 * 60 * 24);

            var endValue = (pHour * hDay) * days;

            /* Verify Checkbox */

            if (document.getElementById('Artificial Intelligence').checked) {
                endValue += 59.99;
            }

            if (document.getElementById('Blockchain').checked) {
                endValue += 79.99;
            }

            if (document.getElementById('cybersecurity').checked) {
                endValue += 20;
            }

            if (document.getElementById('Database Analytics').checked) {
                endValue += 69.99;
            }

            if (document.getElementById('Data Science').checked) {
                endValue += 179.99;
            }

            if (document.getElementById('Design').checked) {
                endValue += 79.99;
            }

            if (document.getElementById('Desktop Development').checked) {
                endValue += 99.99;
            }

            if (document.getElementById('DevOps').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Mobile Development').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Web - Back End').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Web - Front End').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Outros').checked) {
                endValue += 14.99;
            }

            if (!!pHour && !!hDay && !!d1 && !!d2) {
                $('.eValue').val(endValue.toFixed(2));
                $('#showValue').val('R$ ' + endValue.toFixed(2));
            }
        });

        $(".form-check-input, form-check-label").on('click', function() {

            var pHour = parseFloat($('#vHour').val()) || 0;
            var hDay = parseFloat($('#hour').val()) || 0;

            var d1 = $('#start').val();
            var d2 = $('#end').val();

            var calcDay = new Date(d2) - new Date(d1);
            if (calcDay == null) {
                calcDay = 0
            }
            var days = calcDay / (1000 * 60 * 60 * 24);

            var endValue = (pHour * hDay) * days;

            /* Verify Checkbox */

            if (document.getElementById('Artificial Intelligence').checked) {
                endValue += 59.99;
            }

            if (document.getElementById('Blockchain').checked) {
                endValue += 79.99;
            }

            if (document.getElementById('cybersecurity').checked) {
                endValue += 20;
            }

            if (document.getElementById('Database Analytics').checked) {
                endValue += 69.99;
            }

            if (document.getElementById('Data Science').checked) {
                endValue += 179.99;
            }

            if (document.getElementById('Design').checked) {
                endValue += 79.99;
            }

            if (document.getElementById('Desktop Development').checked) {
                endValue += 99.99;
            }

            if (document.getElementById('DevOps').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Mobile Development').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Web - Back End').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Web - Front End').checked) {
                endValue += 14.99;
            }

            if (document.getElementById('Outros').checked) {
                endValue += 14.99;
            }

            if (!!pHour && !!hDay && !!d1 && !!d2) {
                $('.eValue').val(endValue.toFixed(2));
                $('#showValue').val('R$ ' + endValue.toFixed(2));
            }
        });
    });
</script>