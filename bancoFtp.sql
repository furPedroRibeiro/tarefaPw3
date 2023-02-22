CREATE DATABASE db_ftpArquivos;
USE db_ftpArquivos;

CREATE TABLE usuario(
  cd_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nm_usuario VARCHAR(120),
  email_usuario VARCHAR(145),
  senha_usuario VARCHAR(45)
);
CREATE TABLE arquivo(
  cd_arquivo INT PRIMARY KEY AUTO_INCREMENT,
  nm_exibicao VARCHAR(120),
  nm_arquivo VARCHAR(45)
);
