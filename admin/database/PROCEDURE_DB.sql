DROP PROCEDURE IF EXISTS insertTecnologo;
DROP PROCEDURE IF EXISTS publishTecnologo;
DROP PROCEDURE IF EXISTS deleteTecnologo;
DELIMITER $$ CREATE PROCEDURE insertTecnologo(
  IN nome_Proc VARCHAR(60),
  IN idade_Proc TINYINT,
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