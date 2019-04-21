<!DOCTYPE html>
<html>
<head>

<!-- jQuery -->	
<script src="jquery/jquery-1.8.2.min.js"></script>
<script src="jquery/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
	
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
</head>
<body>
   <input oninput="update(this.value)" type="text">
   <div id="content"></div>
</body>
</html>