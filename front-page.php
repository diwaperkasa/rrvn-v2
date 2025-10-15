<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <?php
            $args = [
                'numberposts' => get_field('how_many_latest_article_to_show'), // Number of recent posts thumbnails to display
                'post_status' => 'publish', // Show only the published posts
                'post_type' => 'post',
                'orderby' => 'post_date',
                'order' => 'DESC',
            ];

            if ($videoCategory = get_category_by_slug('video')) {
                $args['category__not_in'][] = $videoCategory->term_id;
            }

            $recentPosts = wp_get_recent_posts($args);
            $pinnedArticles = array_splice($recentPosts, 0, 4);
        ?>
        <section id="pinned-article" class="mb-3">
            <div class="row">
                <?php foreach ($pinnedArticles as $index => $post): ?>
                    <?php if ($index == 0): ?>
                        <div class="col-md-12">
                            <article <?php post_class("mb-3 mb-md-5", $post['ID']); ?>>
                                <div>
                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                        <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                    </a>
                                </div>
                                <div class="mx-3 mx-md-5 p-3 position-relative text-center article-banner-title bg-white mb-3 shadow">
                                    <?php $categories = get_the_category($post['ID']) ?>
                                    <?php if ($categories): ?>
                                        <a class="text-decoration-none category-article" href="<?= get_term_link($categories[0]->term_id) ?>"><h3 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h3></a>
                                    <?php endif; ?>
                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                        <h1 class="article-title text-dark fw-bold eb-garamond-semibold-font h2"><?= $post['post_title'] ?></h1>
                                    </a>
                                    <?php if ($shortDesc = get_post_meta($post['ID'], '_yoast_wpseo_metadesc', true)): ?>
                                        <div class="article-shortdesc">
                                            <p class="fw-light fs-5 text-dark"><?= $shortDesc; ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6 col-lg-4">
                            <article <?php post_class('', $post['ID']); ?>>
                                <div class="img-hover-zoom">
                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                        <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                    </a>
                                </div>
                                <div class="text-center py-3 py-md-4">
                                    <?php $categories = get_the_category($post['ID']) ?>
                                    <?php if ($categories): ?>
                                        <a class="text-decoration-none category-article" href="<?= get_term_link($categories[0]->term_id) ?>">
                                            <h3 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h3>
                                        </a>
                                    <?php endif; ?>
                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                        <h2 class="article-title text-dark fw-bold eb-garamond-semibold-font h3"><?= $post['post_title'] ?></h2>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <div class="leaderboard top-leaderboard">
            <?= get_ads('top-leaderboard') ?>
        </div>
        <section id="digital-subscription">
            <div class="container">
                <div class="d-block d-md-flex">
                    <?php if (have_rows('magazine_subscription')): ?>
                        <div class="border w-md-75 mb-5 px-2 px-md-4">
                            <div class="row">
                                <?php while(the_repeater_field('magazine_subscription')): ?>
                                    <div class="col-6">
                                        <div class="border rounded p-2 p-md-4 my-2 my-md-4 text-center">
                                            <div class="mb-3">
                                                <span class="h4 fw-bold">GET THE MAGAZINE!</span>
                                            </div>
                                            <div class="mb-3">
                                                <?php $subscriptionImg = get_sub_field('magazine_subscription_image') ?>
                                                <img class="img-fluid" src="<?= $subscriptionImg['url'] ?>" alt="<?= get_sub_field('magazine_subscription_title') ?>">
                                            </div>
                                            <a target="_blank" class="btn btn-danger text-white" href="<?= get_sub_field('magazine_subscription_url') ?>">
                                                <?= get_sub_field('magazine_subscription_title') ?>
                                                <svg style="height: 14px; width: 14px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mx-5">
                            <div class="leaderboard vertical-leaderboard mb-5">
                                <?= get_ads('vertical-leaderboard', 'center') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section id="latest-article">
            <div class="text-center mb-3 mb-md-5">
                <div class="sweet-sans-font position-relative">
                    <h2 class="text-uppercase border-line m-0 p-0">
                        <span class="position-relative bg-white px-2">The Latest</span>
                    </h2>
                </div>
                <span class="latest-date sweet-sans-font"><?= date('l F d, Y') ?></span>
            </div>
            <div class="row">
                <?php foreach ($recentPosts as $post):?>
                    <div class="col-md-6">
                        <article <?php post_class('', $post['ID']) ?>>
                            <div class="img-hover-zoom">
                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                    <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                </a>
                            </div>
                            <div class="text-center py-3 py-md-4">
                                <?php $categories = get_the_category($post['ID']) ?>
                                <?php if ($categories): ?>
                                    <a class="text-decoration-none category-article" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                <?php endif; ?>
                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                    <h3 class="article-title text-dark fw-bold eb-garamond-semibold-font"><?= $post['post_title'] ?></h3>
                                </a>
                                <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                <?php if ($writer): ?>
                                    <div class="categoty-article-writter text-lg-center fw-light">
                                        <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                        <span><span class="fst-italic">By</span> <a class="text-decoration-none" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <section class="leaderboard middle-leaderboard">
            <?php get_ads('middle-leaderboard') ?>
        </section>
        <?php if (have_rows('selected_category')): ?>
            <?php $articleCategoryLength = get_field('how_many_article_category_to_show') ?>
            <?php while(the_repeater_field('selected_category')): ?>
                <?php $mainCategory = get_sub_field('selected_parent_category') ?>
                <section id="<?= $mainCategory->slug ?>-category">
                    <div class="text-center roboto-light-font position-relative mb-5">
                        <h2 class="text-uppercase border-line mb-0">
                            <span class="position-relative bg-white px-2"><?= $mainCategory->name ?></span>
                        </h2>
                    </div>
                    <?php
                        $recentCategoryPosts = wp_get_recent_posts([
                            'numberposts' => $articleCategoryLength, // Number of recent posts thumbnails to display
                            'post_status' => 'publish',
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'category' => $mainCategory->term_id
                        ]);
                        $cover = array_shift($recentCategoryPosts);
                    ?>
                    <div class="row">
                        <div class="col-md-8 col-xl-9">
                            <article <?php post_class('', $cover['ID']) ?>>
                                <div class="img-hover-zoom">
                                    <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                        <?= get_the_post_thumbnail($cover['ID'], 'full') ?>
                                    </a>
                                </div>
                                <div class="text-center py-3 py-md-4">
                                    <?php $categories = get_the_category($cover['ID']) ?>
                                    <?php if ($categories): ?>
                                        <a class="text-decoration-none category-article" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                    <?php endif; ?>
                                    <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                        <h3 class="article-title text-dark fw-bold eb-garamond-semibold-font h1"><?= $cover['post_title'] ?></h3>
                                    </a>
                                    <?php if ($shortDesc = get_post_meta($cover['ID'], '_yoast_wpseo_metadesc', true)): ?>
                                        <div class="article-shortdesc">
                                            <p class="fw-light fs-5"><?= $shortDesc; ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php $writer = wp_get_post_terms($cover['ID'], 'writer', ['field' => 'all']); ?>
                                    <?php if ($writer): ?>
                                        <div class="categoty-article-writter text-lg-center fw-light">
                                            <?php $writer = wp_get_post_terms($cover['ID'], 'writer', ['field' => 'all']); ?>
                                            <span><span class="fst-italic">By</span> <a class="text-decoration-none" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-xl-3">
                            <div class="row">
                                <?php foreach ($recentCategoryPosts as $index => $post): setup_postdata($post)  ?>
                                    <div class="col-md-12">
                                        <article <?= post_class('', $post['ID']) ?>>
                                            <div class="img-hover-zoom">
                                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                    <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                                </a>
                                            </div>
                                            <div class="text-center py-3">
                                                <?php $categories = get_the_category($post['ID']) ?>
                                                <?php if ($categories): ?>
                                                <a class="text-decoration-none category-article" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                                <?php endif; ?>
                                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                    <h3 class="article-title text-dark fw-bold eb-garamond-semibold-font"><?= $post['post_title'] ?></h3>
                                                </a>
                                                <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                                <?php if ($writer): ?>
                                                    <div class="categoty-article-writter text-lg-center fw-light">
                                                        <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                                        <span><span class="fst-italic">By</span> <a class="text-decoration-none" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 text-center mb-5">
                        <a style="width: fit-content" href="<?= get_term_link($mainCategory->term_id) ?>" class="mx-auto d-block sweet-sans-font text-uppercase text-decoration-none h5">
                            <div class="bg-dark px-5 py-3 text-white">
                                Read <?= $mainCategory->name ?> Stories
                            </div>
                        </a>
                    </div>
                </section>
                <?php $childCategories = get_sub_field('selected_child_category'); ?>
                <section id="<?= $mainCategory->slug ?>-child-category" class="child-category">
                    <div class="row">
                        <?php foreach ($childCategories as $childCategory): ?>
                            <div class="col-md-6">
                                <?php
                                    $childCategoriesPosts = wp_get_recent_posts([
                                        'numberposts' => $articleCategoryLength, // Number of recent posts thumbnails to display
                                        'post_status' => 'publish',
                                        'orderby' => 'post_date',
                                        'order' => 'DESC',
                                        'post_type' => 'post',
                                        'category' => $childCategory->term_id
                                    ]);
                                    $cover = array_shift($childCategoriesPosts);
                                ?>
                                <div class="text-center position-relative mb-5">
                                    <h4 class="fs-3 text-center text-uppercase roboto-light-font border-line">
                                        <span class="position-relative bg-white px-2"><?= $childCategory->name ?></span>
                                    </h3>
                                </div>
                                <article <?php post_class("border-bottom", $cover['ID']) ?>>
                                    <div class="img-hover-zoom">
                                        <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                            <?= get_the_post_thumbnail($cover['ID'], 'full') ?>
                                        </a>
                                    </div>
                                    <div class="text-center py-3">
                                        <?php $categories = get_the_category($cover['ID']) ?>
                                        <?php if ($categories): ?>
                                            <a class="text-decoration-none category-article" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                        <?php endif; ?>
                                        <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                            <h3 class="article-title article-title text-dark fw-bold eb-garamond-semibold-font"><?= $cover['post_title'] ?></h3>
                                        </a>
                                        <?php if ($shortDesc = get_post_meta($cover['ID'], '_yoast_wpseo_metadesc', true)): ?>
                                            <div class="article-shortdesc">
                                                <p class="fw-light fs-5"><?= $shortDesc; ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <?php $writer = wp_get_post_terms($cover['ID'], 'writer', ['field' => 'all']); ?>
                                        <?php if ($writer): ?>
                                            <div class="categoty-article-writter text-lg-center fw-light">
                                                <?php $writer = wp_get_post_terms($cover['ID'], 'writer', ['field' => 'all']); ?>
                                                <span><span class="fst-italic">By</span> <a class="text-decoration-none" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </article>
                                <?php foreach ($childCategoriesPosts as $post): ?>
                                    <article <?= post_class("border-bottom py-3", $post['ID']) ?>>
                                        <div class="row">
                                            <div class="col-xl-5">
                                                <div class="img-hover-zoom">
                                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                        <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="text-center text-xl-start pt-3 pt-md-0">
                                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                        <h3 class="article-title article-title text-dark fw-bold eb-garamond-semibold-font"><?= $post['post_title'] ?></h3>
                                                    </a>
                                                    <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                                    <?php if ($writer): ?>
                                                        <div class="categoty-article-writter fw-light">
                                                            <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                                            <span><span class="fst-italic">By</span> <a class="text-decoration-none" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                                <div class="text-center my-3">
                                    <a style="width: fit-content" href="<?= get_term_link($childCategory->term_id) ?>" class="mx-auto d-block sweet-sans-font text-uppercase text-decoration-none h5">
                                        <div class="bg-dark px-5 py-3 text-white mb-5">
                                            Read <?= $childCategory->name ?> Stories
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="mb-5">
            <?php get_template_part( 'parts/most-read-stories'); ?>
        </div>
        <?php if ($videoCategory = get_category_by_slug('video')): ?>
            <section id="video-category" class="video-category mb-5">
                <div class="text-center position-relative mb-5">
                    <h4 class="fs-3 text-center text-uppercase roboto-light-font border-line">
                        <span class="position-relative bg-white px-2">Video</span>
                    </h3>
                </div>
                <?php
                    $videoPosts = wp_get_recent_posts([
                        'numberposts' => 4, // Number of recent posts thumbnails to display
                        'post_status' => 'publish',
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'category' => $videoCategory->term_id
                    ]);
                    $cover = array_shift($videoPosts);
                ?>
                <div class="row">
                    <div class="col-md-8 col-xl-9">
                        <article <?php post_class("mb-3", $cover['ID']) ?>>
                            <div class="img-hover-zoom">
                                <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                    <?= get_the_post_thumbnail($cover['ID'], 'full') ?>
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="row">
                            <?php foreach ($videoPosts as $post): ?>
                                <div class="col-md-12">
                                    <article <?php post_class("mb-3", $post['ID']) ?>>
                                        <div class="img-hover-zoom">
                                            <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <div class="my-3 text-center">
                    <a style="width: fit-content" href="<?= get_term_link($videoCategory->term_id) ?>" class="mx-auto d-block sweet-sans-font text-uppercase text-decoration-none h5">
                        <div class="bg-dark px-5 py-3 text-white">
                            Watch More Video
                        </div>
                    </a>
                </div>
            </section>
        <?php endif;?>
    </div>
</main>

<?php get_footer(); ?>