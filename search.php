<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <section id="search-page">
            <form action="<?= site_url() ?>">
                <div class="mb-3">
                    <input class="form-control border border-4 shadow-none rounded-0" type="search" value="<?= get_search_query() ?>" name="s" placeholder="Search"/>
                </div>
            </form>
            <?php if (have_posts()): ?>
                <header class="page-header">
                    <h1 class="page-title eb-garamond-semibold-font"><?php printf( __( 'Search results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-6">
                            <article <?php post_class('py-3 py-md-5 border-bottom') ?>>
                                <div class="img-hover-zoom">
                                    <a class="text-decoration-none" href="<?= get_permalink(get_the_ID()) ?>">
                                        <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                                    </a>
                                </div>
                                <div class="text-center pt-3">
                                    <?php $categories = get_the_category(get_the_ID()) ?>
                                    <?php if ($categories): ?>
                                        <a class="text-decoration-none" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                    <?php endif; ?>
                                    <a class="text-decoration-none" href="<?= get_permalink(get_the_ID()) ?>">
                                        <h3 class="text-dark fw-bold eb-garamond-semibold-font"><?= get_the_title() ?></h3>
                                    </a>
                                    <?php $writer = wp_get_post_terms(get_the_ID(), 'writer', ['field' => 'all']); ?>
                                    <?php if ($writer): ?>
                                        <span><span class="fst-italic georgia-font">By </span><a style="letter-spacing: 1.35px;" class="sweet-sans-font text-uppercase text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><?= $writer[0]->name ?></a></span>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="my-5 text-center">
                    <?= get_the_posts_pagination(["mid_size" => 2, "prev_text" => 'Previous', "next_text" => 'Next']);?>
                </div>
            <?php else: ?>
                <header class="page-header">
                    <h1 class="page-title">Oops, no result for <?= get_search_query() ?>!!</h1>
                </header>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>