<?php /** @package WordPress @subpackage Default_Theme  **/
header("Access-Control-Allow-Origin: *"); 
?>
<?php
/**
 * Template Name: Article
 */
?>

<div id="post-<?php the_ID(); ?>" class="blog-card">
	<div class="meta">
	  <div class="photo" style="background-image: url(https://i.pinimg.com/originals/89/6b/33/896b330a7e3db100386dad57d918725a.jpg)"></div>
	</div>
	<div class="description">
	  <h1><?php the_title(); ?></h1>
	  <p><?php the_content(); ?></p>
	  <p class="read-more">
	    <a href="<?php echo esc_url( get_permalink() ); ?>">Read More</a>
	  </p>
	</div>
</div>