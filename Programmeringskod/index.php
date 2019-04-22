<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script type="text/javascript">

    function refreshData(){
		var searchEngine = 'http://wordpress:8888/';
		
		$.ajax({
	    	url:searchEngine,
	        type:'GET',
	        success: results,
	        error: errormsg
		});
	
		function results(data){
		   $("#content").html(data);
		}
		
		function errormsg(jqXHR,textStatus,errorThrown){
		    console.log(jqXHR);
		    alert("AJAX Error: " + errorThrown);     
		}
	}

  </script>
<body onload="refreshData()">
	<?php get_header(); ?>
    <div id="content">Test</div>
    <?php get_footer(); ?>
</body>




