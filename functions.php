<?php
  session_start();
  $user = 'root';
  $pass = '';
  $banco = 'db_ftpArquivos';
  $server = 'localhost';
  $conn = new mysqli($server, $user, $pass, $banco);
  if(!$conn){
    echo "Erro de conexão ".$conn->error;
  }

  //funcoes para funcionamento do site

  //cadastro

  function cadastrarUsuario($nome, $email, $senha){
    $sql = 'INSERT INTO usuario VALUES(null, "'.$nome.'", "'.$email.'", "'.$senha.'")';
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      echo '<script>alert("Usuário cadastrado com sucesso, faça o login")</script><meta http-equiv="refresh" content="0.1;url=index.php"> </meta>';
      /*header( "Refresh:0.1; url='index.php'");*/
    } else{
      echo '<script>alert("Erro ao cadastrar usuário")</script><meta http-equiv="refresh" content="0.1;url=index.php"> </meta>';
    }
  }
  
  //login do usuario

  function loginUsuario($email, $senha){
    $sql = 'SELECT * FROM usuario WHERE email_usuario = "'.$email.'" AND senha_usuario = "'.$senha.'"';
    $res= $GLOBALS['conn']->query($sql);

    if($res->num_rows > 0){
      while($row = $res->fetch_assoc()){
        if($row['email_usuario'] == $email && $row['senha_usuario'] == $senha){
          $_SESSION['login'] = 'ativo';
          echo '<script>alert("Login efetuado sucesso")</script><meta http-equiv="refresh" content="0.1;url=home.php"> </meta>';
          /*header( "refresh: 0.1; url='https://melbbss.000webhostapp.com/ftp/home.php'");*/
        }
      }
    } else{
      echo '<script>alert("Usuário não encontrado")</script><meta http-equiv="refresh" content="0.1;url=index.php"> </meta>';
      /*header( "Refresh:0.1; url='index.php'");*/
    }
  }
?>