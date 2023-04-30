<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

		<ul class="properties-listing">

        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

			<?php get_template_part( 'template-parts/property', 'item' ); ?>

        <?php endwhile ?>

		</ul>
    <?php endif ?>
		
<?php get_footer(); ?>