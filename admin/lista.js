function on(meuOL) {
    var overlays = document.getElementsByClassName("overlay");
    overlays[meuOL].style.display = "block";
}

function off() {
    var overlays = document.getElementsByClassName("overlay");
    for (var i = 0; i < overlays.length; i++) {
        overlays[i].style.display = "none";
    }
}

function myFunction() {
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