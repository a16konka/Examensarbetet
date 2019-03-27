<section id="welcome">				
		<div>					
			<span class="title">Välkommen till Hyperphoto</span>
			<p class="textPara">
	Här kan du boka en professionell fotograf för en evenemang i förväg.<br> 
	Vår utrustning är bäst i branschen med <br>
	den högsta kvalitet möjligt.</p>
		</div> 
		
		<a href="<?php echo home_url(); ?>/?page_id=17">Search Page</a>
	</section>
	
	    <?php while ( have_posts() ) : the_post(); ?>
      <article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <?php if ( !is_page() ):?>
          <section class="entry-meta">
          <p>Posted on <?php the_date();?> by <?php the_author();?></p>
          </section>
        <?php endif; ?>
        <section class="entry-content">
          <?php the_content(); ?>
        </section>
        <section class="entry-meta"><?php if ( count( get_the_category() ) ) : ?>
          <span class="category-links">
            Posted under: <?php echo get_the_category_list( ', ' ); ?>
          </span>
        <?php endif; ?></section>
      </article>
    <?php endwhile; ?>