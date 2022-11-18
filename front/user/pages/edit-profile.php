<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />


<div class="perfil">


    <center>

        <div class="row search">
            <h2 class="col">Editando perfil de <b><?php echo $user->getUser($username)[2]; ?></b></h2>
        </div>

        <div class="row justify-content-center">

            <hr>
        </div>

        <form action="" name="personal" method="post">
            <div class="general-info">
                <h2>Informações pessoais:</h2>
                <div class="row input">
                    <p class="col-1 label">Nome de usuário:</p>
                    <input type="text" value="<?php echo $user->getUser($username)[2]; ?>" class="col form-control" name="" id="" maxlength="25" minlength="5">

                </div>

                <div class="row input">
                    <p class="col-1 label"> Cargo atual:</p>
                    <input type="text" value="<?php if (empty($user->getUser($username)[11])) {
                                                    echo "Nenhum cargo";
                                                } else {
                                                    echo $user->getUser($username)[11];
                                                } ?>" class="col form-control" name="" id="" maxlength="25" minlength="5">
                </div>
                <div class="row">
                    <div class="col input file">
                        <p class="col label">Foto de perfil:</p>
                        <label for="profile-pic" class="btn">Selecionar imagem:<p id="image"></p></label>
                        <input type="file" name="" class="d-none" id="profile-pic">

                        <script>
                            let input = document.getElementById("profile-pic");
                            let imageName = document.getElementById("image")

                            input.addEventListener("change", () => {
                                let inputImage = document.querySelector("input[type=file]").files[0];

                                imageName.innerText = inputImage.name;
                            })
                        </script>
                    </div>

                    <div class="col input file">
                        <p class="col label">Foto de capa:</p>
                        <label for="banner-pic" class="btn">Selecionar imagem:<p id="image2"></p></label>
                        <input type="file" name="" class="d-none" id="banner-pic">

                        <script>
                            let input = document.getElementById("banner-pic");
                            let imageName = document.getElementById("image2")

                            input.addEventListener("change", () => {
                                let inputImage = document.querySelector("input[type=file]").files[0];

                                imageName.innerText = inputImage.name;
                            })
                        </script>
                    </div>
                </div>

                <button class="btn btn-edit"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
            </div>
        </form>

        <hr>

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

                <div class="col">
                    <a class="btn" href="skills.php" style="padding: 5%;">Editar skills</a>
                </div>
                <br>
                <div class="show-skills">
                    <?php

                    $skills = $user->getUserSkills($id)[0];

                    foreach ($skills as $skill) {

                        $skillCard = "<span id='" . $skill['Skill_ID'] . "' class='btn-level level-" . $skill['Skill_level'] . " skill-tag'><input type='hidden' name='level-" . $skill['Skill_level'] . "' value='" . $user->getNameSkills($skill['Skill_ID'])[0] . "'><input type='hidden' name='skill-" . $skill['Skill_level'] . "' value='" . $user->getNameSkills($skill['Skill_ID'])[0] . "'><input type='hidden' name='area' value='" . $user->getAreaSkills($skill['Skill_ID'])[0] . "'> " . $user->getNameSkills($skill['Skill_ID'])[0] . "</span>";

                        echo $skillCard, "\n";
                    }

                    ?>
                </div>
            </div>
        </div>

        <hr>

        <form action="" name="public" method="post">
            <div class="row feed">
                <div class="col info">


                    <h2>Informações públicas:</h2>

                    <div class="row input">
                        <p class="col label">Nome:</p>
                        <input type="text" class="col form-control" name="" id="" value="<?php echo $user->getUser($username)[1]; ?>" disabled>


                    </div>

                    <div class="row input">
                        <p class="col label">Telefone:</p>
                        <input type="text" value="<?php echo $user->getUser($username)[5]; ?>" class="col form-control" name="" id="" disabled>


                    </div>
                    <div class="row input">
                        <p class="col label">Email:</p>
                        <input type="text" value="<?php echo $user->getUser($username)[3]; ?>" class="col form-control" name="" id="" disabled>


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
            <button class="btn btn-edit"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
        </form>
    </center>
</div>