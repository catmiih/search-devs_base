<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/8381/8381909.png"/>
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
</head>
<body>
    <div class="nav">

    </div>
    <h1>Continue o Cadastro</h1>
    <div class="FormTel">
        <form class="Tel">
            <label for="Tel">Tipo de Telefone:</label>
            <br><br>
            <select id="TipoTel" name="" request>
            <option value="Celular">Celular</option>
            <option value="Comercial">Comercial</option>
            <option value="Residencial">Residencial</option>
            <option value="Principal">Principal</option>
            </select>
            <br><br>
           <input request type="tel" placeholder="Telefone" name="">
           <br><br>
            <button type="button" onClick="Mudarestado('F')">Avançar</button>
    </div>    
    <div class="FormLogin" id="F">
        <h1>Informações de login</h1>
            <br>
            <input type="text" request placeholder="Nome Usuário*" name="">
            <br><br>
            <input type="email" request placeholder="Email*" name="">
            <br><br>
            <input type="password" request placeholder="Senha*" name="">
            <br><br>
            <input type="password" request placeholder="Confirmar Senha*" name="">
            <br><br>
            <a link href=""><button type="submit">Finalizar Cadastro</button></a>
        </form>
    </div>
    <script src="js/CadLogin.js"></script>
</body>
</html>