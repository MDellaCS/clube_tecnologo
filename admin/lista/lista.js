function abrirModal(id) {
    let modais = document.getElementsByClassName("modal");

    for (let i = 0; i < modais.length; i++) {
        if (id == i) {
            modais[i].style.display = "block";
        }
    }

}

function fecharModal() {
    let modais = document.getElementsByClassName("modal");

    for (let i = 0; i < modais.length; i++) {
        modais[i].style.display = "none";
    }
}

function attBusca() {
    var input, tr, i, nome;

    input = document.getElementById("search");
    input = input.value.toUpperCase();

    tr = document.getElementsByClassName("pessoa");
    nome = document.getElementsByClassName("nomePessoa");

    for (i = 0; i < tr.length; i++) {

        nomeAtual = nome[i].id.toUpperCase();

        if (nomeAtual.match(input)) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }

    }
}