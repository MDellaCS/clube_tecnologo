USE fateczle_clubetecnologo;
CALL insertTecnologo(
    "Teste da Silva Santos",
    "20",
    "2007",
    "Primeiro Semestre",
    "emailteste@gmail.com",
    "Análise e Desenvolvimento de Sistemas",
    "imagem.png",
    "Teste do texto Sobre Mim",
    "Teste do texto Agradecimentos Fatec"
);
CALL insertTecnologo(
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
VALUES (
        "ADMIN",
        "admin@admin.com",
        "C7AD44CBAD762A5DA0A452F9E854FDC1E0E7A52A38015F23F3EAB1D80B931DD472634DFAC71CD34EBC35D16AB7FB8A90C81F975113D6C7538DC69DD8DE9077EC"
    );