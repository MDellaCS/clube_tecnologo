USE db_clube;
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
        texto_fatec
    )
VALUES (
        "Teste da Silva Santos",
        "20",
        "2007",
        "Primeiro Semestre",
        "emailteste@gmail.com",
        "(11) 91234-1234",
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
        "(11) 97769-1234",
        "Logística",
        "teste.png",
        "Teste do texto Sobre Mim",
        "Teste do texto Agradecimentos Fatec"
    );
INSERT INTO tb_admin (nome, email, senha)
VALUES ("ADMIN", "admin@admin.com", "admin");