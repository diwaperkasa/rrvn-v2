<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <header class="post__header" role="heading">
                            <h1 class="post__title"><?php the_title(); ?></h1>
                        </header>

                        <div class="post-meta d-flex justify-content-center align-items-center">
                            <div class="post-meta-author">
                                <?php $writer = wp_get_post_terms($post->ID, 'writer', ['field' => 'all']); ?>
                                <span><span class="fst-italic">By</span> <a class="text-decoration-none text-dark" href="/writer/<?= $writer[0]->slug ?>"><span class="text-uppercase"><?= $writer[0]->name ?></span></a></span>
                            </div>
                            <div class="post-meta-button-share">

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
            <div class="col-md-4">
                <div class="d-none d-md-block">

                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
