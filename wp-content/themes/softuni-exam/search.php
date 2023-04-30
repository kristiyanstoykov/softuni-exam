<?php get_header(); ?>


    <h1>
        <?php esc_html_e( 'Search results', 'softuni-jobs' ) ?>
    </h1>

    <?php if ( have_posts() ) : ?>

        <ul class="properties-listing">

            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <?php get_template_part( 'template-parts/post', 'item' ); ?>

            <?php endwhile ?>

        </ul>

    <?php else : ?>

        <h2><?php esc_html_e( 'No posts found' )?></h2>

    <?php endif ?>
<?php get_footer(); ?>