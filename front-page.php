<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <section id="banner">
            <?php $articles = get_field('carousel_articles'); ?>
            <div class="banner-carousel mb-5">
                <?php foreach ($articles as $article): ?>
                    <?php $post = get_post($article) ?>
                    <article <?php post_class(); ?>>
                        <div class="img-hover-zoom">
                            <a class="text-decoration-none" href="<?= get_permalink(get_the_ID()) ?>">
                                <?= get_the_post_thumbnail($post, 'full') ?>
                            </a>
                        </div>
                        <div class="mx-3 mx-md-5 p-3 position-relative text-center article-banner-title bg-white mb-3 shadow">
                            <?php $categories = get_the_category($post->ID) ?>
                            <?php if ($categories): ?>
                                <a class="text-decoration-none" href="<?= get_term_link($categories[0]->term_id) ?>"><h3 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h3></a>
                            <?php endif; ?>
                            <a class="text-decoration-none" href="<?= get_permalink(get_the_ID()) ?>">
                                <h2 class="text-dark fw-bold eb-garamond-semibold-font"><?php the_title() ?></h2>
                            </a>
                            <p>Trong bối cảnh ẩm thực ngày nay, những quầy bar bình dân đang giúp mang lại nguồn tài chính ổn định cho mảng fine dining.</p>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <!-- <section id="pinned-article" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <article>
                        <div class="img-hover-zoom">
                            <img class="img-fluid img-wrapper" src="https://robbreport.com.vn/_next/image?url=https%3A%2F%2Fstorage.googleapis.com%2Ftd-robb-media%2F2025%2F3%2Fc8cddc0c-5f77-44e0-9e68-6fde48a6a2d7.JPG&w=1080&q=100" alt="">
                        </div>
                        <div class="text-center">
                            <h3 class="mt-3 fs-6 text-center text-danger text-uppercase sweet-sans-font">Gourmet Collection</h3>
                            <h2 class="fs-3 fw-bold eb-garamond-semibold-font">[Cà phê sáng] Nhà sáng lập T.U.N.G dining và Å by TUNG bật mí sự thật trong kinh doanh ẩm thực cao cấp</h2>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article>
                        <div class="img-hover-zoom">
                            <img class="img-fluid img-wrapper" src="https://robbreport.com.vn/_next/image?url=https%3A%2F%2Fstorage.googleapis.com%2Ftd-robb-media%2F2025%2F3%2Fa887b5b8-65be-4d10-8fe6-db2b8ed9532b.webp&w=1080&q=100" alt="">
                        </div>
                        <div class="text-center">
                            <h3 class="mt-3 fs-6 text-center text-danger text-uppercase sweet-sans-font">Money</h3>
                            <h2 class="fs-3 fw-bold eb-garamond-semibold-font">Báo cáo Thịnh vượng Knight Frank 2025: cơ hội trong biến động</h2>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article>
                        <div class="img-hover-zoom">
                            <img class="img-fluid img-wrapper" src="https://robbreport.com.vn/_next/image?url=https%3A%2F%2Fstorage.googleapis.com%2Ftd-robb-media%2F2025%2F3%2Fc5309faf-f34a-4767-b130-bd7cf9f16b63.jpg&w=1080&q=100" alt="">
                        </div>
                        <div class="text-center">
                            <h3 class="mt-3 fs-6 text-center text-danger text-uppercase sweet-sans-font">News</h3>
                            <h2 class="fs-3 fw-bold eb-garamond-semibold-font">Boongke “Tận thế” xa xỉ trị giá 300 triệu USD dành cho giới siêu giàu</h2>
                        </div>
                    </article>
                </div>
            </div>
        </section> -->
        <section id="latest-article">
            <div class="text-center mb-3 mb-md-5">
                <div class="sweet-sans-font position-relative">
                    <h2 class="text-uppercase border-line m-0 p-0">
                        <span class="position-relative bg-white px-2">The Latest</span>
                    </h2>
                </div>
                <span><?= date('l F d, Y') ?></span>
            </div>
            <?php
                $recentPosts = wp_get_recent_posts([
                    'numberposts' => get_field('how_many_latest_article_to_show'), // Number of recent posts thumbnails to display
                    'post_status' => 'publish', // Show only the published posts
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                ]);
            ?>
            <div class="row">
                <?php foreach ($recentPosts as $post): ?>
                    <div class="col-md-6">
                        <article <?php post_class() ?>>
                            <div class="img-hover-zoom">
                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                    <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                </a>
                            </div>
                            <div class="text-center py-3 py-md-4">
                                <?php $categories = get_the_category($post['ID']) ?>
                                <?php if ($categories): ?>
                                    <a class="text-decoration-none" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                <?php endif; ?>
                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                    <h3 class="text-dark fw-bold eb-garamond-semibold-font"><?= $post['post_title'] ?></h3>
                                </a>
                                <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                <?php if ($writer): ?>
                                    <span><span class="fst-italic georgia-font">By </span><a style="letter-spacing: 1.35px;" class="sweet-sans-font text-uppercase text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><?= $writer[0]->name ?></a></span>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
        <?php if (have_rows('selected_category')): ?>
            <?php $articleCategoryLength = get_field('how_many_article_category_to_show') ?>
            <?php while(the_repeater_field('selected_category')): ?>
                <?php $mainCategory = get_sub_field('selected_parent_category') ?>
                <section id="<?= $mainCategory->slug ?>-category">
                    <div class="text-center sweet-sans-font position-relative mb-3">
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
                            <article <?php post_class() ?>>
                                <div class="img-hover-zoom">
                                    <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                        <?= get_the_post_thumbnail($cover['ID'], 'full') ?>
                                    </a>
                                </div>
                                <div class="text-center py-3 py-md-4">
                                    <?php $categories = get_the_category($cover['ID']) ?>
                                    <?php if ($categories): ?>
                                        <a class="text-decoration-none" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                    <?php endif; ?>
                                    <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                        <h3 class="text-dark fw-bold eb-garamond-semibold-font"><?= $cover['post_title'] ?></h3>
                                    </a>
                                    <?php $writer = wp_get_post_terms($cover['ID'], 'writer', ['field' => 'all']); ?>
                                    <?php if ($writer): ?>
                                        <span><span class="fst-italic georgia-font">By </span><a style="letter-spacing: 1.35px;" class="sweet-sans-font text-uppercase text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><?= $writer[0]->name ?></a></span>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-xl-3">
                            <div class="row">
                                <?php foreach ($recentCategoryPosts as $index => $post): ?>
                                    <div class="col-md-12">
                                        <article class="<?= post_class() ?>">
                                            <div class="img-hover-zoom">
                                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                    <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                                </a>
                                            </div>
                                            <div class="text-center py-3">
                                                <?php $categories = get_the_category($post['ID']) ?>
                                                <?php if ($categories): ?>
                                                <a class="text-decoration-none" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                                <?php endif; ?>
                                                <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                    <h3 class="text-dark fw-bold eb-garamond-semibold-font"><?= $post['post_title'] ?></h3>
                                                </a>
                                                <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                                <?php if ($writer): ?>
                                                    <span><span class="fst-italic georgia-font">By </span><a style="letter-spacing: 1.35px;" class="sweet-sans-font text-uppercase text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><?= $writer[0]->name ?></a></span>
                                                <?php endif; ?>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 text-center">
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
                                <div class="text-center position-relative">
                                    <h4 class="fs-3 text-center text-uppercase sweet-sans-font border-line">
                                        <span class="position-relative bg-white px-2"><?= $childCategory->name ?></span>
                                    </h3>
                                </div>
                                <article <?php post_class("border-bottom") ?>>
                                    <div class="img-hover-zoom">
                                        <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                            <?= get_the_post_thumbnail($cover['ID'], 'full') ?>
                                        </a>
                                    </div>
                                    <div class="text-center py-3">
                                        <?php $categories = get_the_category($cover['ID']) ?>
                                        <?php if ($categories): ?>
                                            <a class="text-decoration-none" href="<?= get_term_link($categories[0]->term_id) ?>"><h4 class="fs-6 text-center text-danger text-uppercase sweet-sans-font"><?= $categories[0]->name ?></h4></a>
                                        <?php endif; ?>
                                        <a class="text-decoration-none" href="<?= get_permalink($cover['ID']) ?>">
                                            <h3 class="text-dark fw-bold eb-garamond-semibold-font"><?= $cover['post_title'] ?></h3>
                                        </a>
                                        <?php $writer = wp_get_post_terms($cover['ID'], 'writer', ['field' => 'all']); ?>
                                        <?php if ($writer): ?>
                                            <span><span class="fst-italic georgia-font">By </span><a style="letter-spacing: 1.35px;" class="sweet-sans-font text-uppercase text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><?= $writer[0]->name ?></a></span>
                                        <?php endif; ?>
                                    </div>
                                </article>
                                <?php foreach ($childCategoriesPosts as $post): ?>
                                    <article <?= post_class("border-bottom py-3") ?>>
                                        <div class="row">
                                            <div class="col-xl-5">
                                                <div class="img-hover-zoom">
                                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                        <?= get_the_post_thumbnail($post['ID'], 'full') ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="text-center text-md-start pt-3 pt-md-0">
                                                    <a class="text-decoration-none" href="<?= get_permalink($post['ID']) ?>">
                                                        <h3 class="text-dark fw-bold eb-garamond-semibold-font"><?= $post['post_title'] ?></h3>
                                                    </a>
                                                    <?php $writer = wp_get_post_terms($post['ID'], 'writer', ['field' => 'all']); ?>
                                                    <?php if ($writer): ?>
                                                        <span><span class="fst-italic georgia-font">By </span><a style="letter-spacing: 1.35px;" class="sweet-sans-font text-uppercase text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><?= $writer[0]->name ?></a></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                                <div class="text-center my-3">
                                    <a style="width: fit-content" href="<?= get_term_link($childCategory->term_id) ?>" class="mx-auto d-block sweet-sans-font text-uppercase text-decoration-none h5">
                                        <div class="bg-dark px-5 py-3 text-white">
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
    </div>
</main>

<?php get_footer(); ?>