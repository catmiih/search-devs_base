<!DOCTYPE html>
<html lang="pt-br">

<?php require_once "menu.php" ?>

<body>


  <div class="jumbvideo jumbvideo-fluid ">
    <video autoplay="" muted="" loop="" id="banner">
      <source src="img/back_image.mp4" type="video/mp4" />
    </video>

    <div class="container text" style="width: 50%; height: 100vh;">
      <center>
        <div id="campo1">
          <h1>Search Devs</h1>
          <p>Inovação em contratação de profissionais de tecnologia.</p>
        </div>
        <div id="campo2">
          <a class="btn" href="TipoCad.php">Começar agora</a>
        </div>
      </center>
    </div>
  </div>


  <div class="main" style="align-items: center;">

    <div id="whatIs" class="tag">
      <div class="card mb-3 text-white" style="max-width: 600px;" id="Card">
        <div class="row g-0" style="text-align: start;">
          <div class="col-md-4">
            <img src="img/logo.png" class="img-fluid rounded-start" style="padding-left: 20px;" alt="Logo Search Devs">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Oque é?</h5>
              <p class="card-text">O Search Devs é uma plataforma com o foco em auxiliar desenvolvedores autônomos a encontrarem novos projetos, com uma ferramenta inovadora que une o desenvolvedor ao projeto que mais tenha a sua cara! Tudo isso de forma automatizada.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="use" class="tag">
      <h1>Como utilizar?</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col tag">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">1- Crie sua conta (DEPOIS FAZER OS ICONS Q VAI FICAR AQ)</h5>
            </div>
          </div>
        </div>
        <div class="col tag">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">2- Adicione suas informações</h5>
            </div>
          </div>
        </div>
        <div class="col tag">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">3- Aguarde nossa ferramenta encontrar o projeto ideal para você!</h5>
            </div>
          </div>
        </div>
      </div>
      <p class="tag">Após o processo, só iniciar sua trajetória como um profissional oficial de nossa plataforma!</p>
    </div>

    <div id="why" class="tag">
      <h1>Por que utilizar?</h1>
      <table>
        <tr>
          <td><a class="b btn">Menores taxas</a></td>
          <td><a class="b btn">Maior segurança</a></td>
        </tr>
        <tr>
          <td><a class="b btn">Plataforma Otimizada</a></td>
          <td><a class="b btn">Filtro de contratação</a></td>
        </tr>
      </table>
    </div>

    <div class="tag" id="start">
      <h1>Comece a utilizar agora!</h1>
      <p>Agora que você já nos conhece, é a hora ideal para iniciar o seu proximo projeto com o
        <br>Search Devs! Seja você um profissional autônomo ou uma empresa em busca dos mesmos,<br> nossa plataforma irá auxiliar ambos a se encontrarem de forma rápida e intuitiva.
      </p>
      <center>
        <a class="b btn" href="TipoCad.php">Começar agora</a>
      </center>
    </div>
  </div>
  </div>

  <?php require_once "footer.php" ?>

</body>

</html>