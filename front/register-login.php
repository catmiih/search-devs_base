<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Desenvolvedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">

<style>
    * {
        color: #fff;
    }

    .form {
        width: 40vw !important;
    }

    .form-check {
        text-align: left;
    }

    .form button {
        margin: 3% 0;
    }

    .btn-eye {
        scale: 0.8;
    }


    @media (max-width: 800px) {
        .form-eye {
            margin: auto !important;
            background-color: #fff;
            padding: 5.5%;
        }

        .text {
            max-width: 90vw;
        }

        .form-check {
            padding: 0 15%;
            margin-left: auto;
            margin-right: auto;
        }

        .form-check input {
            margin: 6%;
            scale: 1.3;
        }
    }
</style>

<body>

    <div class="jumbvideo jumbvideo-fluid tag">
        <video autoplay="" muted="" loop="" id="banner">
            <source src="img/back_image.mp4" type="video/mp4" />
        </video>

        <div class="container text" style="width: 100vw; height: 100vh;">
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

                            <div class="col-xs-6">
                                <div class="input-group">
                                    <input type="password" placeholder="Senha" class="form-control" name="" id="pass" minlength="8" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-eye btn-default" id="Epass">
                                            <i class="fa-solid fa-eye" id="icon"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="input-group">
                                    <input type="password" placeholder="Confirmar senha" class="form-control" name="" id="confirmPass" minlength="8" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-eye btn-default" id="Cpass">
                                            <i class="fa-solid fa-eye iconC" id="icon"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="termos">
                                <label class="form-check-label" for="termos" style="margin: 0 1% 0 0;">
                                    Eu concordo com os
                                </label>
                                <a href="" style="font-weight: 700;">Termos de contrato SEARCH DEVS &#8482;</a>
                            </div>
                            <br>

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
                $('#icon').removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.setAttribute('type', 'password')
                $('#icon').removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });

        let confirm = document.querySelector('#Cpass');

        confirm.addEventListener('click', function() {
            let input = document.querySelector('#confirmPass')

            if (input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text')
                $('.iconC').removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.setAttribute('type', 'password')
                $('.iconC').removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    </script>
</body>

</html>