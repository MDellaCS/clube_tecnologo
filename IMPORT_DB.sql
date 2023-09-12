SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";
CREATE DATABASE db_clube;
USE db_clube;
CREATE TABLE tb_tecnologo (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL,
    idade TINYINT NOT NULL,
    ano_formacao year(4) NOT NULL,
    semestre_formacao VARCHAR(17) NOT NULL,
    email VARCHAR(60) NOT NULL,
    curso VARCHAR(43) NOT NULL,
    foto VARCHAR(261) NOT NULL,
    texto_sobre VARCHAR(400) NOT NULL,
    texto_fatec VARCHAR(400) NOT NULL,
    data_insercao TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    publicado TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
CREATE TABLE tb_admin (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(600) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
COMMIT;