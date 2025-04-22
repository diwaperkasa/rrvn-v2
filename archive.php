<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">
        <div class="mb-3">
            <form action="">
                
            </form>
        </div>
        <?php if (have_posts()): ?>
            <header class="page-header">
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-6">
                        
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <header class="page-header">
                <h1 class="page-title">Oops!!</h1>
            </header>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>