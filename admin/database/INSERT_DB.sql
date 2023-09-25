START TRANSACTION;
USE fateczle_clubetecnologo;
CALL insertTecnologo(
    "Teste da Silva Santos",
    "20",
    "1231231231231",
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
    "4564738291090",
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
        "c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec"
    );
COMMIT;