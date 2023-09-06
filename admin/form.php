<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>
    <title>Cadastro de Egresso</title>
</head>

<body>

    <form name="formEgresso" method="post" action="<?php echo htmlspecialchars('formResult.php'); ?>" autocomplete="on">

        <div class="formulario">

            <div class="wrapper">

                <div id="img-preview" class="emp">
                    Sua foto aqui
                </div>

                <div class="emp">
                    <label for="foto" class="btn">Escolher Foto</label>
                    <input type="file" class="btn" id="foto" name="fotoTec" accept="image/*" onchange="mostrarImagem()"
                        required />
                </div>

            </div>

            <div>
                <div>
                    <label for="nome">Nome Completo</label>
                </div>

                <div>
                    <input type="text" id="nome" name="nomeTec" maxlength="60" required />
                </div>
            </div>

            <div>
                <div>
                    <label for="ra">RA</label>
                    <button class="tooltip"><img src="../imagens/tooltip.png"><span class="tooltiptext">Insira o Registro Acadêmico relacionado à sua
                            matricula na Fatec</span></button>

                </div>

                <div>
                    <input type="text" id="ra" name="raTec" maxlength="13" />
                </div>
            </div>

            <div>
                <div>
                    <label for="idade">Idade Atual</label>
                </div>

                <div>
                    <input type="number" id="idade" name="idadeTec" min="18" max="99" />
                </div>
            </div>

            <div>
                <div>
                    <label for="email">E-mail</label>
                </div>

                <div>
                    <input type="email" id="email" name="emailTec" size="50" maxlength="150" required />
                </div>
            </div>

            <div>
                <div>
                    <label for="celular">Celular</label>
                </div>

                <div>
                    <input type="tel" id="celular" name="celularTec" placeholder="(XX)9XXXX-XXXX"
                        pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" maxlength="11" />
                </div>
            </div>

            <div>
                <div>
                    <label for="curso">Curso Realizado</label>
                </div>

                <div>
                    <select id="curso" name="cursoTec" required>
                        <option value="" selected disabled hidden>Escolha</option>
                        <option>Análise e Desenvolvimento de Sistemas</option>
                        <option>Informática para Gestão de Negócios</option>
                        <option>Comércio Exterior</option>
                        <option>Desenvolvimento de Produtos Plásticos</option>
                        <option>Desenvolvimento de Software Multiplataforma</option>
                        <option>Gestão de Recursos Humanos</option>
                        <option>Gestão Empresarial</option>
                        <option>Gestão Empresarial EAD</option>
                        <option>Logística</option>
                        <option>Polímeros</option>
                    </select>
                </div>
            </div>

            <div>

                <div>
                    <label>Formação</label>
                </div>

                <div class="wrapper">
                    <div class="abc">
                        <input type="radio" id="primeiro" name="semestreTec" value="Primeiro Semestre" />
                        <label for="primeiro">Primeiro Semestre</label>

                        <input type="radio" id="segundo" name="semestreTec" value="Segundo Semestre" />
                        <label for="segundo">Segundo Semestre</label>

                    </div>

                    <div class="emp">
                        <label for="ano">de:</label>

                        <input type="number" id="ano" name="anoTec" min="2003" max="<?php echo date("Y"); ?>" />
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <label for="textoPessoal">Texto Pessoal</label>
                </div>

                <div>
                    <textarea id="textoPessoal" name="textoPessoalTec" rows="4" required></textarea>
                </div>
            </div>

            <div>
                <div>
                    <label for="textoFatec">Texto Fatec</label>
                </div>

                <div>
                    <textarea id="textoFatec" name="textoFatecTec" rows="4" required></textarea>
                </div>
            </div>

            <input type="reset" class="btn" onclick="limparImagem()" />
            <input type="submit" class="btn" value="Finalizar" />

        </div>

    </form>

</body>

</html>