function contChars(campo, contID) {
    const cont = document.getElementById(contID);

    cont.innerHTML = "Caracteres Restantes: " + (700 - campo.value.length);
}

function resetForm() {
    document.getElementById("formEgresso").reset();
    fecharModal();
}

function abrirModal() {
    document.getElementById("minhaModal").style.display = "block";
}

function fecharModal() {
    document.getElementById("minhaModal").style.display = "none";
}

function mostrarImagem() {
    const imgPreview = document.getElementById("img-preview");
    const chooseFile = document.getElementById("foto");

    const files = chooseFile.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });
    }
}

function limparImagem() {
    const imgPreview = document.getElementById("img-preview");
    imgPreview.innerHTML = 'Sua foto aqui';
}

var b = false
function mudarFormado() {

    b = !b;

    if (b == true) {
        document.getElementById("labelPrimeiro").disabled = true;
        document.getElementById("labelSegundo").disabled = true;
        document.getElementById("labelAno").disabled = true;
        document.getElementById("ano").disabled = true;

        document.getElementById("labelPrimeiro").style.opacity = "0.15";
        document.getElementById("labelSegundo").style.opacity = "0.15";
        document.getElementById("labelAno").style.opacity = "0.15";
        document.getElementById("ano").style.opacity = "0.15";
    } else {
        document.getElementById("labelPrimeiro").disabled = false;
        document.getElementById("labelSegundo").disabled = false;
        document.getElementById("labelAno").disabled = false;
        document.getElementById("ano").disabled = false;

        document.getElementById("labelPrimeiro").style.opacity = "1";
        document.getElementById("labelSegundo").style.opacity = "1";
        document.getElementById("labelAno").style.opacity = "1";
        document.getElementById("ano").style.opacity = "1";
    }

}