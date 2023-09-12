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