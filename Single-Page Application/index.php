<!DOCTYPE html>
<html>
<head>

<!-- jQuery -->	
<script src="jquery/jquery-1.8.2.min.js"></script>
<script src="jquery/jquery-1.10.2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
<script>
function querify(query) {
    return query.split(" ").join("+") // replaces spaces with +s for url
}

function update(query){
	var searchEngine = 'http://wordpress:8888/?s=';
	query = querify(query);
	var href = searchEngine + query;
	
	$.ajax({
    	url:href,
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
</head>
<body onload="update('')">
   <input oninput="update(this.value)" type="text">
   <div id="content">Test</div>
</body>
</html>