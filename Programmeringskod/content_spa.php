<?php /** @package WordPress @subpackage Default_Theme  **/
header("Access-Control-Allow-Origin: *"); 
?>
<?php
/**
 * Template Name: Content
 */
?>

<?php $query = new WP_Query( 'cat=1' ); ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<?php get_template_part('article'); ?>
<?php endwhile; ?>

