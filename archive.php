<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <section id="taxonomy-page">
            <?php if (have_posts()): ?>
                <header class="page-header text-center">
                    <h1 class="page-title eb-garamond-semibold-font">Archive Posts</h1>
                </header>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-6">
                            <article <?php post_class('py-5 border-bottom') ?>>
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
            <?php endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>