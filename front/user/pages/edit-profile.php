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

        <form action="../functions/edit-profile.php" method="post" enctype="multipart/form-data">
            <div class="general-info">
                <h2 style="text-align: center;">Informações públicas:</h2>
                <div class="row">
                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Nome de usuário:</p>
                            <input type="text" value="<?php echo $user->getUser($username)[2]; ?>" class="col form-control" name="username" id="" maxlength="25" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Cargo atual:</p>
                            <input type="text" value="<?php if (empty($user->getUser($username)[11])) {
                                                            echo "Nenhum cargo";
                                                        } else {
                                                            echo $user->getUser($username)[11];
                                                        } ?>" class="col form-control" name="office" id="" maxlength="25" minlength="5">
                        </div>
                    </div>

                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Nome:</p>
                            <input type="text" value="<?php echo $user->getUser($username)[1]; ?>" class="col form-control" name="name" id="" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Telefone:</p>
                            <input type="text" value="<?php echo $user->getUser($username)[5]; ?>" class="col form-control" name="cell" id="" maxlength="25" minlength="5">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col input file">
                        <p class="col label">Foto de perfil:</p>
                        <label for="profile-pic" class="btn">Selecionar imagem:<p id="image"></p></label>
                        <input type="file" name="profile" class="d-none" id="profile-pic">

                        <script>
                            let input = document.getElementById("profile-pic");
                            let imageName = document.getElementById("image")

                            input.addEventListener("change", () => {
                                let inputImage = document.querySelector("input[name='profile']").files[0];

                                imageName.innerText = inputImage.name;
                            })
                        </script>
                    </div>

                    <div class="col input file">
                        <p class="col label">Foto de banner:</p>
                        <label for="banner-pic" class="btn">Selecionar imagem:<p id="imagee"></p></label>
                        <input type="file" name="banner" class="d-none" id="banner-pic">

                        <script>
                            let input2 = document.getElementById("banner-pic");
                            let imageName2 = document.getElementById("imagee")

                            input2.addEventListener("change", () => {
                                let inputImage2 = document.querySelector("input[id='banner-pic']").files[0];

                                imageName2.innerText = inputImage2.name;
                            })
                        </script>
                    </div>
                </div>

                <button class="btn btn-edit" type="submit" name="public"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
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

                        $skillCard = "<span id='" . $skill['Skill_ID'] . "' class='btn-level level-" . $skill['Skill_level'] . " skill-tag'><input type='hidden' name='level-" . $skill['Skill_level'] . "' value='" . $skill['Skill_level'] . "'><input type='hidden' name='skill-" . $skill['Skill_level'] . "' value='" . $skill['Skill_ID'] . "'><input type='hidden' name='area' value='" . $user->getAreaSkills($skill['Skill_ID'])[0] . "'> " . $user->getNameSkills($skill['Skill_ID'])[0] . "</span>";

                        echo $skillCard, "\n";
                    }

                    ?>
                </div>
            </div>
        </div>

        <hr>

        <form action="../functions/edit-profile.php" method="post">

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
            <button class="btn btn-edit" type="submit"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
        </form>

        <hr>

        <form action="../functions/edit-profile.php" method="post">
            <h2>Informações gerais:</h2>
            <div class="row feed" style="margin-bottom: 0;">
                <div class="col info">

                    <div class="row input">
                        <p class="col label">Email:</p>
                        <input type="text" class="col form-control" name="email" id="" value="<?php echo $user->getUser($username)[3]; ?>">

                    </div>
                    <br>
                    <h4>Editar senha</h4>
                    <div class="row input">
                        <p class="col-4 label">Senha atual:</p>
                        <input type="password" placeholder="•••" class="col form-control" name="pass" id="">


                    </div>
                    <div class="row input">
                        <p class="col-4 label">Nova senha:</p>
                        <input type="password" placeholder="•••" class="col form-control" name="newpass" id="">


                    </div>

                </div>
                <div class="col description">
                    <h2>Descrição do perfil:</h2>
                    <textarea class="form-control desc" name="desc"><?php if (empty($user->getUser($username)[10])) {
                                                                        echo "Olá! Sou novo no SEARCH DEVS&#8482;!";
                                                                    } else {
                                                                        echo $user->getUser($username)[10];
                                                                    } ?></textarea>
                </div>

            </div>
            <button class="btn btn-edit" type="submit" name="general"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
        </form>
        <hr>

        <div class="info2">
            <form action="../functions/edit-profile.php" method="post">
                <h2 style="text-align: center;">Informações pessoais:</h2>
                <div class="row">
                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">CEP:</p>
                            <input type="text" value="<?php echo $user->getUser($username)[6]; ?>" class="col form-control" name="CEP" id="" maxlength="25" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label"> CPF:</p>
                            <input type="text" value="<?php echo $user->getUser($username)[7]; ?>" class="col form-control" name="CPF" id="" maxlength="25" minlength="5">
                        </div>
                    </div>

                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Data de nascimento:</p>
                            <input type="text" value="<?php echo $user->getUser($username)[8]; ?>" class="col form-control" name="born" id="" maxlength="25" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label">Sexo:</p>
                            <div class="row radio" style="margin: 2% 5%;">
                                <div class="form-check col-3">
                                    <input class="form-check-input" type="radio" name="Sex-Select" id="Female" value="F" <?php echo ($user->getUser($username)[9] == "F") ? "checked" : null; ?>>
                                    <label class="form-check-label" for="Female">
                                        Fem.
                                    </label>
                                </div>
                                <div class="form-check col-3">
                                    <input class="form-check-input" type="radio" name="Sex-Select" id="Male" value="M" <?php echo ($user->getUser($username)[9] == "M") ? "checked" : null; ?>>
                                    <label class="form-check-label" for="Male">
                                        Masc.
                                    </label>
                                </div>
                                <div class="form-check col-3">
                                    <input class="form-check-input" type="radio" name="Sex-Select" id="Other" value="O" <?php echo ($user->getUser($username)[9] == "O") ? "checked" : null; ?>>
                                    <label class="form-check-label" for="Other">
                                        Outro
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <button class="btn btn-edit" type="submit" name="personal"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
        </form>
    </center>
</div>