<link rel="stylesheet" type="text/css" href="../css/createproj.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />
<link rel="stylesheet" type="text/css" href="../css/level.css" />


<?php

require_once '../../back/class/project.php';

$proj = new Project();
$proj->conectar('search-devs_base', 'localhost', 'root', '');

$id = $proj->getProjID($_SESSION["id_user"]);

?>

<script src="../../js/evaluation.js"></script>

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
                    <input type="text" class="col form-control" value="" placeholder="R$ 00 • Preencha todos os campos" name="endValue" id="eValue" disabled>
                </div>
            </div>

            <br>

            <button class="btn-select1 btn-edit" type="submit" name="newProject"><i class="fa-solid fa-arrow-right"></i> &nbsp; Continuar</button>
        </form>
    </center>
</div>