import $ from 'jquery';
import Flickity from 'flickity';
import './cookieconsent-config.js';

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

function getAbsolutePosition(element) {
    const rect = element.getBoundingClientRect();
    
    return {
        top: rect.top,
        left: rect.left,
        bottom: rect.bottom,
        right: rect.right,
    };
}

const desktopMenuContainer = document.getElementById('desktop-menu-container');
const desktopMenuClassContainer = document.getElementById('desktop-menu-class-container');
const desktopMenuNav = document.getElementById('desktop-menu-nav');
const rrLogo = document.getElementById('desktop-menu-rr-logo');
const subscribeMenu = document.getElementById('subscribe-menu');

window.addEventListener('scroll', () => {
    const desktopNavMenuPosition = getAbsolutePosition(desktopMenuContainer);

    if (desktopNavMenuPosition.top > 0) {
        if (desktopMenuNav.classList.contains('border-bottom')) {
            desktopMenuNav.classList.remove('border-bottom', 'border-1', 'border-dark');
        }

        if (!rrLogo.classList.contains('d-lg-none')) {
            rrLogo.classList.add('d-lg-none');
        }

        if (!subscribeMenu.classList.contains('d-none')) {
            subscribeMenu.classList.add('d-none');
        }

        if (desktopMenuClassContainer.classList.contains('container-menu')) {
            desktopMenuClassContainer.classList.remove('container-menu');
        }
    } else {
        if (!desktopMenuNav.classList.contains('border-bottom')) {
            desktopMenuNav.classList.add('border-bottom', 'border-1', 'border-dark')
        }

        if (rrLogo.classList.contains('d-lg-none')) {
            rrLogo.classList.remove('d-lg-none');
        }

        if (subscribeMenu.classList.contains('d-none')) {
            subscribeMenu.classList.remove('d-none');
        }

        if (!desktopMenuClassContainer.classList.contains('container-menu')) {
            desktopMenuClassContainer.classList.add('container-menu');
        }
    }
});

const mostPopularCarousel = document.querySelector('.most-read-carousel');

if (mostPopularCarousel) {
    const flickity = new Flickity(mostPopularCarousel, {
        freeScroll: false,
        wrapAround: true,
        pageDots: false,
        cellAlign: 'left'
    });
}

const postCarousel = document.querySelectorAll('.gallery');

if (postCarousel.length) {
    postCarousel.forEach(function(gallery) {
        const flickity = new Flickity(gallery, {
            freeScroll: false,
            wrapAround: true,
            pageDots: false,
            autoPlay: true,
            cellAlign: 'center'
        });
    });
}

const bannerCarousel = document.querySelector('.banner-carousel');

if (bannerCarousel) {
    const flickity = new Flickity(bannerCarousel, {
        freeScroll: false,
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

if (typeof(search_post) !== 'undefined') {
    let xhr = null;

    $('.wp-search-form').on('keyup', function(e) {
        if ($(e.currentTarget).val() === "") {
            return;
        }

        if (xhr && xhr.readyState < 4) {
            xhr.abort();
        }

        search_post.query.search = $(e.currentTarget).val();

        xhr = $.ajax({
            url: search_post.url,
            method: 'GET',
            data: search_post.query,
            beforeSend: function() {
                const ul = document.getElementById("wp-search-result");
                ul.innerHTML = null;
            },
            success: function(response) {
                const ul = document.getElementById("wp-search-result");

                response.forEach(function(post) {
                    const li = document.createElement("li");
                    const link = document.createElement("a");
                    // link tag
                    link.innerHTML = post.title.rendered;
                    link.href = post.link;
                    link.classList.add(...['text-white', 'text-decoration-none']);
                    // li tag
                    li.appendChild(link);
                    li.classList.add(...['mb-3', 'fs-4', 'border-bottom']);
                    // append to ul tag
                    ul.appendChild(li);
                });
            },
        });
    });
}

document.querySelector(".video-leaderboard-btn-close").addEventListener('click', function (event) {
    document.querySelector('.floating-video-ad').remove();
});