<!doctype html>
<!--[if IE 8]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
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
    <?php wp_head(); ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/assets/font/eb-garamond-2-webfont/style.css' ?>"/>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/assets/font/roboto-webfont/style.css' ?>"/>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/assets/font/sweet-sans-pro-webfont/style.css' ?>"/>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/assets/font/georgia-2-webfont/style.css' ?>"/>

    <title>Robbrepport Vietnam</title>

    <style>
        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            font-family: "Roboto Regular", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            font-feature-settings: normal;
            font-variation-settings: normal;
        }

        .img-wrapper {
            object-fit: cover;
            aspect-ratio: 16 / 9;
        }

        .nav-form-search {
            input {
                width: 0px;
                transition: all .5s;
            }

            svg, .fa {
                top: 12px;
                right: 0px;
            }

            input.active {
                padding-right: 30px;
                border-radius: 100px;
                top: 1px;
                right: -10px;
                width: 300px !important;
                border: 1px solid #ced4da !important;
            }
        }

        .sweet-sans-font {
            font-family: "Sweet Sans Pro Regular" !important;
        }

        .roboto-font {
            font-family: "Roboto Regular" !important;
        }

        .eb-garamond-font {
            font-family: "EB Garamond" !important;
        }

        .georgia-font {
            font-family: "Georgia Regular" !important;
        }

        .article-banner-title {
            margin-top: -4rem;
        }

        .border-line:before {
            border-top: .1px solid #000;
            content: "";
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            z-index: -1;
        }

        .offcanvas-menu {
            width: 100%;
        }

        .offcanvas-menu .list-group-item.border-bottom {
            border-bottom: none !important;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 576px) {
            .offcanvas-menu {
                width: 20%;
            }

            .offcanvas-menu .list-group-item.border-bottom {
                border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
                margin-right: 0;
                margin-left: 0;
            }
        }

        .footer {
            font-size: 12px;
            background-color: #eae8e3;
            line-height: 0;
        }

        .footer-menu {
            font-size: 12px;
        }
    </style>
</head>
<body <?php body_class(); ?>>
    <div class="offcanvas sweet-sans-font offcanvas-top w-100 vh-100 bg-black" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="container mt-4">
            <div class="offcanvas-header">                
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <a href="/"><img class="bg-transparent" alt="Robbreport Viet Nam" width="360" height="auto" src="https://robbreport.com.vn/lib/logo/logo-white.svg"></a>
                    <div class="p-2">
                        <button data-bs-dismiss="offcanvas" aria-label="Close">
                            <i width="32" height="32"  class="fa-solid fa-xmark m-2 text-white fs-2 rounded-circle bg-danger p-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex align-items-start flex-sm-row flex-column flex-wrap justify-content-start justify-content-sm-center">
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Cars</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Marine</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Aviation</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Watches</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Styles</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">Grooming</li>
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">Fashion</li>
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">Jewellery</li>
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">Beauty</li>
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">Accessories</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Home</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Food & Drink</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Travel</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Money</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                    <div class="offcanvas-menu">
                        <ul class="list-group">
                            <li class="list-group-item ps-0 border-0 border-bottom border-white bg-transparent text-white fs-4">Robb Sociery</li>
                            <ul class="list-group m-0 py-2 d-none d-md-block">
                                <li class="list-group-item p-0 border-0 bg-transparent text-white fs-5">News</li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-white sweet-sans-font">
            <div class="container">
                <span type="button" class="text-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa-solid fa-bars"></i></span>
                <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" aria-current="page" href="#">Aviation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Marine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Watches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Style</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Travel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Food & Drink</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Money</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Robb Society</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase mx-1 text-black" href="#">Long Form</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav fw-bold">
                        <li class="nav-item border-start">
                            <a class="nav-link text-uppercase mx-1 text-black me-4" href="#">Subscribe</a>
                        </li>
                        <li class="nav-item">
                            <form class="position-relative ms-2 nav-form-search" action="">
                                <input class="position-absolute border-0 form-control shadow-none" type="search">
                                <span type="button" class="fa fa-search position-absolute search-button"></span>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>