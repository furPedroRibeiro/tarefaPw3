<?php
  session_start();
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
        echo '<script>alert("Arquivo foi carregado com sucesso!!!!")</script><meta http-equiv="refresh" content="0.1;url=home.php"> </meta>';
      /*header( "Refresh:0.1; url='index.php'");*/
      } else {
        echo '<script>alert("Possible file upload attack!!!!")</script>';
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

  padding: 2rem;
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
  border: 1px solid var(--corPrimaria);
  border-radius: 6px;

  padding: 2rem;
}
.mainHome .download .form{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center; 

  gap: 1rem;
}
button{
  background-color: var(--background);
  color: var(--corPrimaria);

  border: 1px solid var(--corPrimaria);
  width: 17rem;
  height: 3rem;
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
  </style>
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
        <form action="" method="post" class="form">
          <label for="upload">Selecione o arquivo e em seguida faça o upload!!</label>
          <input type="file" name="upload" id="upload">
          <button type="submit" name="uploadSubmit">Upload</button>
        </form>
      </div>
      <div class="download" id="divDownload">
        <form action="" method="post" class="form">
          <label for="download">Selecione o arquivo e em seguida faça o download!!</label>
          <input type="file" name="download" id="download">
          <button type="submit">EEEEEEE</button>
        </form>
      </div>
    </div>
  </section>
  <section id="footer">
    <div class="footerHome"></div>
  </section>
  <script>
    function showDownload(){
      document.getElementById("upload").style.borderBottom = "none";
      document.getElementById("download").style.borderBottom = "4px solid var(--corPrimaria)";
      document.getElementById("divUpload").style.display = "none";
      document.getElementById("divDownload").style.display = "flex";
    }
    function showUpload(){
      document.getElementById("upload").style.borderBottom = "4px solid var(--corPrimaria)";
      document.getElementById("download").style.borderBottom = "none";
      document.getElementById("divUpload").style.display = "flex";
      document.getElementById("divDownload").style.display = "none";
    }
  </script>
</body>
</html>