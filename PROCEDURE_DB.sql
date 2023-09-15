DROP PROCEDURE IF EXISTS insertTecnologo;
DELIMITER //
CREATE PROCEDURE insertTecnologo(IN qtd INT)
BEGIN
  DECLARE contador INT DEFAULT 0;
  WHILE contador < qtd DO
    INSERT INTO tb_tecnologo (nome) VALUES (contador);
    SET contador = contador + 1;
  END WHILE;
END //
DELIMITER ;