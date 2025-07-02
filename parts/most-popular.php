<section id="most-popular-article" class="d-flex flex-column h-100">
    <div class="vertical-leaderboard-container">
        <div class="leaderboard vertical-leaderboard mb-md-auto">
            <?php get_ads('vertical-leaderboard') ?>
        </div>
    </div>
    <div class="most-popular-post d-none d-md-block">
        <?php
            $args = [
                'limit' => 5,
                'taxonomy' => 'category',
                // 'term_id' => get_queried_object()->term_id,
                'range' => 'all'
            ];

            if ($videoCategory = get_category_by_slug('video')) {
                $args['term_id'] = "-{$videoCategory->term_id}";
            }

            $mostPopular = wpp_get_ids($args);
        ?>
        <h4 class="h3 sweet-sans-font mb-3 border-bottom text-center text-md-start fw-bold text-uppercase">Most Popular</h4>
        <div class="row">
            <?php foreach ($mostPopular as $postId): $mostPopularPost = get_post($postId); ?>
                <div class="col-md-12">
                    <div class="mb-3">
                        <a href="<?= get_permalink($mostPopularPost->ID) ?>" class="text-decoration-none">
                            <article <?php post_class(); ?>>
                                <div class="py-3 text-center">
                                    <?= get_the_post_thumbnail($mostPopularPost->ID, 'full', ['class' => 'rounded-circle']) ?>
                                </div>
                                <div class="text-center">
                                    <a href="<?= get_permalink($mostPopularPost->ID) ?>" class="text-decoration-none">
                                        <h3 class="article-title text-dark eb-garamond-semibold-font h5"><?= $mostPopularPost->post_title; ?></h3>
                                    </a>
                                </div>
                            </article>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="leaderboard square-leaderboard">
            <?php get_ads('square-leaderboard') ?>
        </div>
    </div>
</section>