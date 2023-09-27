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