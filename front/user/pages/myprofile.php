<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />


<div class="perfil">
    <div id="feedperfil">
        <div id="profile_banner">
            <img class="banner" src="https://images.pexels.com/photos/60597/dahlia-red-blossom-bloom-60597.jpeg?cs=srgb&dl=pexels-pixabay-60597.jpg&fm=jpg" alt="">
            <div id="profile">
                <div class="profile_pic">
                    <img src="https://img.freepik.com/fotos-gratis/estilo-de-vida-beleza-e-moda-conceito-de-emocoes-de-pessoas-jovem-gerente-de-escritorio-feminino-asiatico-ceo-com-expressao-satisfeita-em-pe-sobre-um-fundo-branco-sorrindo-com-os-bracos-cruzados-sobre-o-peito_1258-59329.jpg" />
                </div>
                <div id="containerperfil">
                    <div id="align">
                        <h4><?php echo $user->getUser($username)[2]; ?></h4>

                        <form action="" method="post">
                            <button href="#" class="btn" name="edit"><i class="fa-solid fa-gear"></i></button>
                        </form>
                    </div>
                    <p><?php if (empty($user->getUser($username)[11])) {
                            echo "Nenhum cargo";
                        } else {
                            echo $user->getUser($username)[11];
                        } ?></p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="skills">
        <div class="row evaluation justify-content-between">

            <h2 style="font-weight:700" class="col">Habilidades:</h2>

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

                $skills = $user->getUserSkills($id)[0];

                foreach ($skills as $skill) {

                    $skillCard = "<span id='" . $skill['Skill_ID']. "' class='btn-level level-" . $skill['Skill_level'] . " skill-tag'><input type='hidden' name='level-" . $skill['Skill_level'] . "' value='" . $user->getNameSkills($skill['Skill_ID'])[0] . "'><input type='hidden' name='skill-" . $skill['Skill_level'] . "' value='" . $user->getNameSkills($skill['Skill_ID'])[0] . "'><input type='hidden' name='area' value='".$user->getAreaSkills($skill['Skill_ID'])[0]."'> " . $user->getNameSkills($skill['Skill_ID'])[0] . "</span>";

                    echo $skillCard, "\n";
                }
                
                ?>
            </div>
        </div>
    </div>

    <hr>

    <div class="row feed">
        <div class="col info">
            <h2>Informações:</h2>

            <div class="row input">
                <p class="col label">Nome:</p>
                <input type="text" placeholder="<?php echo $user->getUser($username)[1]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

            <div class="row input">
                <p class="col label"> Telefone:</p>
                <input type="text" placeholder="<?php echo $user->getUser($username)[5]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>

            </div>
            <div class="row input">
                <p class="col label">Email:</p>
                <input type="text" placeholder="<?php echo $user->getUser($username)[3]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

        </div>
        <div class="col description">
            <h2>Descrição do perfil:</h2>
            <p><?php if (empty($user->getUser($username)[11])) {
                    echo "Olá! Sou novo no SEARCH DEVS&#8482;!";
                } else {
                    echo $user->getUser($username)[11];
                } ?></p>
        </div>
    </div>
</div>