<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />


<div class="perfil">
    <center>
        <div class="row search">
            <h2 class="col">Editando perfil de <b><?php echo $comp->getUser($id)[6]; ?></b></h2>
        </div>

        <div class="row justify-content-center">

            <hr>
        </div>

        <form action="../functions/edit-profile.php" method="post" enctype="multipart/form-data">
            <div class="general-info">
                <h2 style="text-align: center;">Informações públicas:</h2>
                <div class="row high">
                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Usuário:</p>
                            <input type="text" value="<?php echo $comp->getUser($id)[6]; ?>" class="col form-control" name="username" id="" maxlength="25" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Empresa:</p>
                            <input type="text" value="<?php echo $comp->getUser($id)[1]; ?>" class="col form-control" name="office" id="" maxlength="25" minlength="5">
                        </div>
                    </div>

                    <div class="col">
                        <div class="row input">
                            <p class="col-1 label">Responsável:</p>
                            <input type="text" value="<?php echo $comp->getUser($id)[7]; ?>" class="col form-control" name="name" id="" minlength="5">

                        </div>

                        <div class="row input">
                            <p class="col-1 label"> Telefone:</p>
                            <input type="text" value="<?php echo $comp->getUser($id)[5]; ?>" class="col form-control" name="cell" id="" maxlength="25" minlength="5">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col input file">
                        <p class="col label">Foto de perfil:</p>
                        <label for="profile-pic" class="btn-select1">Selecionar imagem:<p id="image"></p></label>
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
                        <label for="banner-pic" class="btn-select1">Selecionar imagem:<p id="imagee"></p></label>
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

                <button class="btn-select1 btn-edit" type="submit" name="public"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
            </div>
        </form>

        <hr>

        <div class="general">
            <form action="../functions/edit-profile.php" method="post">
                <h2>Informações gerais:</h2>
                <div class="row feed" style="margin-bottom: 0;">
                    <div class="col info">

                        <div class="row input">
                            <p class="col label">Email:</p>
                            <input type="text" class="col form-control" name="email" id="" value="<?php echo $comp->getUser($id)[2]; ?>">

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
                        <textarea class="form-control desc" name="desc"><?php if (empty($comp->getUser($id)[10])) {
                                                                            echo "Olá! Sou novo no SEARCH DEVS&#8482;!";
                                                                        } else {
                                                                            echo $comp->getUser($id)[10];
                                                                        } ?></textarea>
                    </div>

                </div>
                <button class="btn-select1 btn-edit" type="submit" name="general"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
            </form>
            <hr>

            <div class="info2">
                <form action="../functions/edit-profile.php" method="post">
                    <h2 style="text-align: center;">Informações pessoais:</h2>
                    <div class="row">
                        <div class="col">
                            <div class="row input">
                                <p class="col-1 label"> CPF:</p>
                                <input type="text" value="<?php echo $comp->getUser($id)[8]; ?>" class="col form-control" name="CPF" id="" maxlength="25" minlength="5">
                            </div>
                        </div>

                        <div class="col">
                            <div class="row input">
                                <p class="col-1 label">Data de nascimento:</p>
                                <input type="text" value="<?php echo $comp->getUser($id)[9]; ?>" class="col form-control" name="born" id="" maxlength="25" minlength="5">

                            </div>
                        </div>
                    </div>
                    <div class="row input" style="padding: 2% 3%; margin: auto 2%;">
                        <p class="col-1 label"> CNPJ:</p>
                        <input type="text" value="<?php echo $comp->getUser($id)[4]; ?>" class="col form-control" name="CNPJ" id="" maxlength="25" minlength="5">
                    </div>
            </div>

            <button class="btn-select1 btn-edit" type="submit" name="personal"><i class="fa-solid fa-pen"></i> &nbsp; Editar informações</button>
            </form>
        </div>
    </center>
</div>