<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <div class="leaderboard top-leaderboard">
            <?php get_ads('top-leaderboard') ?>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="text-center sweet-sans-font position-relative my-4 my-md-5">
                    <h1 class="text-uppercase border-line mb-0 h2">
                        <span class="position-relative bg-white px-2"><?= get_queried_object()->name ?></span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <section id="categoty-article">
                    <?php $postIndex = 0; while ( have_posts() ) : the_post(); $postIndex++;?>
                        <?php if ($postIndex == 1): ?>
                            <article <?php post_class(); ?>>
                                <div class="img-hover-zoom">
                                    <a href="<?= get_permalink($post) ?>" class="text-decoration-none">
                                        <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                                    </a>
                                </div>
                                <div class="text-center py-3">
                                    <?php $categories = get_the_category($post->ID) ?>
                                    <?php if ($categories): ?>
                                        <div>
                                            <a href="<?= get_term_link($categories[0]->term_id) ?>" class="text-decoration-none text-danger text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                                        <h2 class="article-title text-dark eb-garamond-semibold-font"><?php the_title(); ?></h2>
                                    </a>
                                    <?php if ($shortDesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)): ?>
                                        <div class="categoty-article-shortdesc">
                                            <p class="fw-light fs-5"><?= $shortDesc; ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <div class="categoty-article-writter">
                                        <?php $writer = wp_get_post_terms(get_the_ID(), 'writer', ['field' => 'all']); ?>
                                        <span><span class="fst-italic">By</span> <a class="text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                    </div>
                                </div>
                            </article>
                            <div class="my-4 my-md-5 border"></div>
                            <div class="leaderboard middle-leaderboard my-4 my-md-5">
                                <?php get_ads('middle-leaderboard') ?>
                            </div>
                        <?php else: ?>
                            <?= get_template_part('parts/category-post') ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </section>
                <button class="btn bg-dark text-white w-100 rounded-0 text-uppercase fs-6 p-3 mb-5 load-more-category-post d-flex justify-content-center">
                    View More
                </button>
                <div class="mb-5">
                    <?php get_template_part( 'parts/most-read-stories'); ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_template_part( 'parts/most-popular'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>