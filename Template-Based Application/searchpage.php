<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<?php get_template_part('content'); ?>	

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_search_form(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
