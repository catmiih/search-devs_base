<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Desenvolvedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/login-info.css">

<body>
    <div class="jumbvideo jumbvideo-fluid tag">
        <video autoplay="" muted="" loop="" id="banner">
            <source src="img/back_image.mp4" type="video/mp4" />
        </video>

        <div class="container text" style="width: 100%; height: 100vh;">
            <center>
                <div id="campo1">
                    <h1>Acessar conta</h1>
                    <p>Bem vindo novamente, faça seu login.</p>

                    <div class="form">
                        <form action="functions/connect.php" method="POST">

                            <div class="input-group">
                                <input type="text" placeholder="Usuário ou Email" class="col form-control" name="usermail" id="" maxlength="25" minlength="5" required>
                            </div>

                            <div class="col-xs-6">
                                <div class="input-group">
                                    <input type="password" placeholder="Senha" class="form-control" name="pass" id="" minlength="8" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-eye btn-default" id="Epass">
                                            <i class="fa-solid fa-eye" id="icon"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            <a href="" class="forget">Esqueci minha senha</a>
                            <br>

                            <button type="submit" class="btn submit">ENTRAR</button>
                            <p>Ainda não tem conta? <a href="register.php" style="font-weight: 700">Cadastre-se</a></p>
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
                $('#icon').removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.setAttribute('type', 'password')
                $('#icon').removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    </script>
</body>

</html>