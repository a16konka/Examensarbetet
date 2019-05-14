<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>
<?php get_search_form(); ?>
<?php
$s=get_search_query();
$args = array(
                's' =>$s,
                'cat' => 1
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
    _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
    while ( $the_query->have_posts() ) {
       $the_query->the_post();
             ?>
                <?php get_template_part('article'); ?>
             <?php
    }
}else{
?>
    <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
    <div class="alert alert-info">
      <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    </div>
<?php } ?>

<?php
get_footer();
?>