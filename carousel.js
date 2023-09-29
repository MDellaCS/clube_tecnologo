$(document).ready(function () {
    $('.carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: 'cubic-bezier(0.15, 0.75, 0.55, 1.25)',
        speed: 450,
        arrows: false,
        pauseOnFocus: false,
        centerMode: true,
    });
});

let currentPage = 1;
const itemsPerPage = 24;
let isFirstTime = true;

function attLista(pagina) {
    if (pagina === 0 && currentPage > 1) {
        currentPage--;
    } else if (pagina === 1 && currentPage < Math.ceil(numItens / itemsPerPage)) {
        currentPage++;
    }

    var listaItems = document.querySelectorAll('.lista-item');
    var startIndex = (currentPage - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;

    listaItems.forEach(function (item, index) {
        item.style.display = (index >= startIndex && index < endIndex) ? 'block' : 'none';
    });

    if (!isFirstTime) {
        var alvoTopo = document.getElementById('todos');
        if (alvoTopo) alvoTopo.scrollIntoView({ behavior: 'smooth' });
    } else {
        isFirstTime = false;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    attLista(0);
});