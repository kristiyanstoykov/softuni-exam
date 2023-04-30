<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title">
            <a href="<?php esc_html_e( get_permalink()); ?>">
                <?php esc_html_e( get_the_title() ); ?>
            </a>
        </h2>
        <div class="property-meta">
            <span class="categories">
                <?php the_category(); ?>
            </span>
        </div>
        <div class="property-details">
            <span class="property-date"> <?php esc_html_e( "Posted on " . get_the_date( 'd-m-Y' ), "softuni-homes"  ); ?></span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
            ?>
        </div>
    </div>
</li>