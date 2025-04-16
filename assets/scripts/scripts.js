import $ from 'jquery';
import Flickity from 'flickity';
import {FlickityResponsive} from "flickity-responsive";

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