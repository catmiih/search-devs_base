<link rel="stylesheet" type="text/css" href="../css/createproj.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />
<link rel="stylesheet" type="text/css" href="../css/level.css" />


<div class="create-project">
    <center>
        <div class="row search">
            <h2 class="col-6">Criar Projeto:</h2>
        </div>
        <div class="row justify-content-center">
            <hr>
        </div>
        <form action="" method="post">
            <div class="general-info">
                <div class="row high">
                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Nome do projeto:</p>
                            <input type="text" class="col form-control" name="username" placeholder="Site de vendas" id="" maxlength="25" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Data de início:</p>
                            <input type="date" class="col form-control" name="office" id="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Horas por dia:</p>
                            <input type="text" class="col form-control" placeholder="2" name="name" id="" minlength="1" maxlength="2">
                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Data final:</p>
                            <input type="date" class="col form-control" name="cell" id="">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <hr>

        <div class="area">
            <form class="select-skill" action="../functions/edit-profile.php" method="post">

                <h2>Áreas de atuação</h2>
                <div class="area">
                    <div id="check" class="row row-cols-4 justify-content-center" style="text-align: left;">
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Artificial Intelligence" value="1" <?php echo ($user->getAreaID($id, 1)[0] == "1") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Artificial Intelligence">
                                Artificial Intelligence
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Blockchain" value="5" <?php echo ($user->getAreaID($id, 5)[0] == "5") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Blockchain">
                                Blockchain
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="cybersecurity" value="9" <?php echo ($user->getAreaID($id, 9)[0] == "9") ? "checked" : null; ?>>
                            <label class="form-check-label" for="cybersecurity">
                                Cybersecurity
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Database Analytics" value="2" <?php echo ($user->getAreaID($id, 2)[0] == "2") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Database Analytics">
                                Database Analytics
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Data Science" value="6" <?php echo ($user->getAreaID($id, 6)[0] == "6") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Data Science">
                                Data Science
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Design" value="10" <?php echo ($user->getAreaID($id, 10)[0] == "10") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Design">
                                Design
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Desktop Development" value="3" <?php echo ($user->getAreaID($id, 3)[0] == "3") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Desktop Development">
                                Desktop Development
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="DevOps" value="7" <?php echo ($user->getAreaID($id, 7)[0] == "7") ? "checked" : null; ?>>
                            <label class="form-check-label" for="DevOps">
                                DevOps
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id=" Mobile Development" value="11" <?php echo ($user->getAreaID($id, 11)[0] == "11") ? "checked" : null; ?>>
                            <label class="form-check-label" for=" Mobile Development">
                                Mobile Development
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Web - Back End" value="4" <?php echo ($user->getAreaID($id, 4)[0] == "4") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Web - Back End">
                                Web - Back End
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Web - Front End" value="8" <?php echo ($user->getAreaID($id, 8)[0] == "8") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Web - Front End">
                                Web - Front End
                            </label>
                        </div>
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="area[]" id="Outros" value="12" <?php echo ($user->getAreaID($id, 12)[0] == "12") ? "checked" : null; ?>>
                            <label class="form-check-label" for="Outros">
                                Outros
                            </label>
                        </div>
                    </div>
                    <br>
                </div>
            </form>
        </div>

        <hr>

        <div class="skills">
            <div class="row evaluation justify-content-between">

                <h2 style="font-weight:700" class="col">Habilidades:</h2>

                <div class="level-options col-5">
                    <p>Nível:</p>
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

                <div class="col-3">
                    <a class="btn-select1 btn" href="skills.php" style="padding: 5%;">Editar skills</a>
                </div>
                <br>
                <div class="show-skills">
                    <?php

                    $skills = $user->getUserSkills($id)[0];

                    foreach ($skills as $skill) {

                        $skillCard = "<span id='" . $skill['Skill_ID'] . "' class='btn-level level-" . $skill['Skill_level'] . " skill-tag'><input type='hidden' name='level-" . $skill['Skill_level'] . "' value='" . $skill['Skill_level'] . "'><input type='hidden' name='skill-" . $skill['Skill_level'] . "' value='" . $skill['Skill_ID'] . "'><input type='hidden' name='area' value='" . $user->getAreaSkills($skill['Skill_ID'])[0] . "'> " . $user->getNameSkills($skill['Skill_ID'])[0] . "</span>";

                        echo $skillCard, "\n";
                    }

                    ?>
                </div>
            </div>
        </div>

        <br>

        <button disabled class="btn-select1 btn-edit" type="submit" name="newProject"><i class="fa-solid fa-plus"></i> &nbsp; Criar projeto</button>

    </center>
</div>