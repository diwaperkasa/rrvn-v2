<article <?php post_class(); ?>>
    <div class="row">
        <div class="col-md-5">
            <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                <?= get_the_post_thumbnail(get_the_ID(), 'full') ?>
            </a>
        </div>
        <div class="col-md-7">
            <div class="text-center text-md-start py-3 py-md-0">
                <?php $categories = get_the_category(get_the_ID()) ?>
                <?php if ($categories): ?>
                    <div>
                        <a href="<?= get_term_link($categories[0]->term_id) ?>" class="text-decoration-none text-danger text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                    </div>
                <?php endif; ?>
                <a href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none">
                    <h3 class="categoty-article-title text-dark h2 eb-garamond-semibold-font"><?php the_title(); ?></h3>
                </a>
                <div class="categoty-article-shortdesc">

                </div>
                <div class="categoty-article-writter">
                    <?php $writer = wp_get_post_terms(get_the_ID(), 'writer', ['field' => 'all']); ?>
                    <span><span class="fst-italic">By</span> <a class="text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                </div>
            </div>
        </div>
    </div>
</article>
<div class="my-5 border"></div>