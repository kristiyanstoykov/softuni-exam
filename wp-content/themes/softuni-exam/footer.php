		
		<footer class="site-footer">
			<p> <?php esc_html_e( get_bloginfo() ); ?> &copy; Copyright <?php esc_html_e( date( 'Y' ) ); ?> |
			</p>

            <div class="footer-menu">
				<?php if ( has_nav_menu( 'footer_menu' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer_menu',
						)
					);
				}
				?>
			</div>

		</footer>
	</div>

    <?php wp_footer(); ?>

</body>
</html> 