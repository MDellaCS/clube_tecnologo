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
        document.getElementById("labelPrimeiro").style.display = "none";
        document.getElementById("labelSegundo").style.display = "none";
        document.getElementById("labelAno").style.display = "none";
        document.getElementById("ano").style.display = "none";
    } else {
        document.getElementById("labelPrimeiro").style.display = "inline";
        document.getElementById("labelSegundo").style.display = "inline";
        document.getElementById("labelAno").style.display = "inline";
        document.getElementById("ano").style.display = "inline";
    }

};
