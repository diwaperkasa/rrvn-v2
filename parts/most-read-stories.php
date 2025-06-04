<section id="most-read-article">
    <h4 class="most-read-article border-bottom d-inline-block">MOST-READ STORIES</h4>
    <?php
        $args = [
            'limit' => 10,
            'taxonomy' => 'category',
            // 'term_id' => get_queried_object()->term_id,
            'range' => 'all'
        ];

        if ($videoCategory = get_category_by_slug('video')) {
            $args['term_id'] = "-{$videoCategory->term_id}";
        }
    
        $mostRead = wpp_get_ids($args);
    ?>
    <div class="most-read-carousel py-3">
        <?php foreach ($mostRead as $postId): $mostReadPost = get_post($postId); ?>
            <div class="most-read-cell px-0 px-sm-1 px-md-3">
                <a href="<?= get_permalink($mostReadPost->ID) ?>" class="text-decoration-none">
                    <article <?php post_class(); ?>>
                        <figure class="gallery-item wp-caption ">
                            <?= get_the_post_thumbnail($mostReadPost->ID, 'full') ?>
                            <figcaption class="wp-caption-text text-center">
                                <?php $categories = get_the_category($mostReadPost->ID) ?>
                                <?php if ($categories): ?>
                                    <div>
                                        <a href="<?= get_term_link($categories[0]->term_id) ?>" class="text-decoration-none text-danger text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                                    </div>
                                <?php endif; ?>
                                <a href="<?= get_permalink($mostReadPost->ID) ?>" class="text-decoration-none">
                                    <h3 class="categoty-article-title text-dark eb-garamond-semibold-font h5"><?= $mostReadPost->post_title; ?></h3>
                                </a>
                            </figcaption>
                        </figure>
                    </article>
                </a>
            </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>