function alterarCadastro(idCadastro, url) {
    var formData = new FormData();
    formData.append("id", idCadastro);

    var config = {
        method: "POST",
        body: formData
    };

    fetch(url, config);

    setTimeout(F5, 500);
}

function F5() {
    window.location.reload();
}

function abrirPublicar(id) {
    document.getElementById("confirmPublicar" + id).style.display = "block";
}

function abrirDeletar(id) {
    document.getElementById("confirmDeletar" + id).style.display = "block";
}

function abrirModal(index) {
    const modal = document.querySelector(`#modal${index}`);
    if (modal) {
        modal.style.display = "block";
    }
}

function fecharModal() {
    const modais = document.querySelectorAll(".modal");
    modais.forEach(modal => {
        modal.style.display = "none";
    });
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

