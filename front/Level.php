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
                        <p>Por favor, selecione sua(s) habilidades:</p>
                    </div>
                    <form>
                        <div id="form">
                            <input class="col form-control" type="text" name="SkillsLevel" placeholder="Ex: HTML5" style="margin-right: 15px;">
                            <p style="margin: 5px;">Nível:</p> 
                            <button style="width: 45px; height: 45px;border-radius: 50%;" id="btn1">1</button> 
                            <button style="width: 45px; height: 45px;border-radius: 50%;" id="btn2">2</button> 
                            <button style="width: 45px; height: 45px;border-radius: 50%;" id="btn3">3</button> 
                            <button style="width: 45px; height: 45px;border-radius: 50%;" id="btn4">4</button> 
                            <button style="width: 45px; height: 45px;border-radius: 50%;" id="btn5">5</button> 
                            <button style="width: 45px; height: 45px;border-radius: 50%;" id="btnNew">+</button>
                        </div>
                        <br><br>
                        <div>
                            <button value="level1" id="btn1">HTML5</button>    
                            <button value="level2" id="btn2">CSS3</button>
                            <button value="level3" id="btn3">JavaScript</button> 
                            <button value="level4" id="btn4">SQL</button> 
                            <button value="level5" id="btn5">PHP</button> 
                        </div>
                        <br>
                        <button type="submit" class="btn">Começar agora</button>
                    </form>
                </center>
            </div>

    </div>

<?php require_once "footer.php" ?>

<!-- Import JS Functions -->
<script src="js/validate.js"></script>

</body>

</html>