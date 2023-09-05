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