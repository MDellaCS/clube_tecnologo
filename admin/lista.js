function alterarCadastro(idCadastro, url) {
    var formData = new FormData();
    formData.append("id", idCadastro);

    var config = {
        method: "POST",
        body: formData
    };

    fetch(url, config).then(() => {
        setTimeout(F5, 300);
    });
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
    var input = document.getElementById("search").value.toLowerCase();
    var tr = document.getElementsByClassName("pessoa");
    var nome = document.getElementsByClassName("nomePessoa");

    for (var i = 0; i < tr.length; i++) {
        var nomeAtual = nome[i].id.toLowerCase();
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

const root = document.documentElement;

if (localStorage.getItem("theme") === null) {
    localStorage.setItem("theme", "light");
}

setTimeout(toggleTheme, 1);

function invertTheme() {
    (localStorage.getItem("theme") == "light") ? localStorage.setItem("theme", "dark") : localStorage.setItem("theme", "light");
    setTimeout(toggleTheme, 1);
}

function toggleTheme() {
    if (localStorage.getItem("theme") == "light") {

        document.getElementById("btnTheme").src = "https://img.icons8.com/ios-glyphs/480/FFFFFF/sun--v1.png";

        root.style.setProperty('--main', 'var(--light-main)');
        root.style.setProperty('--main-hover', 'var(--light-main-hover)');
        root.style.setProperty('--bg', 'var(--light-bg)');
        root.style.setProperty('--h1', 'var(--light-h1)');
        root.style.setProperty('--h2', 'var(--light-h2)');
        root.style.setProperty('--shadow', 'var(--light-shadow)');
        root.style.setProperty('--tooltip', 'var(--light-tooltip)');
        root.style.setProperty('--input-hover', 'var(--light-input-hover)');
    } else if (localStorage.getItem("theme") == "dark") {

        document.getElementById("btnTheme").src = "https://img.icons8.com/ios-glyphs/480/moon-symbol.png";

        root.style.setProperty('--main', 'var(--dark-main)');
        root.style.setProperty('--main-hover', 'var(--dark-main-hover)');
        root.style.setProperty('--bg', 'var(--dark-bg)');
        root.style.setProperty('--h1', 'var(--dark-h1)');
        root.style.setProperty('--h2', 'var(--dark-h2)');
        root.style.setProperty('--shadow', 'var(--dark-shadow)');
        root.style.setProperty('--tooltip', 'var(--dark-tooltip)');
        root.style.setProperty('--input-hover', 'var(--dark-input-hover)');
    }
}

if (localStorage.getItem("theme") == "light") {
    root.style.setProperty('--main', 'var(--light-main)');
    root.style.setProperty('--main-hover', 'var(--light-main-hover)');
    root.style.setProperty('--bg', 'var(--light-bg)');
    root.style.setProperty('--h1', 'var(--light-h1)');
    root.style.setProperty('--h2', 'var(--light-h2)');
    root.style.setProperty('--shadow', 'var(--light-shadow)');
    root.style.setProperty('--tooltip', 'var(--light-tooltip)');
    root.style.setProperty('--input-hover', 'var(--light-input-hover)');
} else if (localStorage.getItem("theme") == "dark") {
    root.style.setProperty('--main', 'var(--dark-main)');
    root.style.setProperty('--main-hover', 'var(--dark-main-hover)');
    root.style.setProperty('--bg', 'var(--dark-bg)');
    root.style.setProperty('--h1', 'var(--dark-h1)');
    root.style.setProperty('--h2', 'var(--dark-h2)');
    root.style.setProperty('--shadow', 'var(--dark-shadow)');
    root.style.setProperty('--tooltip', 'var(--dark-tooltip)');
    root.style.setProperty('--input-hover', 'var(--dark-input-hover)');
}