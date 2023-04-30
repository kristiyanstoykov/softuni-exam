<?php get_header(); ?>

    <h1><?php the_archive_title(); ?></h1>

    <?php //if ( !empty( the_author_meta( 'user_description' ) ) ) : ?>
        <div>
            <p><?php esc_html_e( the_author_meta( 'user_description' ) ); ?></p>
        </div>
    <?php //endif ?>

    <?php if ( have_posts() ) : ?>

        <ul class="jobs-listing">
            <?php while ( have_posts() ) : ?>

                <?php the_post(); ?>

                <?php get_template_part( '/template-parts/property', 'item' ); ?>

            <?php endwhile ?>
        </ul>

        <?php echo posts_nav_link(); ?>
        
    <?php else : ?>

        <h3><?php esc_html_e( 'No posts found' )?></h3>

    <?php endif ?>


<?php get_footer(); ?>