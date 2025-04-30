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
        // draggable: false,
        autoPlay: 3000,
        prevNextButtons: false
    });
}

if (typeof(load_more_category_post) !== 'undefined') {
    $('.load-more-category-post').on('click', function(e) {
        const innerHTML = $(e.currentTarget).html();
        let canLoadMore = true;
        load_more_category_post.query.page++;

        $.ajax({
            url: load_more_category_post.url,
            method: 'GET',
            data: load_more_category_post.query,
            beforeSend: function() {
                $(e.currentTarget).prop('disabled', true);
                $(e.currentTarget).html('<div class="loader"></div>');
            },
            success: function(response) {
                response.forEach(function(post) {
                    $('#categoty-article').append(post.html);
                });

                if (response.length < load_more_category_post.query.per_page) {
                    canLoadMore = false;
                }
            },
            complete: function() {
                if (canLoadMore) {
                    $(e.currentTarget).prop('disabled', false);
                }

                $(e.currentTarget).html(innerHTML);
            }
        })
    });
}