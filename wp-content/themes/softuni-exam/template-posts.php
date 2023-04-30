<?php 
    /* Template name: Display all Blog Posts */
?>

<?php get_header(); ?>

<?php 
    $post_args = array(
        'post_type'     => 'post',
        'post_status'   => 'publish',
        'post_per_page' => 7,
        'order_by'      => 'date',
        'order'         => 'DESC',
    );

    $post_query = new Wp_Query( $post_args );


?>

<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
        }
    }

?>

<?php if ( $post_query->have_posts() ) : ?>

    <ul class="properties-listing">

    <?php while ( $post_query->have_posts() ): ?>
        <?php $post_query->the_post(); ?>
        
        <?php get_template_part( 'template-parts/post', 'item' ); ?>

    <?php endwhile ?>

    </ul>

    <?php $property_query->posts_nav_link(); ?>
        
    <?php endif ?>
    <?php wp_reset_postdata(); ?>
		
<?php get_footer(); ?>