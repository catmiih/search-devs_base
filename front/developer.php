<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Desenvolvedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">

<style>
    * {
        color: #fff;
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
                    <p>Bem vindo, desenvolvedor. Preencha os campos.</p>

                    <div class="form">
                        <form action="complete-login.php" class="needs-validation" method="POST">

                            <input type="hidden" value="0" name="type_user">

                            <div class="row">
                                <input type="text" placeholder="Nome Completo" class="col form-control" name="name" minlength="5" required>
                            </div>

                            <div class="row">
                                <input type="text" placeholder="Data de Nascimento" class="col form-control" name="born" id="data" maxlength="10" minlength="10" onkeypress="date(this)" required>
                                <input type="text" placeholder="Telefone" class="col form-control" name="cell" maxlength="15" minlength="15" onkeypress="cellphone(this)" required>
                            </div>

                            <div class="row">
                                <input type="text" placeholder="CEP" class="col form-control" name="cep" id="cep" maxlength="9" minlength="9" onkeypress="CEP(this)" required>
                                <input type="text" placeholder="CPF" class="col form-control" name="cpf" id="cpf" maxlength="14" minlength="14" onkeypress="ReadCpf(this)" required>
                                <br><br>
                                <div class="row radio">
                                    <p class="col">Sexo:</p>

                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="Sex-Select" id="Female" value="F">
                                        <label class="form-check-label" for="Female">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="Sex-Select" id="Male" value="M" checked>
                                        <label class="form-check-label" for="Male">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="Sex-Select" id="Other" value="O">
                                        <label class="form-check-label" for="Other">
                                            Outro
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button type="button" class="btn submit" onclick="next()">Continuar</button>
                        
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