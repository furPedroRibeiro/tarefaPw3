<?php
  include('functions.php');
  if(!isset($_SESSION['login'])){
    header('location: index.php');
  }
  if(isset($_POST['uploadSubmit'])){
    $arquivo = $_FILES['upload'];
    $target_dir = "arquivos/";
    $target_file = $target_dir . basename($arquivo["name"]);
    $uploadOk = 1;
                            
                            
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Desculpe, seu arquivo não foi carregado.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($arquivo["tmp_name"], $target_file)) {
        messageRefreshHome("Arquivo carregado com sucesso!!!");
        cadastrarArquivo($_POST['nomeExib'], basename($arquivo["name"]));
      } else {
        messageRefreshHome("Possible file upload attack!!!!");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - FTP</title>
  <style>
    /* CSS do HOME */

    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      color: var(--corPrimaria);
      font-family: 'Roboto', sans-serif;
    }
    :root{
      --background: white;
      --corPrimaria: #03bb85; 
      --corSecundaria: #33c3e3;
    }
    body{
      overflow-x: hidden;
    }
    .headerHome{
      width: 100vw;
      padding: 2rem;

      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-around;

      border-bottom: 1px solid var(--corPrimaria);
    }
    .mainHome{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center; 
      
      padding: 8rem;
      gap: 2rem;
    }
    .mainHome .switch{
      display: flex;
      flex-direction: row;
      gap: 1rem;
    }
    .mainHome .switch #upload{
      border-bottom: 4px solid var(--corPrimaria);

      cursor: pointer;
    }
    .mainHome .switch #download{
      cursor: pointer;
    }
    .mainHome .upload{
      border: 1px solid var(--corPrimaria);
      border-radius: 6px;
      width: 27rem;

      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;

      padding: 2rem;
      gap: 1rem;
    }
    .mainHome .upload .form{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center; 

      gap: 1rem;
    }
    .mainHome .download{
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;

      border: 1px solid var(--corPrimaria);
      border-radius: 6px;

      gap: 1rem;
      padding: 1.5rem;

      margin-inline: 3rem;
    }

    button{
      background-color: var(--background);
      color: var(--corPrimaria);

      border: 1px solid var(--corPrimaria);
      width: 17rem;
      
      padding: 1rem;

      font-size: 18px;

      cursor: pointer;

      border-radius: 15px;

      transition: width 0.5s;
    }
    button:hover{
      background-color: var(--corPrimaria);
      color: var(--background);
      width: 18rem;
    }
    #input{
      background-color: var(--background);
      color: var(--corPrimaria);

      border: 1px solid var(--corPrimaria);
      width: 17rem;
      height: 2.2rem;
      padding: 0.7rem;

      border-radius: 15px;

      outline: none;
      transition: width 0.5s;
    }
    #input:focus{
      background-color: var(--corPrimaria);
      color: var(--background);
      width: 18rem;
    }
    #input::placeholder{
      color: var(--corPrimaria);
      font-size: 15px;
    }
    #input:focus::placeholder{
      color: var(--background);
      font-size: 15px;
    }
    .exemplo{
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;

      border: 1px solid var(--corPrimaria);
      border-radius: 6px;

      padding: 1rem;
      gap: 1rem;
    }
    .arquivo{
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-around;

      gap: 1rem;

      flex-wrap: wrap;
    }
    .arquivoEsp{
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;

      gap: 0.5rem;

    }
    .arquivoEsp span{
      width: 17rem;
    }
  </style>
  <script>
    function showDownload() {
  document.getElementById('upload').style.borderBottom = 'none'
  document.getElementById('download').style.borderBottom =
    '4px solid var(--corPrimaria)'
  document.getElementById('divUpload').style.display = 'none'
  document.getElementById('divDownload').style.display = 'flex'
}
function showUpload() {
  document.getElementById('upload').style.borderBottom =
    '4px solid var(--corPrimaria)'
  document.getElementById('download').style.borderBottom = 'none'
  document.getElementById('divUpload').style.display = 'flex'
  document.getElementById('divDownload').style.display = 'none'
}
  </script>
</head>
<body>
  <section id="header">
    <div class="headerHome">
      <h1>FTP - Upload e Download</h1>
      <a href="exit.php">Sair</a>
    </div>
  </section>
  <section id="main">
    <div class="mainHome">
      <div class="switch">
        <h1 id="upload" onclick="showUpload()">Upload</h1>
        <h1 id="download" onclick="showDownload()">Download</h1>
      </div>
      <div class="upload" id="divUpload">
        <form action="" method="post" class="form" enctype="multipart/form-data">
          <input type="text" name="nomeExib" id="input" placeholder="Digite o nome de exibição do arquivo:">
          <input type="file" name="upload" id="upload">
          <button type="submit" name="uploadSubmit">Upload</button>
        </form>
        <div class="exemplo">
            <span>Exemplo de como o arquivo deve aparecer para download:</span>
            <span>Livro de matemática 2° ano(nome de exibição)</span>
          <button>algebraa.pdf(download)</button>
        </div>
        <img src="logoPedro.png" alt="" width="100px">
      </div>
      <div class="download" id="divDownload">
      <h1>Arquivos cadastrados(ordem alfabética):</h1>
        <div class="arquivo">
        <?php
          mostrarArquivoDownload();
        ?>
        </div>
      </div>
    </div>
  </section>
  <section id="footer">
    <div class="footerHome"></div>
  </section>
</body>
</html>