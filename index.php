<?php
  include('functions.php');

  if(isset($_SESSION['login'])){
    header('location: home.php');
  }

  if(isset($_POST['name'])){
    cadastrarUsuario($_POST['name'], $_POST['email'], $_POST['pass']);
  }
  if(isset($_POST['emailLog'])){
    loginUsuario( $_POST['emailLog'], $_POST['pass']);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FTP arquivos</title>
    <link rel="shortcut icon" href="logoPedro.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <script src="script.js"></script>
  </head>
  <body>
    <div class="main">
      <div class="login" id="login">
        <form action="" method="post" class="form">
          <h1>FTP - Upload e Download</h1>
          <input
            type="email"
            id="emailLog"
            name="emailLog"
            placeholder="Insira seu email:"
          />
          <input
            type="password"
            id="pass"
            name="pass"
            placeholder="Insira sua senha:"
          />
          <button name="btnLogin">Login</button>
        </form>
        <button onclick="showCad()">Cadastre-se</button>
        <img src="logoPedro.png" alt="Logo do site" width="100px" />
      </div>
      <div class="cad" id="cad">
        <form action="" method="post" class="form">
          <h1>FTP - Upload e Download</h1>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Insira seu nome:"
          />
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Insira seu email:"
          />
          <input
            type="password"
            id="pass"
            name="pass"
            placeholder="Insira sua senha:"
          />
          <button name="btnCadastro">Cadastrar</button>
        </form>
        <button onclick="showLog()">Login</button>
        <img src="logoPedro.png" alt="Logo do site" width="100px" />
      </div>
    </div>
  </body>
</html>
