<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package discrete-base-theme
 */

?>

		</div><!-- #content -->
		<?php if( have_rows( 'footer_options', 'option' ) ) {
			while( have_rows( 'footer_options', 'option' ) ): the_row();
				$footer_color = get_sub_field( 'footer_color' );
		endwhile;
		} ?>
		<footer id="colophon" class="site-footer rainbow-header rainbow-header__thick" style="background-color: <?php echo $footer_color ?>">
			<div class="row">
				<div class="col-md-6">
					<div class="footer__site-info">
						<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>
						<?php
						endif; ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="footer__social-icons">
						<i class="fab fa-twitter"></i>
						<i class="fab fa-facebook-f"></i>
						<i class="fab fa-instagram"></i>
					</div>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- #container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
