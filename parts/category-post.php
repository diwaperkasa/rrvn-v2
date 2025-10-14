<article <?php post_class(); ?>>
    <div class="row">
        <div class="col-lg-5">
            <div class="img-hover-zoom">
                <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                    <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
                </a>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="text-center text-lg-start py-3 py-md-0">
                <?php $categories = get_the_category(get_the_ID()) ?>
                <?php if ($categories): ?>
                    <a href="<?= get_term_link($categories[0]->term_id) ?>" class="category-article text-decoration-none text-danger text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                <?php endif; ?>
                <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                    <h3 class="article-title text-dark eb-garamond-semibold-font"><?php the_title(); ?></h3>
                </a>
                <?php if ($shortDesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true)): ?>
                    <div class="article-shortdesc">
                        <p class="fw-light fs-5"><?= $shortDesc; ?></p>
                    </div>
                <?php endif; ?>
                <?php $writers = wp_get_post_terms(get_the_ID(), 'writer', ['field' => 'all']); ?>
                <?php if ($writers && !is_wp_error($writers)): ?>
                    <div class="categoty-article-writter text-lg-center fw-light">
                        <span>
                            <span class="fst-italic">By</span>
                            <?php foreach ($writers as $term): ?>
                                <a class="text-decoration-none me-1" href="<?= get_term_link($term->term_id) ?>"><span class="text-uppercase"><?= $term->name ?></span></a>
                            <?php endforeach; ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>
<div class="my-4 my-lg-5 border"></div>