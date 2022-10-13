<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Registre-se como Desenvolvedor</title>
<?php require_once "menu.php" ?>
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/level.css">

<style>
    * {
        color: #fff;
    }

    #campo1 h1 {
        font-size: 3rem;
        font-weight: 700;
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
                    <h1>Finalização de Cadastro</h1>
                    <h2>Bem vindo, desenvolvedor.</h2>
                    <p>Por favor, selecione sua(s) habilidades:</p>
                </div>
                <form action="register-login">
                    <div id="form">
                        <input class="col form-control skill" type="text" name="" placeholder="Ex: HTML5" style="margin-right: 2%;">
                        <input class="col form-control skill" list="datalistOptions" id="exampleDataList" placeholder="Área de Atuação">
                        <datalist id="datalistOptions">
                            <option value="Artificial Intelligence">
                            <option value="IMPLEMENTAR AS AREAS COM O BACKEND <3">
                        </datalist>

                        <p style="margin: 5px;">Nível:</p>
                        <button class="btn-select btn-level level-1">1</button>
                        <button class="btn-select btn-level level-2">2</button>
                        <button class="btn-select btn-level level-3">3</button>
                        <button class="btn-select btn-level level-4">4</button>
                        <button class="btn-select btn-level level-5">5</button>

                        <button type="button" class="btn-select btn-level btn">+</button>
                    </div>
                    <br><br>
                    <div class="row">
                        <input value="1" type="hidden"><span class="btn-level level-1">JAVA SCRIPT NOME MT</span></input>

                    </div>
                    <br>
                    <button type="submit" class="btn" style="padding: 2% 10%;">Começar agora</button>
                </form>
            </center>
        </div>

    </div>

    <?php require_once "footer.php" ?>

    <!-- Import JS Functions -->
    <script src="js/validate.js"></script>

</body>

</html>