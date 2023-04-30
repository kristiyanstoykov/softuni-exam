<?php softuni_view_counter( get_the_ID() ); ?>
<div class="property-single">
		<main class="property-main">
			<div class="property-card">
				<div class="property-primary">
					<header class="property-header">
						<h2 class="property-title">
							<a href="<?php get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="property-meta">
                            <span class="meta-location"><?php esc_html_e( softuni_display_single_term( get_the_ID(), 'location' ) ); ?></span>
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
							<span class="meta-views">
								<?php
									if ( empty( get_post_meta( get_the_ID(), 'property_views', true ) ) ) {
										esc_html_e( 'Views: 0' );
									} else {
										esc_html_e( 'Views: ' . get_post_meta( get_the_ID(), 'property_views', true ) );
									}
								?>
							</span>
							<span class="meta-likes">
								<?php
									if ( empty( get_post_meta( get_the_ID(), 'property_likes', true ) ) ) {
										esc_html_e( 'Likes: 0' );
									} else {
										esc_html_e( 'Likes: ' . get_post_meta( get_the_ID(), 'property_likes', true ) );
									}
								?>
                        	</span>
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
					</header>

					<div class="property-body">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</main>
		<aside class="property-secondary">
			<div class="property-logo">
				<div class="property-logo-box">
					<img src=
						<?php

							$thumbnail_url = get_template_directory_uri() . "/dist/img/default-company-logo.png";

							if ( has_post_thumbnail() ) {
								$thumbnail_url = get_the_post_thumbnail_url();
							}

							esc_html_e( $thumbnail_url );

						?>
					alt="Post thumbnail">

					<?php //the_post_thumbnail( 'medium' ) ?>
				</div>
			</div>
			<a href="#" class="button button-wide"><?php esc_html_e( 'Buy now', 'softuni-homes' ) ?></a>
			<a href="#" id="<?php esc_html_e( get_the_ID() ); ?>" class="like-button button-wide">Like👍</a>
		</aside>
	</div>