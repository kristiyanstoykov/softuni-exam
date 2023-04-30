		
		<footer class="site-footer">
			<p>&copy; Copyright <?php esc_html_e( date( 'Y' ) ); ?> | Developer links: 
				<a href="#">Edits</a>,
				<a href="#">Home</a>,
				<a href="#">Single</a>
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