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
let lightTheme = true;

function toggleTheme() {
    lightTheme = !lightTheme;
    alert("Trocando tema " + lightTheme);
    if (lightTheme === true) {
        root.style.setProperty('--main-color', 'var(--main-color-light)');
        root.style.setProperty('--main-bgcolor', 'var(--main-bgcolor-light)');
        root.style.setProperty('--main-h1', 'var(--main-h1-light)');
        root.style.setProperty('--main-h2', 'var(--main-h2-light)');
        root.style.setProperty('--main-shadow', 'var(--main-shadow-light)');
    } else {
        root.style.setProperty('--main-color', 'var(--main-color-dark)');
        root.style.setProperty('--main-bgcolor', 'var(--main-bgcolor-dark)');
        root.style.setProperty('--main-h1', 'var(--main-h1-dark)');
        root.style.setProperty('--main-h2', 'var(--main-h2-dark)');
        root.style.setProperty('--main-shadow', 'var(--main-shadow-dark)');
    }
}
