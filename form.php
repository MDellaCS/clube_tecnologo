<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="admin/imagens/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>
    <title>Cadastro | Clube do Tecnólogo</title>
</head>

<body>

    <form name="formEgresso" id="formEgresso" method="post" enctype="multipart/form-data"
        action="<?= htmlspecialchars('formResult.php'); ?>" autocomplete="on">

        <div class="sticky">
            <a href="index.php">
                <input type="button" class="btn floatL" value="Voltar">
            </a>
            <img id="btnTheme" onclick="invertTheme()" class="icon btn floatR" />
        </div>

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
                        <li>Seu e-mail esteja correto, pois faremos contato caso o texto seja aprovado, ou
                            se o texto precisa de correções;
                        </li>
                        <li>O texto enviado não contenha palavras de baixo calão ou discurso de ódio;
                        </li>
                        <li>O texto enviado não possua ofensas a qualquer indivíduo ou instituição;</li>
                        <li>A foto enviada (preferencialmente quadrada) não possua conteúdo ofensivo.</li>
                    </ul>

                    <span class="req"></span> = Dados Obrigatórios
                    <br>
                    <span class="res"></span> = Dados Restritos (Essas informações não serão compartilhadas
                    publicamente)
                </h2>
            </div>

            <div>
                <div>
                    <label for="nome" class="req">Nome Completo</label>

                    <label for="foto" class="floatR req">
                        <div class="tooltip" id="img-preview">
                            Selecionar Foto
                        </div>
                        <span class="tooltiptext">Selecione uma foto sua (com a família, amigos ou sozinho), é
                            importante que seja uma foto real e não um avatar.</span>
                    </label>
                </div>

                <div>
                    <input type="text" class="formInput" id="nome" name="nomeTec" maxlength="60" required />

                    <input type="file" id="foto" name="fotoTec" accept="image/*" onchange="mostrarImagem()" required />
                </div>
            </div>

            <div class="flexRow">
                <div>
                    <div>
                        <label for="ra" class="req res">RA</label>
                    </div>

                    <div>
                        <input class="tooltip formInput" type="text" id="ra" name="raTec" maxlength="13" />
                        <span class="tooltiptext">Insira o Registro Acadêmico relacionado à sua
                            matricula na Fatec (este dado será validado).</span>
                    </div>
                </div>

                <div>
                    <div>
                        <label for="idade" class="req">Idade Atual</label>
                    </div>

                    <div>
                        <input type="number" class="formInput" id="idade" name="idadeTec" min="18" max="99" required />
                    </div>
                </div>
            </div>

            <div>

            </div>

            <div>
                <div>
                    <label for="email" class="req res">E-mail</label>
                </div>

                <div>
                    <input class="tooltip formInput" type="email" id="email" name="emailTec" size="50" maxlength="60"
                        required />
                    <span class="tooltiptext">Endereço de e-mail para receber o status de seu post. Seu e-mail
                        institucional, preferencialmente.</span>
                </div>
            </div>

            <div>
                <div>
                    <label for="curso" class="req">Curso</label>
                </div>

                <div>
                    <select class="formInput" id="curso" name="cursoTec" required>
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

            <div class="margin">
                <div>
                    <input type="radio" id="formado" name="formacaoTec" onclick="mudarFormado()" value="Formado" checked
                        required />
                    <label for="formado" id="labelFormado">Já me Formei</label>

                    <input type="radio" id="cursando" name="formacaoTec" onclick="mudarFormado()" value="Cursando" />
                    <label for="cursando" id="labelCursando">Estou Cursando</label>
                </div>

                <div id="dadosFormado" class="wrapper">

                    <div style="display: inline-block;">
                        <label>Me formei no:</label>
                    </div>

                    <div class="semestres" style="display: inline-block;">
                        <div class="semestres">
                            <input type="radio" id="primeiro" name="semestreTec" value="Primeiro Semestre" />
                            <label for="primeiro" id="labelPrimeiro">Primeiro Semestre</label>

                            <input type="radio" id="segundo" name="semestreTec" value="Segundo Semestre" />
                            <label for="segundo" id="labelSegundo">Segundo Semestre</label>
                        </div>
                    </div>

                    <div style="display: inline-block;">
                        <label for="ano" id="labelAno">do ano de:</label>
                    </div>

                    <div class="aaa">
                        <input type="number" class="centered formInput" id="ano" name="anoTec" min="2003"
                            max="<?php echo date("Y"); ?>" />
                    </div>

                </div>
            </div>

            <div>
                <div>
                    <label for="textoPessoal" class="req">Texto Pessoal</label>
                    <h2 class="contador" id="contadorP">Caracteres Restantes: 700</h2>
                </div>

                <div>

                    <textarea class="tooltip formInput" oninput="contChars(this, 'contadorP')" id="textoPessoal"
                        name="textoPessoalTec" maxlength="700" rows="4" required></textarea>
                    <span class="tooltiptext">Escreva um pouco sobre si mesmo(a). Conte sobre suas atividades
                        e interesses profissionais. Isso pode incluir seu campo de trabalho e sua profissão, por
                        exemplo.</span>
                </div>
            </div>

            <div>
                <div>
                    <label for="textoFatec" class="req">Texto Fatec</label>
                    <h2 class="contador" id="contadorF">Caracteres Restantes: 700</h2>
                </div>

                <div>
                    <textarea class="tooltip formInput" oninput="contChars(this, 'contadorF')" id="textoFatec"
                        name="textoFatecTec" maxlength="700" rows="4" required></textarea>
                    <span class="tooltiptext">Compartilhe como a Instituição impactou positivamente sua vida.
                        Conte-nos as melhorias, as experiências enriquecedoras e os momentos que você valoriza graças à
                        nossa parceria.</span>
                </div>
            </div>

            <div id="modalReset" class="modal" onclick="fecharModal()">
                <div class="modal-content">
                    <h1>Deseja redefinir o formulário?</h1>
                    <div class="centerItems">
                        <input type="button" class="btn" onclick="resetForm();liberarEnviar() ;fecharModal()"
                            value="Sim">
                        <input type="button" class="btn" onclick="fecharModal()" value="Não">
                    </div>
                </div>
            </div>

            <div id="modalTermo" class="modal" onclick="fecharModal()">
                <div class="modal-content">
                    <h1>
                        Termo de Uso de Imagem e Informação
                    </h1>
                    <h2>
                        Eu autorizo o uso da minha imagem e das informações coletadas nesta pesquisa pela FATEC ZONA
                        LESTE. Essas podem ser utilizadas em qualquer material de divulgação da instituição e de suas
                        atividades, tanto para o público externo quanto interno, desde que sua finalidade não seja
                        desvirtuada. Esta autorização é concedida de forma gratuita e abrange o uso em todo o território
                        nacional e no exterior, em todas as suas modalidades, inclusive na internet. Ao expressar minha
                        vontade desta forma, declaro que autorizo o uso descrito acima sem qualquer reclamação a ser
                        feita quanto a direitos conexos à minha imagem e informações.
                    </h2>
                    <div class="centerItems">
                        <label for="chkTermo" class="btn">Aceito<input id="chkTermo" type="checkbox"
                                onclick="liberarEnviar()"></label>

                    </div>
                </div>
            </div>

            <div>
                <input type="button" class="btn" onclick="abrirModal('modalTermo')" value="Termo de Uso" />
            </div>

            <div>
                <input type="button" class="btn" onclick="limparImagem(); abrirModal('modalReset')" value="Redefinir" />
                <input id="submit" type="submit" class="tooltip btn" value="Finalizar" disabled />
                <span class="tooltiptext">É necessário concordar com os Termos de Uso de Imagem e Informação antes de
                    enviar
                    seus dados.</span>
            </div>

        </div>

    </form>

</body>

</html>