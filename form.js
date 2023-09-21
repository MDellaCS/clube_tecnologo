function contChars(campo, contID) {
    const cont = document.getElementById(contID);

    cont.innerHTML = "Caracteres Restantes: " + (700 - campo.value.length);
}

function resetForm() {

    document.getElementById("formEgresso").reset();
    mudarFormado();

    const contadores = document.querySelectorAll(".contador");
    contadores.forEach(contador => {
        contador.textContent = "Caracteres Restantes: " + 700;
    });

}

function abrirModal(idModal) {
    document.getElementById(idModal).style.display = "block";
}

function fecharModal() {
    var modais = document.getElementsByClassName("modal");

    Array.from(modais).forEach(elemento => {
        elemento.style.display = "none";
    });
}

function mostrarImagem() {
    const imgPreview = document.getElementById("img-preview");
    const chooseFile = document.getElementById("foto");

    const file = chooseFile.files[0];

    if (file) {
        const fileReader = new FileReader();

        fileReader.onload = function () {
            const image = new Image();
            image.src = fileReader.result;
            image.alt = "Imagem selecionada";
            imgPreview.innerHTML = "";
            imgPreview.appendChild(image);
        };

        fileReader.readAsDataURL(file);
    } else {
        imgPreview.innerHTML = "Nenhuma imagem selecionada";
    }
}


function limparImagem() {
    const imgPreview = document.getElementById("img-preview");
    imgPreview.innerHTML = 'Sua foto aqui';
}

function mudarFormado() {
    const formado = document.getElementById("formado");
    const cursando = document.getElementById("cursando");
    const wrapper = document.getElementById("dadosFormado");
    const primeiro = document.getElementById("primeiro");
    const segundo = document.getElementById("segundo");
    const ano = document.getElementById("ano");
    const wrapperContent = wrapper.children;

    Array.from(wrapperContent).forEach(elemento => {
        if (formado.checked) {
            elemento.style.opacity = 1;
            elemento.style.pointerEvents = "auto";
            primeiro.required = true;
            segundo.required = true;
            ano.required = true;
        } else if (cursando.checked) {
            elemento.style.opacity = 0.15;
            elemento.style.pointerEvents = "none";
            primeiro.required = false;
            segundo.required = false;
            ano.required = false;
        }
    });
}

function liberarEnviar() {
    const btnSubmit = document.getElementById("submit");
    const chkTermo = document.getElementById("chkTermo");

    if (chkTermo.checked) {
        btnSubmit.disabled = false;
        btnSubmit.classList.remove("tooltip");
    } else {
        btnSubmit.disabled = true;
        btnSubmit.classList.add("tooltip");
    }
}

const root = document.documentElement;

if (localStorage.getItem("theme") === null) {
    alert("Não definido um tema");
    localStorage.setItem("theme", "light");
}

setTimeout(toggleTheme, 1);

function invertTheme() {
    (localStorage.getItem("theme") == "light") ? localStorage.setItem("theme", "dark") : localStorage.setItem("theme", "light");
    setTimeout(toggleTheme, 1);
}

function toggleTheme() {
    if (localStorage.getItem("theme") == "light") {

        document.getElementsByClassName("icon btn floatR")[0].src = "https://img.icons8.com/ios-glyphs/480/FFFFFF/sun--v1.png";

        root.style.setProperty('--main', 'var(--light-main)');
        root.style.setProperty('--main-hover', 'var(--light-main-hover)');
        root.style.setProperty('--bg', 'var(--light-bg)');
        root.style.setProperty('--h1', 'var(--light-h1)');
        root.style.setProperty('--h2', 'var(--light-h2)');
        root.style.setProperty('--shadow', 'var(--light-shadow)');
        root.style.setProperty('--tooltip', 'var(--light-tooltip)');
        root.style.setProperty('--input-hover', 'var(--light-input-hover)');
    } else if (localStorage.getItem("theme") == "dark") {

        document.getElementsByClassName("icon btn floatR")[0].src = "https://img.icons8.com/ios-glyphs/480/moon-symbol.png";

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