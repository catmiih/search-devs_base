<html lang="pt-br">

<title>Perfil</title>

<?php require_once "../menu.php" ?>
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />

<body>

    <div class="jumbvideo jumbvideo-fluid ">

        <video autoplay="" muted="" loop="" id="banner">
            <source src="img/back_image.mp4" type="video/mp4" />
        </video>

        <div class="container text" style="width: 100%; height: 100vh;">
            <center>
                <div class="position-relative" id="campo1">
                    <div class="d-flex">
                        <div id="sidebar" class="position-absolute top-0 start-0">
                            <center>
                                <div class="container">
                                    <img src="img/perfil.jpg" />
                                    <div id="info">
                                        <h4>Fulano de Tal</h4>
                                        <p>Título do Perfil/ cargo</p>
                                    </div>
                                </div>
                                <div id="buttons">
                                    <br>
                                    <button class="btn">Ver perfil</button>
                                    <button class="btn">Descobrir profissionais</button>
                                    <button class="btn">Novas propostas</button>
                                    <button class="btn">Projetos em andamento</button>
                                </div>
                                <div id="footerSidebar" class="position-absolute bottom-0 start-0">
                                    <h5>Plano Atual: Comum</h5>
                                    <button>Torne-se Vip</button>
                                    <br>
                                    <p>Copyright &copy; 2022 Search Devs. Todos os direitos reservados </p>
                                </div>
                            </center>
                        </div>
                        <div name="FundoPerfil" id="fundop"> </div>
                        <div id="FotoPerfil">
                            <img src="img/perfil.jpg" class="position-absolute bottom-0 start-0" />
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    
</body>

</html>