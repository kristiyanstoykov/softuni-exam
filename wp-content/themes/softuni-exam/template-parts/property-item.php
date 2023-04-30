<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title">
            <a href="<?php esc_html_e( get_permalink()); ?>">
                <?php esc_html_e( get_the_title() ); ?>
            </a>
        </h2>
        <div class="property-meta">
            <span class="meta-location">Ovcha Kupel, Sofia</span>
            <?php 
                if ( ! empty( get_field( 'property_area' ) ) ) : ?>

                    <span class="meta-total-area">
                        <?php
                            esc_html_e( 'Total area: ' . get_field( 'property_area' ) );
                        ?>
                    </span>
                <?php else : ?>
                    <span class="meta-total-area">
                        <?php
                            esc_html_e( 'Unknown area' );
                        ?>
                    </span>
            <?php endif ?>
        </div>
        <div class="property-details">
            <?php 
                if ( ! empty( get_field( 'property_price' ) ) ) : ?>

                    <span class="property-price">
                        <?php
                            esc_html_e( '€ ' . get_field( 'property_price' ) );
                        ?>
                    </span>
            <?php else : ?>
                <span class="property-price">
                        <?php
                            esc_html_e( 'Unknown price' );
                        ?>
                    </span>
            <?php endif ?>
            <span class="property-date"> <?php esc_html_e( "Posted on " . get_the_date( 'd-m-Y' ), "softuni-homes"  ); ?></span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail();
                }
                // else {
                //     esc_html_e( '<img src="' . get_template_directory() . '/images/bedroom.jpg">' );
                // }
            ?>
        </div>
    </div>
</li>