import $ from 'jquery';
import Flickity from 'flickity';

/**
 * Mobile navigation toggle
 * @param {mixed} event
 */

const toggleMenu = (event) => {
    event.preventDefault();
    $('.js-menu-toggle').toggleClass('open');
    $('body').toggleClass('menu-open');
    $('.header__navigation').fadeToggle();
};

$('.js-menu-toggle').on('click', toggleMenu);

const mostPopularCarousel = document.querySelector('.most-read-carousel');

if (mostPopularCarousel) {
    const flickity = new Flickity(mostPopularCarousel, {
        freeScroll: true,
        wrapAround: true,
        pageDots: false,
        cellAlign: 'left'
    });
}

const postCarousel = document.querySelectorAll('.gallery');

if (postCarousel.length) {
    postCarousel.forEach(function(gallery) {
        const flickity = new Flickity(gallery, {
            freeScroll: true,
            wrapAround: true,
            pageDots: false,
            autoPlay: true,
        });
    });
}

const bannerCarousel = document.querySelector('.banner-carousel');

if (bannerCarousel) {
    const flickity = new Flickity(bannerCarousel, {
        freeScroll: true,
        wrapAround: true,
        pageDots: false,
        autoPlay: true,
        draggable: false,
        autoPlay: 3000,
        prevNextButtons: false
    });
}