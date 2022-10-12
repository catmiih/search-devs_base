<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Desenvolvedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">

<style>
    * {
        color: #fff;
    }

    input,
    .input-group {
        margin: 0% 0 !important;
    }

    input {
        margin: 2% 0 !important;
    }

    .form button {
        margin: 3% 0;
    }

    .form-eye {
        margin: auto !important;
        background-color: #fff;
        padding: 4.1%;
    }

    @media (max-width: 800px) {
        .form-eye {
            margin: auto !important;
            background-color: #fff;
            padding: 5.5%;
        }
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
                        <form action="" class="needs-validation" novalidate method="POST">

                            <div class="input-group">
                                <input type="text" placeholder="Nome de usuário" class="col form-control" name="" id="" maxlength="25" minlength="5" required>
                            </div>

                            <div class="input-group">
                                <input type="email" placeholder="Email" class="col form-control" name="" id="" minlength="10" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" placeholder="Senha" class="form-control" name="" id="pass" minlength="8" required>
                                <a class="fa-solid fa-eye form-eye" id="Epass" data-toggle-class="fa-eye, fa-eye-slash" data-target="#password_field" href="#" style="color: #001;">
                                </a>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" placeholder="Confirmar senha" class="form-control" name="" id="confirmPass" minlength="8" required>
                                <a class="fa-solid fa-eye form-eye" id="Cpass" data-toggle-class="fa-eye, fa-eye-slash" data-target="#password_field" href="#" style="color: #001;">
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

    <script>
        let pass = document.querySelector('#Epass');

        pass.addEventListener('click', function() {
            let input = document.querySelector('#pass')

            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text')
            } else {
                input.setAttribute('type', 'password')
            }
        });

        let confirm = document.querySelector('#Cpass');

        confirm.addEventListener('click', function() {
            let input = document.querySelector('#confirmPass')

            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text')
            } else {
                input.setAttribute('type', 'password')
            }
        });
    </script>
</body>

</html>