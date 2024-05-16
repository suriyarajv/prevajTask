<?php
/* 
Template Name: Custom Category Template
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <header class="page-header">
            <h1 class="page-title"><?php single_cat_title(); ?></h1>
            <?php if ( category_description() ) : ?>
                <div class="category-description"><?php echo category_description(); ?></div>
            <?php endif; ?>
        </header><!-- .page-header -->

        <?php if ( have_posts() ) : ?>
            <div class="post-list">
                <?php
                // Start the Loop
                while ( have_posts() ) : the_post();
                    // Include the template for the post content
                    get_template_part( 'template-parts/content', 'excerpt' );
                endwhile;
                ?>
            </div><!-- .post-list -->

            <?php // Pagination
            the_posts_pagination( array(
                'prev_text' => __( 'Previous', 'textdomain' ),
                'next_text' => __( 'Next', 'textdomain' ),
            ) );
            ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No posts found', 'textdomain' ); ?></p>
        <?php endif; ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
