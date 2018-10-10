<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Bent-Metal-Blog-WordPress-Theme
 * @since Bent Metal Blog WordPress Theme 1.0.0
 */
get_header(); ?>

	<div class="error-404">
		<section class="container-fluid">
			<div class="section-content">
				<div class="wordmark-logo col-xs-8 col-xs-offset-2 col-ms-6 col-ms-offset-3 col-sm-4 col-sm-offset-4">
					<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/_/img/bent-metal-logo2.png" alt="Bent Metal Snowboard Bindings" /></a>
				</div>
				<h2 class="error-message col-xs-12">Error 404 - Page Not Found</h2>
				<div class="bb-phillips-logo col-xs-12 col-ms-8 col-ms-offset-2 col-sm-6 col-sm-offset-3">
					<img src="<?php echo get_template_directory_uri(); ?>/_/img/bent-metal-logo.png" alt="New Bent Metal Bindings" />
				</div>
			</div>
		</section>
	</div>

<?php get_footer(); ?>
