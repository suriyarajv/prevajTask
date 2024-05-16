<?php
/* 
Template Name: Custom Post Template
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                // Display the post content
                the_content();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
