SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";
CREATE DATABASE db_clube;
USE db_clube;
CREATE TABLE tb_tecnologo (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    idade tinyint NOT NULL,
    ano_formacao year(4) NOT NULL,
    semestre_formacao varchar(19) NOT NULL,
    email varchar(100) NOT NULL,
    celular varchar(15) NOT NULL,
    curso varchar(100) NOT NULL,
    foto varchar(260) NOT NULL,
    texto_sobre varchar(500) NOT NULL,
    texto_fatec varchar(500) NOT NULL,
    texto_livre varchar(500) NOT NULL,
    data_insercao timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    publicado tinyint NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
INSERT INTO tb_tecnologo (
        nome,
        idade,
        ano_formacao,
        semestre_formacao,
        email,
        celular,
        curso,
        foto,
        texto_sobre,
        texto_fatec,
        texto_livre,
        data_insercao,
        publicado
    )
VALUES (
        'Julia Chang',
        38,
        2018,
        'Segundo Semestre',
        'julia@teste.com',
        '11982328372',
        'Informática para Gestão de Negócios',
        '08-06-2022-13-22-08_juliachang.jpg',
        'A',
        'B',
        'C',
        '2022-06-08 16:33:33',
        0
    ),
    (
        'Elias de Andrade Souza',
        36,
        2019,
        'Primeiro Semestre',
        'elias@teste.com',
        '11973921934',
        'Análise e Desenvolvimento de Sistemas',
        '08-06-2022-13-23-29_eliasdeandradesouza.jpg',
        'A',
        'B',
        'C',
        '2022-06-08 17:26:51',
        0
    ),
    (
        'Karina Santana Silva',
        34,
        2014,
        'Primeiro Semestre',
        'karina@teste.com',
        '11968327383',
        'Logística',
        '08-06-2022-13-24-23_karinasantanasilva.jpg',
        'A',
        'B',
        'C',
        '2022-06-08 16:24:23',
        0
    ),
    (
        'Marcio Leonardo Caetano',
        37,
        2019,
        'Segundo Semestre',
        'marcio@teste.com',
        '11989829289',
        'Desenvolvimento de Produtos Plásticos',
        '08-06-2022-13-25-41_marcioleonardocaetano.jpg',
        'A',
        'B',
        'C',
        '2022-06-08 17:27:03',
        0
    );
CREATE TABLE tb_admin (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    senha varchar(600) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
INSERT INTO tb_admin (nome, email, senha)
VALUES ('Admin CT Fatec', 'adminct@teste.com', '123');
COMMIT;