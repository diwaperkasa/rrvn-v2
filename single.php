<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <div class="post-breadcrumb">
                            <div class="post-meta d-flex justify-content-between align-items-center">
                                <div class="post-meta-category my-2">
                                    <?php $categories = get_the_category($post->ID) ?>
                                    <?php if ($categories): ?>
                                        <a href="<?= get_term_link($categories[0]->term_id) ?>" class="text-decoration-none text-dark text-uppercase sweet-sans-font fs-6"><?= $categories[0]->name ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="post-meta-date">
                                    <span class="sweet-sans-font fs-6"><?= get_the_date('l F d, Y') ?></span>
                                </div>
                            </div>
                        </div>

                        <header class="post__header" role="heading">
                            <h1 class="post__title"><?php the_title(); ?></h1>
                        </header>

                        <div class="post-meta d-flex justify-content-between align-items-center">
                            <div class="post-meta-author">
                                <?php $writer = wp_get_post_terms($post->ID, 'writer', ['field' => 'all']); ?>
                                <span><span class="fst-italic">By</span> <a class="text-decoration-none text-dark" href="<?= get_term_link($writer[0]->term_id) ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                            </div>
                            <div class="post-meta-button-share py-3">
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
                        </div>
                        
                        <div class="post-cover mb-4">
                            <?= get_the_post_thumbnail($post, 'full') ?>
                        </div>

                        <div class="post-content px-5">
                            <?php the_content(); ?>
                        </div>

                        <footer class="post__footer">
                            <!-- <p class="post__date"><time><?php echo human_time_diff(strtotime($post->post_date)) . ' ' . __('ago'); ?></time></p> -->
                            <!-- <p class="post__comments"><?php comments_popup_link(__('No comments yet'), __('1 comment'), __('% comments')); ?></p> -->
                        </footer>

                    </article>
                <?php endwhile; ?>
            </div>
            <div class="col-md-3">
                <div class="d-none d-md-block">

                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
