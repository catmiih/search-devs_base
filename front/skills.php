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

                <form action="">
                    <div id="form">
                        <input class="col form-control skill" type="text" name="name_skill" placeholder="Ex: HTML5" style="margin-right: 2%;" require>
                        <input class="col form-control skill" list="datalistOptions" name="area_skill" id="exampleDataList" placeholder="Área de Atuação" require>
                        <datalist id="datalistOptions">
                            <option value="Artificial Intelligence">
                            <option value="IMPLEMENTAR AS AREAS COM O BACKEND <3">
                        </datalist>

                        <p style="margin: 1%;">Nível:</p>

                        <div class="evaluation">
                            <label>
                                <input type="radio" name="lvl" id="1" value="1" checked />
                                <button class="btn-select btn-level level-1 selected" id="level-1" onclick="check(1)" type="button">1</button>
                            </label>
                            <label>
                                <input type="radio" name="lvl" id="2" value="2" />
                                <button class="btn-select btn-level level-2" id="level-2" onclick="check(2)" type="button">2</button>
                            </label>

                            <label>
                                <input type="radio" name="lvl" id="3" value="3" />
                                <button class="btn-select btn-level level-3" id="level-3" onclick="check(3)" type="button">3</button>
                            </label>

                            <label>
                                <input type="radio" name="lvl" id="4" value="4" />
                                <button class="btn-select btn-level level-4" id="level-4" onclick="check(4)" type="button">4</button>
                            </label>
                            <label>
                                <input type="radio" name="lvl" id="5" value="5" />
                                <button class="btn-select btn-level level-5" id="level-5" onclick="check(5)" type="button">5</button>
                            </label>
                            <button type="button" onclick="newSkill()" class="btn-select btn-level btn" style="opacity: 1!important;">+</button>
                        </div>
                    </div>

                    

                    <form method="POST" action="">
                        <center>
                            <div class="row" id="skill_list">

                            </div>
                            <br>
                            <button type="submit" class="btn" style="padding: 2% 10%;">Começar agora</button>
                        </center>
                    </form>
                </form>

            </center>
        </div>

    </div>

    <?php require_once "footer.php" ?>

    <!-- Import JS Functions -->
    <script src="js/skill.js"></script>

</body>

</html>