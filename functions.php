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

  //administração

  // funções de enviar mensagem

  function messageRefreshIndex($text){
    echo '<script>alert("'.$text.'")</script><meta http-equiv="refresh" content="0.1;url=index.php"> </meta>';
  }
  function messageRefreshHome($text){
    echo '<script>alert("'.$text.'")</script><meta http-equiv="refresh" content="0.1;url=home.php"> </meta>';
  }

  //cadastro de usuário

  function cadastrarUsuario($nome, $email, $senha){
    $sql = 'INSERT INTO usuario VALUES(null, "'.$nome.'", "'.$email.'", "'.$senha.'")';
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      messageRefreshIndex("Usuário cadastrado com sucesso!!");
    } else{
      messageRefreshIndex("Erro ao cadastrar usuário!!");
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
          messageRefreshHome("Login efetuado com sucesso!!!");
        }
      }
    } else{
      messageRefreshIndex("Usuário não encontrado");
    }
  }

  function cadastrarArquivo($nomeExib, $nomeArquivo){
    $sql = 'INSERT INTO arquivo VALUES(null, "'.$nomeExib.'", "'.$nomeArquivo.'")';
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      messageRefreshHome("Arquivo cadastrado com sucesso!!!");
    } else{
      messageRefreshHome("Arquivo enviado, porém não cadastrado!!!");
    }
  }

  function mostrarArquivoDownload(){
    $sql = 'SELECT * FROM arquivo ORDER BY nm_arquivo;';
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      while($row = $res->fetch_assoc()){
        echo '
        <div class="arquivoEsp">
          <span>'.$row['nm_exibicao'].'</span>
          <a href="arquivos/'.$row['nm_arquivo'].'" target="_blank"><button>'.$row['nm_arquivo'].'</button></a>
        </div>
        ';
      }
    }
  }
?>