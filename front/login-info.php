<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Desenvolvedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">

<style>
    * {
        color: #fff;
    }

    input {
        margin: 5% 0 !important;
    }

    .form-eye {
        margin: auto !important;
        background-color: #fff;
        padding: 4.1%;
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
                    <p>Informações de login.</p>

                    <div class="form">
                        <form action="register-login.php" class="needs-validation" novalidate method="POST">

                            <input type="text" placeholder="Nome de usuário" class="col form-control" name="" id="" maxlength="25" minlength="5" required>

                            <input type="email" placeholder="Email" class="col form-control" name="" id="" minlength="10" required>

                            <div class="input-group mb-3">
                                <input type="password" placeholder="Confirmar senha" class="form-control" name="" id="" minlength="8" required>
                                <a class="fa-solid fa-eye form-eye" id="basic-addon1" data-toggle-class="fa-eye, fa-eye-slash" data-target="#password_field" href="#" style="color: #001;">
                                </a>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" placeholder="Confirmar senha" class="form-control" name="" id="" minlength="8" required>
                                <a class="fa-solid fa-eye form-eye" id="basic-addon1" data-toggle-class="fa-eye, fa-eye-slash" data-target="#password_field" href="#" style="color: #001;">
                                </a>
                            </div>

                            <button type="submit" class="btn submit">Finalizar cadastro</button>
                        </form>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <?php require_once "footer.php" ?>

    <!-- Import JS Functions -->
    <script src="js/validate.js"></script>

</body>

</html>