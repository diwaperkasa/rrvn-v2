<div class="leaderboard vertical-leaderboard">
    <?php get_ads('vertical-leaderboard') ?>
</div>
<section id="most-popular-article">
    <?php $mostPopular = wpp_get_ids([
        'limit' => 5,
        'taxonomy' => 'category',
        // 'term_id' => get_queried_object()->term_id,
        'range' => 'all'
    ]); ?>
    <h4 class="h3 sweet-sans-font mb-3 border-bottom text-center text-md-start fw-bold">Most Popular</h4>
    <div class="row">
        <?php foreach ($mostPopular as $postId): $mostPopularPost = get_post($postId); ?>
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="<?= get_permalink($mostPopularPost->ID) ?>" class="text-decoration-none">
                        <article <?php post_class(); ?>>
                            <div class="py-3 text-center">
                                <?= get_the_post_thumbnail($mostPopularPost->ID, 'full', ['class' => 'rounded-circle']) ?>
                            </div>
                        </article>
                        <div class="text-center">
                            <a href="<?= get_permalink($mostPopularPost->ID) ?>" class="text-decoration-none">
                                <h3 class="categoty-article-title text-dark eb-garamond-semibold-font h5"><?= $mostPopularPost->post_title; ?></h3>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>