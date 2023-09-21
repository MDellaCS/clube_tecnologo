START TRANSACTION;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-03:00";
DROP DATABASE IF EXISTS fateczle_clubetecnologo;
CREATE DATABASE fateczle_clubetecnologo;
USE fateczle_clubetecnologo;
CREATE TABLE tb_tecnologo (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL,
    idade TINYINT(2) NOT NULL,
    ra CHAR(13) NOT NULL,
    ano_formacao year(4),
    semestre_formacao VARCHAR(17),
    email VARCHAR(60) NOT NULL,
    curso VARCHAR(43) NOT NULL,
    foto VARCHAR(261) NOT NULL,
    texto_sobre VARCHAR(700) NOT NULL,
    texto_fatec VARCHAR(700) NOT NULL,
    data_insercao TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    publicado TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
CREATE TABLE tb_admin (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(600) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- ----------------------------------------------------- PROCEDURES
DROP PROCEDURE IF EXISTS insertTecnologo;
DROP PROCEDURE IF EXISTS publishTecnologo;
DROP PROCEDURE IF EXISTS deleteTecnologo;
DELIMITER $$ CREATE PROCEDURE insertTecnologo(
  IN nome_Proc VARCHAR(60),
  IN idade_Proc TINYINT,
  IN ra_Proc CHAR(13),
  IN ano_Proc year(4),
  IN semestre_Proc VARCHAR(17),
  IN email_Proc VARCHAR(60),
  IN curso_Proc VARCHAR(43),
  IN foto_Proc VARCHAR(261),
  IN texto_pessoal_Proc VARCHAR(700),
  IN texto_fatec_Proc VARCHAR(700)
) BEGIN
INSERT INTO tb_tecnologo (
    nome,
    idade,
    ra,
    ano_formacao,
    semestre_formacao,
    email,
    curso,
    foto,
    texto_sobre,
    texto_fatec
  )
VALUES (
    nome_Proc,
    idade_Proc,
    ra_Proc,
    ano_Proc,
    semestre_Proc,
    email_Proc,
    curso_Proc,
    foto_Proc,
    texto_pessoal_Proc,
    texto_fatec_Proc
  );
END $$ DELIMITER $$ CREATE PROCEDURE publishTecnologo(IN id_Proc INT) BEGIN
UPDATE tb_tecnologo
SET publicado = 1
WHERE id = id_Proc;
END $$ DELIMITER $$ CREATE PROCEDURE deleteTecnologo(IN id_Proc INT) BEGIN
DELETE FROM tb_tecnologo
WHERE id = id_Proc;
END $$
COMMIT;