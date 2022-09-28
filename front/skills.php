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
                    <h1>Finalizar Cadastro</h1>
                    <h2>Bem vindo, desenvolvedor.</h2>
                    <p>Por favor, selecione sua(s) área(s) de atuação:</p>
                    <div class="checkbox">
                            <div class="row">
                                <div class="col">
                                    <input class="form-check-input" type="checkbox" name="Skills" id="Web - Front End">
                                        <label class="form-check-label" for="Web - Front End">
                                            Web - Front End
                                        </label>
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <button type="submit" class="btn submit">Continuar</button>
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
