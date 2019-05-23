<?php
/**
 * Single-Page Application functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since 1.0
 */ 
 ?>
 
 <script type="text/javascript">
	 var TIMES_RUN = (localStorage.getItem("TIMES_RUN")) ?
			parseInt(localStorage.getItem("TIMES_RUN")) : 0;
 </script>

<?php
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
	var start;
	var end;
	let dataset;
	
	function fetch(){
	
	    jQuery.ajax({
	        url: '<?php echo admin_url('admin-ajax.php'); ?>',
	        type: 'post',
	        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
	        success: function(data) {
	            jQuery('#content').html( data );
	        }
	    });
	    console.log('Start');
	    start = new Date().getTime();
	
	}
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <?php get_template_part('article'); ?>
        <?php endwhile;
        wp_reset_postdata();
    else:
    ?>
	    <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
	    <div class="alert alert-info">
	      <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
	    </div>
	<?php
    endif;
    ?>
    <script>console.log( 'Slut' );
		
/*
	    end = new Date().getTime();
	    var ajaxTime = end-start;
	    console.log('milliseconds passed', ajaxTime);
	    var numItems = $('.blog-card').length;
	    var word = $('#keyword').val();
	    
	    dataset = (localStorage.getItem("dataset")) ?
				JSON.parse(localStorage.getItem("dataset")) : {};
	            dataset[TIMES_RUN + 1] = ajaxTime + "," + word + "," + numItems;
			localStorage.setItem("dataset", JSON.stringify(dataset));
		
		localStorage.setItem("TIMES_RUN", TIMES_RUN + 1);
*/
    </script>
    <?php
    die();
}
?>


	