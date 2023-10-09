function abrirModal(id) {
    const modal = document.querySelector(`#modal${id}`);
    if (modal) {
        modal.style.display = "block";
    }
}

function fecharModal(num) {

    if (num === undefined) {
        document.getElementById("todos").style.zIndex = 1;
        document.body.style.overflow = "auto";
    }

    const modais = document.querySelectorAll(".modal");
    modais.forEach(modal => {
        modal.style.display = "none";
    });

    if (num === 1) {
        document.getElementById("btns").style.zIndex = 1;
        document.getElementById("recentes").style.zIndex = 1000;
        document.getElementById("init2").style.display = "block";
    } else if (num === 2) {
        document.getElementById("alvo").scrollIntoView({ behavior: 'smooth' });
        document.getElementById("recentes").style.zIndex = 0;
        document.getElementById("todos").style.zIndex = 1000;
        document.getElementById("init3").style.display = "block";
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
        document.getElementById("btnPrev").src = "https://img.icons8.com/ios/480/FFFFFF/less-than.png";
        document.getElementById("btnNext").src = "https://img.icons8.com/ios/480/FFFFFF/more-than.png";

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
        document.getElementById("btnPrev").src = "https://img.icons8.com/ios/480/less-than.png";
        document.getElementById("btnNext").src = "https://img.icons8.com/ios/480/more-than.png";

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

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById("btnTheme").src = "https://img.icons8.com/ios-glyphs/480/FFFFFF/sun--v1.png";
        document.getElementById("btnPrev").src = "https://img.icons8.com/ios/480/FFFFFF/less-than.png";
        document.getElementById("btnNext").src = "https://img.icons8.com/ios/480/FFFFFF/more-than.png";
    });

    root.style.setProperty('--main', 'var(--light-main)');
    root.style.setProperty('--main-hover', 'var(--light-main-hover)');
    root.style.setProperty('--bg', 'var(--light-bg)');
    root.style.setProperty('--h1', 'var(--light-h1)');
    root.style.setProperty('--h2', 'var(--light-h2)');
    root.style.setProperty('--shadow', 'var(--light-shadow)');
    root.style.setProperty('--tooltip', 'var(--light-tooltip)');
    root.style.setProperty('--input-hover', 'var(--light-input-hover)');
} else if (localStorage.getItem("theme") == "dark") {

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById("btnTheme").src = "https://img.icons8.com/ios-glyphs/480/moon-symbol.png";
        document.getElementById("btnPrev").src = "https://img.icons8.com/ios/480/less-than.png";
        document.getElementById("btnNext").src = "https://img.icons8.com/ios/480/more-than.png";
    });

    root.style.setProperty('--main', 'var(--dark-main)');
    root.style.setProperty('--main-hover', 'var(--dark-main-hover)');
    root.style.setProperty('--bg', 'var(--dark-bg)');
    root.style.setProperty('--h1', 'var(--dark-h1)');
    root.style.setProperty('--h2', 'var(--dark-h2)');
    root.style.setProperty('--shadow', 'var(--dark-shadow)');
    root.style.setProperty('--tooltip', 'var(--dark-tooltip)');
    root.style.setProperty('--input-hover', 'var(--dark-input-hover)');
}

document.addEventListener('DOMContentLoaded', function () {

    if (!localStorage.getItem("modaisExibidas")) {

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            document.getElementById("mobile").style.display = "block";
        } else {
            document.body.style.overflow = "hidden";
            document.getElementById("init1").style.display = "block";
            document.getElementById("btns").style.zIndex = 6;
            localStorage.setItem("modaisExibidas", "true");
        }

    }
});