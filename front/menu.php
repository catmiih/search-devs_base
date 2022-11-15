<?php

session_start();
session_destroy();

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="shortcut icon" type="image/png" href="img/logobarradepesquisa.svg" />
  <link rel="stylesheet" type="text/css" href="../assets/extend/css/bootstrap.css" />

  <link rel="stylesheet" type="text/css" href="css/css.css" />
  <link rel="stylesheet" type="text/css" href="css/nav.css" />
  <link rel="stylesheet" href="../assets/extend/fontawesome/css/all.min.css" />

  <script src="../assets/extend/js/bootstrap.js"></script>
  <script src="../assets/extend/js/jquery.js"></script>
  <script src="js/sd.js"></script>
</head>

<nav class="navbar navbar-dark bg-dark-menu fixed-top navbar-expand-md transition">
  <a class="navbar-brand" href="index.php">
    <img src="img/logo-search-devs.svg" id="logo">
    <div id="Text">SEARCH DEVS™</div>
  </a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse menu" id="navbarTogglerDemo01">
    <ul class="nav jnavbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="register.php">
        <i class="fa-sharp fa-solid fa-square-plus"></i> &nbsp; Inscrever-se
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <i class="fa-sharp fa-solid fa-user"></i> &nbsp; Entrar
        </a>
      </li>
  </div>
</nav>