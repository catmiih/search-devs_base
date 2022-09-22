<!DOCTYPE html>
<html lang="pt-br">
<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Cadastre-se Agora!</title>
<?php require_once "menu.php" ?>

<style>
    .row a {
        padding: 3% 12%;
        margin: 1%;
    }

    @media (max-width: 800px) {

        #campo1 {
            padding: 10%;
        }

        #campo1 h1 {
            font-size: 2.5rem;
            padding: 10% 0;
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
                    <p>Vamos começar por algo fácil, qual tipo de conta você deseja?</p>

                    <div class="row">
                        <a class="col btn tag" href="developer.php">Freelancer</a>
                        <a class="col btn tag" href="company.php">Empresarial</a>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <?php require_once "footer.php" ?>
</body>

</html>