<div class="property-single">
		<main class="property-main">
			<div class="property-card">
				<div class="property-primary">
					<header class="property-header">
						<h2 class="property-title">
							<a href="<?php get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="property-details">
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
					<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
					?>
				</div>
			</div>
			<a href="#" id="<?php esc_html_e( get_the_ID() ); ?>" class="like-button button button-wide">Like👍</a>
		</aside>
	</div>