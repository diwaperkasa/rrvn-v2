<!doctype html>
<!--[if IE 8]><html <?php

use PHP_CodeSniffer\Reports\Json;

 language_attributes(); ?> class="ie8"><![endif]-->
<!--[if lte IE 9]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="dns-prefetch" href="//google-analytics.com">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php wp_head(); ?>

    <?php if (get_field('enable_ads', 'option')): ?>
        <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
        <script>
            var gptadslots = [];
            var googletag = googletag || {cmd:[]};
        </script>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>
    <div style="--bs-bg-opacity: .5;" class="offcanvas sweet-sans-font offcanvas-start w-100 min-vh-100 bg-black overflow-hidden" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="container">
            <div class="offcanvas-header">                
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <a href="/"><img class="bg-transparent" alt="Robbreport Viet Nam" width="250" height="auto" src="https://robbreport.com.vn/lib/logo/logo-white.svg"></a>
                    <div>
                        <button data-bs-dismiss="offcanvas" aria-label="Close" class="btn btn-close-offcanvas">
                            <i width="32" height="32"  class="fa-solid fa-xmark m-2 text-white fs-2 rounded-circle bg-danger p-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                <?php $mobileMenus = wp_get_nav_menu_items('mobile-menu'); ?>
                <?php if ($mobileMenus): ?>
                    <div class="d-flex align-items-start flex-sm-row flex-column flex-wrap justify-content-start justify-content-sm-center">
                        <?php foreach ($mobileMenus as $menu): ?>
                            <?php if ($menu->menu_item_parent == 0): ?>
                                <div class="offcanvas-menu">
                                    <ul class="list-group px-md-3">
                                        <li class="py-0 py-md-2 list-group-item ps-0 border-0 border-bottom border-white bg-transparent">
                                            <a style="--bs-link-color: white ; --bs-link-hover-color: #e02020" class="text-decoration-none fs-4" aria-current="page" href="<?= $menu->url ?>"><?= $menu->title ?></a>
                                        </li>
                                        <ul class="list-group m-0 py-2 d-none d-md-block">
                                            <?php foreach ($mobileMenus as $subMenu): ?>
                                                <?php if ($subMenu->menu_item_parent == $menu->ID): ?>
                                                    <li class="list-group-item p-0 border-0 bg-transparent">
                                                        <a style="--bs-link-color: white ; --bs-link-hover-color: #e02020" class="text-decoration-none fs-5" aria-current="page" href="<?= $subMenu->url ?>"><?= $subMenu->title ?></a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div style="--bs-bg-opacity: .5;" class="offcanvas sweet-sans-font offcanvas-end w-100 min-vh-100 bg-black overflow-hidden" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
        <div class="container">
            <div class="offcanvas-header">                
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <a href="/"><img class="bg-transparent" alt="Robbreport Viet Nam" width="250" height="auto" src="https://robbreport.com.vn/lib/logo/logo-white.svg"></a>
                    <div>
                        <button data-bs-dismiss="offcanvas" aria-label="Close" class="btn btn-close-offcanvas">
                            <i width="32" height="32"  class="fa-solid fa-xmark m-2 text-white fs-2 rounded-circle bg-danger p-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <form action="<?= site_url() ?>">
                        <div class="input-group w-100 border-bottom">
                            <span class="input-group-text bg-transparent border-0 text-white fs-3 py-auto" id="search-label"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="search" name="s" class="text-white fs-1 form-control border-0 rounded-0 bg-transparent shadow-none h-100 py-auto wp-search-form" placeholder="Search" aria-describedby="search-label" />
                        </div>
                    </form>
                </div>
                <div class="text-start px-0 px-md-5 mx-0 mx-md-5">
                    <ul id="wp-search-result" class="list-unstyled"></ul>
                </div>
            </div>
        </div>
    </div>
    <header class="container">
        <div class="leaderboard header-leaderboard">
            <?php get_ads('header-leaderboard') ?>
        </div>
        <div class="d-none d-lg-block">
            <div style="grid-template-columns: 30% auto 30%;" class="d-grid">
                <div class="g-col-4">
                    <ul class="list-group d-flex flex-row lh-1 mx-0 my-5 align-self-center">
                        <li style="width: 34px; height: 34px;" class="list-group-item p-2 bg-transparent me-1 border rounded-circle text-center">
                            <a target="_blank" class="text-decoration-none header-media-social d-flex text-dark" href="<?= get_theme_mod('facebook_url', 'javascript:void(0);') ?>">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li style="width: 34px; height: 34px;" class="list-group-item p-0 bg-transparent mx-1 border rounded-circle">
                            <a target="_blank" class="text-decoration-none header-media-social d-flex text-dark" href="<?= get_theme_mod('instagram_url', 'javascript:void(0);') ?>">
                                <i class="fa-brands fa-instagram p-2"></i>
                            </a>
                        </li>
                        <li style="width: 34px; height: 34px;" class="list-group-item p-0 bg-transparent mx-1 border rounded-circle">
                            <a target="_blank" class="text-decoration-none header-media-social d-flex text-dark" href="<?= get_theme_mod('youtube_url', 'javascript:void(0);') ?>">
                                <i class="fa-brands fa-youtube p-2"></i>
                            </a>
                        </li>
                        <li class="list-group-item p-0 border-0 bg-transparent mx-1">
                            <a target="_blank" class="text-decoration-none" href="<?= get_theme_mod('wedding_dreams_url', 'javascript:void(0);') ?>">
                                <img src="<?= esc_url( get_theme_mod( 'wedding_dreams_image' ) ); ?>" alt="" width="200">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="g-col-4 text-center">
                    <a href="<?= site_url() ?>" class="text-decoration-none">
                        <img src="<?= esc_url( get_theme_mod( 'rrvn_logo' ) ); ?>" alt="" width="360">
                    </a>
                </div>
                <div class="g-col-4 text-end">
                    <ul class="list-group d-flex flex-row lh-1 mx-0 my-5 justify-content-end align-items-center">
                        <li class="list-group-item p-0 border-0 bg-transparent me-2 ms-5">
                            <a class="text-decoration-none" href="<?= get_theme_mod('gourmet_collection_url', 'javascript:void(0);') ?>">
                                <img src="<?= esc_url( get_theme_mod( 'gourmet_collection_image' ) ); ?>" alt="" width="100">
                            </a>
                        </li>
                        <li class="list-group-item p-0 ms-2 border-0 bg-transparent">
                            <a target="_blank" class="text-decoration-none text-dark" href="<?= get_theme_mod('subscribe_url', 'javascript:void(0);') ?>">
                                <span class="text-uppercase fw-bold">Subscribe</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="desktop-menu-container" class="sticky-top bg-white">
        <div id="desktop-menu-class-container" class="container">
            <nav id="desktop-menu-nav" class="navbar navbar-expand-lg navbar-light sweet-sans-font py-0">
                <span type="button" class="text-danger p-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                    <i class="fa-solid fa-bars fs-5"></i>
                </span>
                <div id="desktop-menu-rr-logo" class="d-block d-lg-none">
                    <a href="<?= site_url() ?>" class="text-decoration-none">
                        <img width="120" src="<?= esc_url( get_theme_mod( 'rrvn_logo' ) ); ?>" alt="">
                    </a>
                </div>
                <div class="collapse navbar-collapse primary-menu" id="navbarSupportedContent">
                    <?php $primaryMenus = wp_get_nav_menu_items('primary-menu'); ?>
                    <?php if ($primaryMenus): ?>
                        <ul class="navbar-nav text-nowrap flex-wrap me-auto mb-2 mb-lg-0 fw-bold">
                            <?php foreach ($primaryMenus as $menu): ?>
                                <?php if ($menu->menu_item_parent == 0): ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase text-black text-decoration-none" aria-current="page" href="<?= $menu->url ?>"><?= $menu->title ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <li id="subscribe-menu" class="nav-item border-start border-1 border-dark d-none">
                                <a target="_blank" class="nav-link text-uppercase text-black text-decoration-none" aria-current="page" href="<?= get_theme_mod('subscribe_url', 'javascript:void(0);') ?>">Subscribe</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
                <span type="button" class="text-danger p-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                    <i class="fa fa-search p-2 fs-5"></i>
                </span>
            </nav>
        </div>
    </div>