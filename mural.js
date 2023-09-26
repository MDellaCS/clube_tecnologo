function abrirModal(idModal) {
    document.getElementById(idModal).style.display = "block";
}

function fecharModal() {
    var modais = document.getElementsByClassName("modal");

    Array.from(modais).forEach(elemento => {
        elemento.style.display = "none";
    });
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
        document.getElementById("btnPrev").src = "https://img.icons8.com/ios-filled/480/FFFFFF/back.png";
        document.getElementById("btnNext").src = "https://img.icons8.com/ios-filled/480/FFFFFF/forward.png";

        https://img.icons8.com/ios-filled/100/back.png

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
        document.getElementById("btnPrev").src = "https://img.icons8.com/ios-filled/480/back.png";
        document.getElementById("btnNext").src = "https://img.icons8.com/ios-filled/480/forward.png";

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