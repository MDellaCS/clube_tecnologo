function alterarCadastro(idCadastro, url) {
    var formData = new FormData();
    formData.append("id", idCadastro);

    var config = {
        method: "POST",
        body: formData
    };

    fetch(url, config);

    setTimeout(F5, 100);
}

function F5(){
    window.location.reload();
}

function abrirPublicar(id) {
    document.getElementById("confirmPublicar" + id).style.display = "block";
}

function abrirDeletar(id) {
    document.getElementById("confirmDeletar" + id).style.display = "block";
}

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
    var input, tr, i, nome, nomeAtual;

    input = document.getElementById("search");
    input = input.value.toLowerCase();

    tr = document.getElementsByClassName("pessoa");
    nome = document.getElementsByClassName("nomePessoa");

    for (i = 0; i < tr.length; i++) {
        nomeAtual = nome[i].id.toLowerCase();
        var nomeOriginal = nome[i].id;

        if (nomeAtual.indexOf(input) !== -1) {
            var nomeDestacado = nomeOriginal.replace(new RegExp(input, 'gi'), function (match) {
                return "<span class='highlighted'>" + match + "</span>";
            });
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }

        nome[i].innerHTML = nomeDestacado;
    }
}

