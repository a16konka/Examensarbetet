<?php
/**
 * Template Name: Single-Page Application
 */
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script>
var timerStart = Date.now();

window.onload = function someFunc() {
	callAjaxfunc(function() {
	    console.log('Ajax Loaded');
	    console.log("Time until everything loaded: ", Date.now()-timerStart);
	});
}

function callAjaxfunc(callback) {
    var searchEngine = 'http://wordpress:8888/';
	//query = querify(query);
	var href = searchEngine;
	
	$.ajax({ 
    	url:href,
        type:'GET',
        success: function(data) {
	        callback();
	        $("#content").html(data);
	    },
        error: errormsg
	});
	console.log('Page loaded');
	
	function errormsg(jqXHR,textStatus,errorThrown){
	    console.log(jqXHR);
	    alert("AJAX Error: " + errorThrown);     
	}
       
}
</script>
<body>
	<?php get_header(); ?>
    <div id="content"></div>
    <?php get_footer(); ?>
</body>




