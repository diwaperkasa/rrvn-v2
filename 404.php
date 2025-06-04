<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <section id="404-page">
            <div class="my-5 text-center">
                <img style="max-height: 300px;" class="mb-5" src="<?= get_stylesheet_directory_uri() . "/assets/images/404.png" ?>" alt="404 image">
                <h1 class="page-title">Oops, this page could not be found. Maybe try a search?</h1>
            </div>
            <div class="mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center mx-0 mx-lg-5 px-0 px-lg-5">
                            <form class="mx-0 mx-lg-5 px-0 px-lg-5" action="<?= site_url() ?>" method="GET">
                                <input class="form-control border border-4 shadow-none rounded-0" type="search" value="<?= get_search_query() ?>" name="s" placeholder="Search"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>