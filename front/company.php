<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Empreendedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">

<style>
    * {
        color: #fff;
    }

    .error {
        box-shadow: #FF0000 0px 0px 10px !important;
    }

    .error:focus {
        box-shadow: #FF0000 1px 1px 10px !important;
    }
</style>

<body>

    <div class="jumbvideo jumbvideo-fluid tag">
        <video autoplay="" muted="" loop="" id="banner">
            <source src="img/back_image.mp4" type="video/mp4" />
        </video>

        <div class="container text" style="width: 100%; height: 100vh;">
            <center>
                <div id="campo1">
                    <h1>Cadastre-se</h1>
                    <p>Seja bem vindo empreendedor. Preencha os campos abaixo:</p>

                    <div class="form">
                        <form action="complete-login.php" class="needs-validation" method="POST">
                        <input type="hidden" value="1" name="type_user">

                        <div class="row">
                                <input type="text" placeholder="Nome da empresa" onkeypress="onlyLetter()" class="col form-control" name="name" minlength="5" required>
                            </div>

                            <div class="row">
                                <input type="text" placeholder="Nome do responsável" onkeypress="onlyLetter()" class="col form-control" name="responsible" minlength="5" required>
                            </div>

                            <div class="row">
                                <input type="text" placeholder="Nascimento do responsável" class="col form-control" name="data" id="data" maxlength="10" minlength="10" onkeypress="date(this)" required>
                                <input type="text" placeholder="Telefone" class="col form-control" name="cell" maxlength="15" minlength="15" onkeypress="cellphone(this)" required>
                            </div>

                            <div class="row">
                                <input type="text" placeholder="CNPJ" class="col form-control" name="CNPJ" id="CNPJ" maxlength="18" minlength="18" onkeypress="cnpj(this)" required>
                                <input type="text" placeholder="CPF" class="col form-control" name="cpf" id="cpf" maxlength="14" minlength="14" onkeypress="ReadCpf(this)" required>
                            </div>

                            <br>
                            
                            <button type="button" class="btn submit" onclick="nextComp()">Continuar</button>

                    </div>
                </div>
                <?php require_once 'register-login.php' ?>
            </center>
        </div>
    </div>

    <?php require_once "footer.php" ?>

    <!-- Import JS Functions -->
    <script src="js/validate.js"></script>
    <script src="js/form.js"></script>
</body>

</html>