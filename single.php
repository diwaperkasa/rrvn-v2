<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <div class="leaderboard top-leaderboard">
            <?php get_ads('top-leaderboard') ?>
        </div>
        <div class="row">
            <div class="col-md-9">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class("border-bottom mb-4"); ?>>
                        <div class="post-breadcrumb">
                            <div class="post-meta d-flex justify-content-between align-items-center">
                                <div class="post-meta-category my-2">
                                    <?php $categories = get_the_category($post->ID) ?>
                                    <?php if ($categories): ?>
                                        <a href="<?= get_term_link($categories[0]->term_id) ?>" class="text-decoration-none text-dark text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="post-meta-date">
                                    <span class="sweet-sans-font fs-6"><?= get_the_date('l F d, Y', $post) ?></span>
                                </div>
                            </div>
                        </div>

                        <header class="post__header" role="heading">
                            <h1 class="post__title"><?php the_title(); ?></h1>
                            <?php if ($shortDesc = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true)): ?>
                                <h2 class="fw-light fs-5"><?= $shortDesc; ?></h2>
                            <?php endif; ?>
                        </header>

                        <div class="post-meta d-flex justify-content-between align-items-center">
                            <?php $writers = wp_get_post_terms($post->ID, 'writer', ['field' => 'all']); ?>
                            <?php if ($writers && !is_wp_error($writers)): ?>
                                <div class="post-meta-author categoty-article-writter fw-light">
                                    <span class="writers-name">
                                        <span class="fst-italic">By</span>
                                        <?php foreach ($writers as $term): ?>
                                            <a class="text-decoration-none text-dark me-2 writer-name" href="<?= get_term_link($term->term_id) ?>"><span class="text-uppercase"><?= $term->name ?></span></a>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <div class="post-meta-button-share py-3">
                                <div class="d-none d-md-block">
                                    <button class="btn border rounded-0" data-sharer="whatsapp" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                        <i class="fa-brands fa-whatsapp opacity-50"></i>
                                    </button>
                                    <button class="btn border rounded-0" data-sharer="facebook" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                        <i class="fa-brands fa-facebook-f opacity-50"></i>
                                    </button>
                                    <button class="btn border rounded-0" data-sharer="x" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                        <i class="fa-brands fa-twitter opacity-50"></i>
                                    </button>
                                    <button class="btn border rounded-0" data-sharer="linkedin" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                        <i class="fa-brands fa-linkedin-in opacity-50"></i>
                                    </button>
                                    <button class="btn border rounded-0" data-sharer="email" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                        <i class="fa-regular fa-envelope opacity-50"></i>
                                    </button>
                                </div>
                                <div class="d-md-none dropstart">
                                    <button class="btn border rounded-0 mb-md-0 dropdown-toggle" type="button" id="share-media-social-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-share-nodes opacity-50"></i>
                                    </button>
                                    <ul class="share-media-social-menu min-w-0 dropdown-menu p-0 border-0 bg-transparent me-1" aria-labelledby="share-media-social-btn">
                                        <li>
                                            <button class="btn border rounded-0 mb-1 bg-white shadow" data-sharer="whatsapp" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                                <i class="fa-brands fa-whatsapp opacity-50"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn border rounded-0 mb-1 bg-white shadow" data-sharer="facebook" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                                <i class="fa-brands fa-facebook-f opacity-50"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn border rounded-0 mb-1 bg-white shadow" data-sharer="x" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                                <i class="fa-brands fa-twitter opacity-50"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn border rounded-0 mb-1 bg-white shadow" data-sharer="linkedin" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                                <i class="fa-brands fa-linkedin-in opacity-50"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="btn border rounded-0 bg-white shadow" data-sharer="email" data-title="Share from RobbRepport Vietnam! <?php the_title(); ?>" data-url="<?= get_permalink(get_queried_object_id()) ?>">
                                                <i class="fa-regular fa-envelope opacity-50"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="post-cover mb-4">
                            <?= get_the_post_thumbnail($post, 'full') ?>
                        </div>

                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>

                        <footer class="post__footer">
                        </footer>
                    </article>
                    <section class="mb-4 px-5 pb-2 border-bottom">
                        <h2 class="sweet-sans-font h5 mb-4">RELATED STORIES</h2>
                        <?php
                            $relatedArgs = array(
                                'post_type' => 'post',
                                'posts_per_page' => 10,
                                'post_status' => 'publish',
                                'post__not_in' => array(get_the_ID()),
                                'orderby' => 'rand',
                            );

                            $relatedPost = new WP_Query($relatedArgs);
                        ?>
                        <div class="related-post">
                            <ul class="list-unstyled">
                                <?php while( $relatedPost->have_posts() ): $relatedPost->the_post(); ?>
                                    <li class="mb-2 d-flex align-items-center" style="letter-spacing: .03125rem;">
                                        <svg class="me-1" width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6 12" fill="none" class=""><path fill="#e12027" d="M5.88,5.58.3,0C.22,0,.11,0,.05.17A.93.93,0,0,0,0,.74L1.88,6,0,11.26a.93.93,0,0,0,0,.57c0,.11.1.17.16.17A.11.11,0,0,0,.3,12L5.88,6.42A.68.68,0,0,0,6,6,.68.68,0,0,0,5.88,5.58Z"></path></svg>
                                        <a style="--bs-link-color: 255, 255, 255; --bs-link-hover-color: #e12027" href="<?= get_permalink(get_the_ID()) ?>" class="text-decoration-none"><?php the_title(); ?></a>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    </section>
                    <section id="subscribe-footer" class="mb-5 px-0 px-md-5">
                        <?php $tags = wp_get_post_terms($post->ID, 'post_tag', ['field' => 'all']); ?>
                        <?php if ($tags): ?>
                            <div class="mb-3 d-block d-lg-flex text-center justify-content-center">
                                <span class="fs-5 fw-normal mb-0 text-nowrap">READ MORE ON:</span>
                                <ul class="list-unstyled justify-content-center justify-content-lg-start d-flex flex-wrap fs-5 mb-0">
                                    <?php foreach ($tags as $tag): ?>
                                        <li class="mx-2"><a style="--bs-border-color: #e02020" class="text-decoration-none text-dark text-uppercase border-bottom fw-bold" href="<?= get_term_link($tag->term_id) ?>"><?= $tag->name ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="d-block text-center d-md-flex justify-content-center align-items-center">
                            <div class="text-center mx-auto mx-md-0 mb-4 mb-md-0 desc">
                                <span class="eb-garamond-font fs-5">Like this article? Get the Robb Report newsletter for similar stories delivered straight to your inbox.</span>
                            </div>
                            <a href="<?= get_theme_mod('subscribe_url', 'javascript:void(0);') ?>" target="_blank" class="sign-up-btn ms-0 ms-md-4 border border-danger text-danger fs-4 px-4 py-2 align-items-center text-uppercase text-decoration-none">Sign up</a>
                        </div>
                    </section>
                <?php endwhile; ?>
            </div>
            <div class="col-md-3">
                <?php get_template_part( 'parts/most-popular'); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
