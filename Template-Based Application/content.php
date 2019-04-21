<?php /** @package WordPress @subpackage Default_Theme  **/
header("Access-Control-Allow-Origin: *"); 
?>
<?php
/**
 * Template Name: Content
 */
?>

<section id="welcome">				
	<div>					
		<span class="title">Welcome to eBook Catalog</span>
		<p class="textPara">
Choose among free epub and Kindle eBooks, download them or read them online. <br>
You will find the world's great literature here, with focus on older works <br>
for which U.S. copyright has expired. <br> 
</p>
	</div> 
	
	<?php get_search_form(); ?>
	
</section>

<?php $query = new WP_Query( 'cat=1' ); ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
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
<?php endwhile; ?>

