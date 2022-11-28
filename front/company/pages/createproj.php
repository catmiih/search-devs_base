<link rel="stylesheet" type="text/css" href="../css/createproj.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />
<link rel="stylesheet" type="text/css" href="../css/level.css" />


<?php

require_once '../../back/class/project.php';

$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');

$id = $proj->getProjID($_SESSION["id_user"]);

?>

<div class="create-project">
    <center>
        <div class="row search">
            <h2 class="col-6">Criar Projeto:</h2>
        </div>
        <div class="row justify-content-center">
            <hr>
        </div>
        <form action="../functions/createproj.php" method="post">
            <div class="general-info">
                <div class="input row" style="margin: 0!important;">
                    <p class="col-1 label">Nome do projeto:</p>
                    <input type="text" class="col form-control" name="nameProj" placeholder="Site de vendas" id="username" maxlength="25" minlength="5">
                </div>
                <div class="row high">
                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label"> Data de início:</p>
                            <input type="date" class="col form-control" name="start" id="start">
                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Valor por hora:</p>
                            <input type="text" class="col form-control" name="vHour" id="vHour" placeholder="15">
                        </div>
                    </div>

                    <div class="col">

                        <div class="row input">
                            <p class="col-1 label"> Data final:</p>
                            <input type="date" class="col form-control" name="end" id="end">
                        </div>

                        <div class="row input">
                            <p class="col-1 label">Horas por dia:</p>
                            <input type="text" class="col form-control" placeholder="2" name="dHour" id="hour" minlength="1" maxlength="2">
                        </div>

                    </div>
                </div>

                <div class="col description input">
                    <h2>Descrição do perfil:</h2>
                    <textarea class="form-control desc" name="descProj"><?php if (empty($proj->readProj($id)[0]['Proj_desc'])) {
                                                                        echo "Esse é meu novo projeto!";
                                                                    } else {
                                                                        echo$proj->readProj($id)[0]['Proj_desc'];
                                                                    } ?></textarea>
                </div>
            </div>


            <hr>

            <div class="area">
                <h2>Áreas de atuação</h2>
                <div class="area">
                    <div id="check" class="row row-cols-4 justify-content-center" style="text-align: left;">
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Artificial Intelligence" value="1">
                            <label class="form-check-label" for="Artificial Intelligence">
                                Artificial Intelligence
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Blockchain" value="5">
                            <label class="form-check-label" for="Blockchain">
                                Blockchain
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="cybersecurity" value="9">
                            <label class="form-check-label" for="cybersecurity">
                                Cybersecurity
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Database Analytics" value="2">
                            <label class="form-check-label" for="Database Analytics">
                                Database Analytics
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Data Science" value="6">
                            <label class="form-check-label" for="Data Science">
                                Data Science
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Design" value="10">
                            <label class="form-check-label" for="Design">
                                Design
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Desktop Development" value="3">
                            <label class="form-check-label" for="Desktop Development">
                                Desktop Development
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="DevOps" value="7">
                            <label class="form-check-label" for="DevOps">
                                DevOps
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Mobile Development" value="11">
                            <label class="form-check-label" for="Mobile Development">
                                Mobile Development
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Web - Back End" value="4">
                            <label class="form-check-label" for="Web - Back End">
                                Web - Back End
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Web - Front End" value="8">
                            <label class="form-check-label" for="Web - Front End">
                                Web - Front End
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Outros" value="12">
                            <label class="form-check-label" for="Outros">
                                Outros
                            </label>
                        </div>
                    </div>
                    <br>
                </div>

            </div>

            <hr>

            <div class="col-6">
                <div class="row input">
                    <p class="col-1 label"> Valor final:</p>
                    <input type="text" class="col form-control" value="R$ 00 • Preencha todos os campos" name="eValue" id="eValue" disabled>
                </div>
            </div>

            <br>

            <button class="btn-select1 btn-edit" type="submit" name="newProject"><i class="fa-solid fa-arrow-right"></i> &nbsp; Continuar</button>
        </form>
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
                $('#eValue').val('R$ ' + endValue.toFixed(2));
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
                $('#eValue').val('R$ ' + endValue.toFixed(2));
            }
        });
    });
</script>