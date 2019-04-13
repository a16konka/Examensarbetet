<section id="welcome">				
		<div>					
			<span class="title">Välkommen till Hyperphoto</span>
			<p class="textPara">
	Här kan du boka en professionell fotograf för en evenemang i förväg.<br> 
	Vår utrustning är bäst i branschen med <br>
	den högsta kvalitet möjligt.</p>
		</div> 
		
		<?php get_search_form(); ?>
		
	</section>
	
    <!--
    <?php while ( have_posts() ) : the_post(); ?>
  		<div id="post-<?php the_ID(); ?>" class="blog-card">
		<div class="meta">
		  <div class="photo" style="background-image: url(https://i.pinimg.com/originals/89/6b/33/896b330a7e3db100386dad57d918725a.jpg)"></div>
		</div>
		<div class="description">
		  <h1><?php the_title(); ?></h1>
		  <h2>by <?php the_author();?></h2>
		  <p><?php the_content(); ?></p>
		  <p class="read-more">
		    <a href="<?php echo esc_url( get_permalink() ); ?>">Read More</a>
		  </p>
		</div>
		</div>
  	<?php endwhile; ?>
-->

			<?php if ( have_posts() ) : ?>

			<?php 	while ( have_posts() ) : the_post(); ?>


					 
					 <div id="post-<?php the_ID(); ?>" class="blog-card">
		<div class="meta">
		  <div class="photo" style="background-image: url(https://i.pinimg.com/originals/89/6b/33/896b330a7e3db100386dad57d918725a.jpg)"></div>
		</div>
		<div class="description">
		  <h1><?php the_title(); ?></h1>
		  <h2>by <?php the_author();?></h2>
		  <p><?php the_content(); ?></p>
		  <p class="read-more">
		    <a href="<?php echo esc_url( get_permalink() ); ?>">Read More</a>
		  </p>
		</div>
		</div>

				<?php endwhile; ?>

				<?php the_posts_pagination( array(
					'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				) );
				?>
			<?php else : ?>

				get_template_part( 'template-parts/post/content', 'none' );

			<?php endif; ?>
