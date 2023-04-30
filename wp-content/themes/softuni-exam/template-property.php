<?php 
    /* Template name: Display Property */
?>

<?php get_header(); ?>

<?php 
    $property_args = array(
        'post_type'     => 'property',
        'post_status'   => 'publish',
        'post_per_page' => 7,
        'order_by'      => 'date',
        'order'         => 'ASC',
    );

    $property_query = new Wp_Query( $property_args );


?>

<?php 
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
        }
    }

?>

<?php if ( $property_query->have_posts() ) : ?>

    <ul class="properties-listing">

    <?php while ( $property_query->have_posts() ): ?>
        <?php $property_query->the_post(); ?>
        
        <?php get_template_part( 'template-parts/post', 'item' ); ?>

    <?php endwhile ?>

    </ul>

    <?php $property_query->posts_nav_link(); ?>
        
    <?php endif ?>
    <?php wp_reset_postdata(); ?>
		
<?php get_footer(); ?>