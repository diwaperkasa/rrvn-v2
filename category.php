<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="text-center sweet-sans-font position-relative my-5">
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
                                <a href="<?= get_permalink($post) ?>" class="text-decoration-none">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                                </a>
                                <div class="text-center py-3">
                                    <?php $categories = get_the_category($post->ID) ?>
                                    <?php if ($categories): ?>
                                        <div>
                                            <a href="<?= get_term_link($categories[0]->term_id) ?>" class="text-decoration-none text-danger text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                                        <h2 class="categoty-article-title text-dark eb-garamond-semibold-font"><?php the_title(); ?></h2>
                                    </a>
                                    <div class="categoty-article-shortdesc">
                                        
                                    </div>
                                    <div class="categoty-article-writter">
                                        <?php $writer = wp_get_post_terms(get_the_ID(), 'writer', ['field' => 'all']); ?>
                                        <span><span class="fst-italic">By</span> <a class="text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                    </div>
                                </div>
                            </article>
                            <div class="my-5 border"></div>
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
                    <section id="most-read-article">
                        <h4 class="most-read-article border-bottom d-inline-block">MOST-READ STORIES</h4>
                        <?php
                            new WP_Query(array(
                                'posts_per_page' => 5,
                                'meta_key' => 'wpb_post_views_count',
                                'orderby' => 'meta_value_num',
                                'order' => 'DESC'
                            ));
                        ?>
                        <div class="most-read-carousel py-3">
                            <?php while ( have_posts() ) : the_post();?>
                                <div class="most-read-cell px-0 px-md-3">
                                    <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                                        <article <?php post_class(); ?>>
                                            <figure class="gallery-item wp-caption ">
                                                <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                                                <figcaption class="wp-caption-text">
                                                    <?php the_title() ?>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-md-3">
                <section id="most-popular-article">
                    <?php
                        $mostPopular = new WP_Query(array(
                            'posts_per_page' => 5,
                            'meta_key' => 'wpb_post_views_count',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC'
                        ));
                    ?>
                    <h4 class="sweet-sans-font mb-3 border-bottom">Most Popular</h4>
                    <div class="row">
                        <?php while ($mostPopular->have_posts()) : $mostPopular->the_post(); ?>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                                        <article <?php post_class(); ?>>
                                            <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                                        </article>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>