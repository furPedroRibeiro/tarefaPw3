CREATE DATABASE db_ftpArquivos;
USE db_ftpArquivos;

CREATE TABLE usuario(
  cd_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nm_usuario VARCHAR(120),
  email_usuario VARCHAR(145),
  senha_usuario VARCHAR(45)
);
