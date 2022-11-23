<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />


<div class="perfil">
    <div id="feedperfil">
        <div id="profile_banner">
            <img class="banner" src="../../assets/<?php echo $user->findImage($search, 'banner')[0]; ?>" alt="">
            <div id="profile">
                <div class="profile_pic">
                    <img src="../../assets/<?php echo $user->findImage($search, 'profile')[0]; ?>" />
                </div>
                <div id="containerperfil">
                    <div id="align">
                        <h4><?php echo $user->getUser($search)[2]; ?></h4>
                    </div>
                    <p><?php if (empty($user->getUser($search)[11])) {
                            echo "Nenhum cargo";
                        } else {
                            echo $user->getUser($search)[11];
                        } ?></p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="skills">
        <div class="row evaluation justify-content-between">

            <h2 style="font-weight:700" class="col h2hab">Habilidades:</h2>

            <div class="level-options col">
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
            <br>
            <div class="show-skills">
                <?php

                $skills = $user->getUserSkills($search)[0];

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
        <h2 style="text-align: center;">Áreas de atuação de <?php echo $user->getUser($search)[2]; ?></h2>
        <div class="area">
            <div id="check" class="row row-cols-4 justify-content-center" style="text-align: left;">
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Artificial Intelligence" value="1" <?php echo ($user->getAreaID($search, 1)[0] == "1") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Artificial Intelligence">
                        Artificial Intelligence
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Blockchain" value="5" <?php echo ($user->getAreaID($search, 5)[0] == "5") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Blockchain">
                        Blockchain
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="cybersecurity" value="9" <?php echo ($user->getAreaID($search, 9)[0] == "9") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="cybersecurity">
                        Cybersecurity
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Database Analytics" value="2" <?php echo ($user->getAreaID($search, 2)[0] == "2") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Database Analytics">
                        Database Analytics
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Data Science" value="6" <?php echo ($user->getAreaID($search, 6)[0] == "6") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Data Science">
                        Data Science
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Design" value="10" <?php echo ($user->getAreaID($search, 10)[0] == "10") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Design">
                        Design
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Desktop Development" value="3" <?php echo ($user->getAreaID($search, 3)[0] == "3") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Desktop Development">
                        Desktop Development
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="DevOps" value="7" <?php echo ($user->getAreaID($search, 7)[0] == "7") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="DevOps">
                        DevOps
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id=" Mobile Development" value="11" <?php echo ($user->getAreaID($search, 11)[0] == "11") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for=" Mobile Development">
                        Mobile Development
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Web - Back End" value="4" <?php echo ($user->getAreaID($search, 4)[0] == "4") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Web - Back End">
                        Web - Back End
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Web - Front End" value="8" <?php echo ($user->getAreaID($search, 8)[0] == "8") ? "checked" : null; ?> disabled>
                    <label class="form-check-label" for="Web - Front End">
                        Web - Front End
                    </label>
                </div>
                <div class="col-4">
                    <input class="form-check-input" type="checkbox" name="area[]" id="Outros" value="12" <?php echo ($user->getAreaID($search, 12)[0] == "12") ? "checked" : null; ?> disabled>
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
        <div class="col info">
            <h2>Informações:</h2>

            <div class="row input">
                <p class="col label">Nome:</p>
                <input type="text" placeholder="<?php echo $user->getUser($search)[1]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

            <div class="row input">
                <p class="col label"> Telefone:</p>
                <input type="text" placeholder="<?php echo $user->getUser($search)[5]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>

            </div>
            <div class="row input">
                <p class="col label">Email:</p>
                <input type="text" placeholder="<?php echo $user->getUser($search)[3]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

        </div>
        <div class="col description">
            <h2>Descrição do perfil:</h2>
            <textarea class="form-control desc" name="desc" disabled><?php if (empty($user->getUser($search)[10])) {
                                                                echo "Olá! Sou novo no SEARCH DEVS&#8482;!";
                                                            } else {
                                                                echo $user->getUser($search)[10];
                                                            } ?></textarea>
        </div>
    </div>
</div>