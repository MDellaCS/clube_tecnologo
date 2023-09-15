USE fateczle_clubetecnologo;
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
        "Teste da Silva Santos",
        "20",
        "2007",
        "Primeiro Semestre",
        "emailteste@gmail.com",
        "Análise e Desenvolvimento de Sistemas",
        "imagem.png",
        "Teste do texto Sobre Mim",
        "Teste do texto Agradecimentos Fatec"
    ),
(
        "Tecnólogo de Teste para o Sistema",
        "41",
        "2011",
        "Segundo Semestre",
        "testandouser@hotmail.com",
        "Logística",
        "teste.png",
        "Teste do texto Sobre Mim",
        "Teste do texto Agradecimentos Fatec"
    );
INSERT INTO tb_admin (nome, email, senha)
VALUES ("ADMIN", "admin@admin.com", "admin");