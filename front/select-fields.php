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
                    <form action="skills.php">
                        <div id="check" class="row row-cols-4">
                        <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Artificial Intelligence">
                                <label class="form-check-label" for="Artificial Intelligence">
                                    Artificial Intelligence
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Blockchain">
                                <label class="form-check-label" for="Blockchain">
                                    Blockchain
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Cibersegurança">
                                <label class="form-check-label" for="Cibersegurança">
                                    Cibersegurança
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Database Analytics">
                                <label class="form-check-label" for="Database Analytics">
                                    Database Analytics
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Data Science">
                                <label class="form-check-label" for="Data Science">
                                    Data Science
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Design">
                                <label class="form-check-label" for="Design">
                                    Design 
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Desktop Development">
                                <label class="form-check-label" for="Desktop Development">
                                    Desktop Development
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="DevOps">
                                <label class="form-check-label" for="DevOps">
                                    DevOps
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id=" Mobile Development">
                                <label class="form-check-label" for=" Mobile Development">
                                    Mobile Development
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Web - Back End">
                                <label class="form-check-label" for="Web - Back End">
                                    Web - Back End
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Web - Front End">
                                <label class="form-check-label" for="Web - Front End">
                                    Web - Front End
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" name="Skills" id="Outros">
                                <label class="form-check-label" for="Outros">
                                    Outros
                                </label>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn submit">Continuar</button>
                    </form>
                </div>
            </center>
        </div>
    </div>

    <?php require_once "footer.php" ?>

    <!-- Import JS Functions -->
    <script src="js/validate.js"></script>

</body>

</html>