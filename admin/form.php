<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel|Fauna+One">
    <script src="form.js"></script>
    <title>Cadastro de Egresso</title>
</head>

<body>

    <form name="formEgresso" method="post" action="<?php echo htmlspecialchars('formResult.php'); ?>" autocomplete="on">

        <div class="formulario">

            <div class="inicio">
                <h1>Clube do Tecnólogo</h1>
                <h2>A FATEC-ZL está interessada em captar informações sobre a sua experiência como tecnólogo. É
                    importante, não apenas para a instituição, como também para o mercado de trabalho e para
                    os alunos, que a carreira de tecnólogo seja cada vez mais valorizada. Ao compartilhar suas
                    experiências com a instituição, você contribui para um maior conhecimento sobre o quão importante
                    são os cursos de tecnologia. E isto resulta em melhores oportunidades para você e
                    para os contratantes. É importante que:
                    <ul>
                        <li>As informações divulgadas estejam corretas;</li>
                        <li>Seu e-mail e celular estejam corretos, pois faremos contato para confirmar a data de
                            publicação
                            caso
                            o texto seja aprovado, ou se o texto precisa de correções;
                        </li>
                        <li>O texto enviado não contenha palavras de baixo calão ou discurso de ódio;
                        </li>
                        <li>O texto enviado não possua ofensas a qualquer indivíduo ou instituição;</li>
                        <li>A foto enviada não possua conteúdo ofensivo;</li>
                        <li>Imagem preferencialmente quadrada.</li>
                    </ul>
                </h2>

                <myTag class="req">Dados Obrigatórios</myTag>
                <myTag class="opc">Dados Opcionais</myTag>

            </div>

            <div>
                <div>
                    <label for="nome">Nome Completo</label>

                    <label for="foto" class="btn floatR">
                        <div class="tooltip" id="img-preview">
                            Selecionar Foto
                        </div>
                        <span class="tooltiptext">Selecione uma foto sua (com a família, amigos ou sozinho), é
                            importante que seja uma foto real e não um avatar</span>
                    </label>

                </div>

                <div>
                    <input type="text" id="nome" name="nomeTec" maxlength="60" required />


                    <input type="file" id="foto" name="fotoTec" accept="image/*" onchange="mostrarImagem()" required />

                </div>
            </div>

            <div>
                <div>
                    <label for="ra">RA</label>
                </div>

                <div>
                    <input class="tooltip" type="text" id="ra" name="raTec" maxlength="13" />
                    <span class="tooltiptext">Insira o Registro Acadêmico relacionado à sua
                        matricula na Fatec (Este dado será validado)</span>
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
                    <input class="tooltip" type="email" id="email" name="emailTec" size="50" maxlength="150" required />
                    <span class="tooltiptext">Endereço de e-mail para receber o status de seu post. Seu e-mail
                        institucional, prefenrencialmente</span>
                </div>
            </div>

            <div>
                <div>
                    <label for="celular">Celular</label>
                </div>

                <div>
                    <input class="tooltip" type="tel" id="celular" name="celularTec" placeholder="(XX)9XXXX-XXXX"
                        pattern="[0-9]{2}[9]{1}[0-9]{4}[0-9]{4}" maxlength="11" />
                    <span class="tooltiptext">Este campo não será público</span>
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

                    <textarea class="tooltip" id="textoPessoal" name="textoPessoalTec" rows="4" required></textarea>
                    <span class="tooltiptext">Escreva um pouco sobre si mesmo(a). Conte sobre suas atividades
                        e interesses profissionais. Isso pode incluir seu campo de trabalho, sua profissão, suas
                        responsabilidades e qualquer projeto ou conquista significativa em que esteja
                        envolvido(a).</span>
                </div>
            </div>

            <div>
                <div>
                    <label for="textoFatec">Texto Fatec</label>
                </div>

                <div>
                    <textarea class="tooltip" id="textoFatec" name="textoFatecTec" rows="4" required></textarea>
                    <span class="tooltiptext"></span>
                </div>
            </div>

            <input type="reset" class="btn" onclick="limparImagem()" />
            <input type="submit" class="btn" value="Finalizar" />

        </div>

    </form>

</body>

</html>