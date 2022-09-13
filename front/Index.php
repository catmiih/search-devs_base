<!DOCTYPE html>
<html lang="pt-br">

<title>Search Devs - Inovação em contratação de profissionais de tecnologia</title>
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
          <a class="btn" href="register.php" style="padding: 5% 20%;">Começar agora</a>
        </div>
      </center>
    </div>
  </div>


  <div class="main">

    <div id="whatIs" class="tag">
      <div class="card mb-3 text-white" style="max-width: 600px;" id="Card">
        <div class="row g-0" style="text-align: start;">
          <div class="col-md-4">
            <img src="img/oquee.svg" class="img-fluid rounded-start" style="padding-left: 20px;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Oque é?</h5>
              <p class="card-text">O Search Devs é uma plataforma que facilita os desenvolvedores autônomos de encontrar novos projetos, que une o desenvolvedor ao projeto que mais tenha a sua cara! Tudo isso de forma automatizada.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="use" class="tag">
      <h1>Como entrar para o time?</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col tag">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Crie sua conta</h5>
            </div>
          </div>
        </div>
        <div class="col tag">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Adicione suas informações</h5>
            </div>
          </div>
        </div>
        <div class="col tag">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Pronto!</h5>
            </div>
          </div>
        </div>
      </div>
      <p class="tag">Inicie sua trajetória como um profissional oficial do Search Devs. Fácil e rápido!</p>
    </div>

    <div id="why" class="tag">
      <h1>O Search Devs te espera</h1>
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
      <h1>Junte-se a nós agora!</h1>
      <p>Agora que você já nos conhece, é a hora de se juntar ao Search Devs! Não é mesmo?
        <br>Seja você um profissional ou usuário em busca de nossos devs,<br> Vamos auxiliá-los de forma rápida e intuitiva.
      </p>
      <center>
        <a class="b btn" href="register.php">Começar agora</a>
      </center>
    </div>
  </div>
  </div>

  <?php require_once "footer.php" ?>

</body>

</html>