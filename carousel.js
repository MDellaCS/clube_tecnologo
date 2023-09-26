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
    });
});

$(document).ready(function () {
    $('.lista').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        speed: 1,
        arrows: false,
        rows: 1,
    });
});

function prevLista(){
    $('.lista').slick('slickPrev');
}

function nextLista(){
    $('.lista').slick('slickNext');
}