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
function updateIframe(query) {
    query = querify(query);
    var i = document.getElementById("searchResults");
    var searchEngine = "http://wordpress:8888/?s=" 
    var yourSiteToSearch= "site:example.com+"
    i.src = searchEngine + query;
}
</script>

<script>
	
	var href = 'http://wordpress:8888/?s=';
	
	$.ajax({
    url:href,
        type:'GET',
        success: results,
        error: errormsg
});

function results(data){
   $("#content").load(href + " #primary");
}

function errormsg(jqXHR,textStatus,errorThrown){
    console.log(jqXHR);
    alert("AJAX Error: " + errorThrown);     
}
</script>
</head>
<body>
   <input oninput="updateIframe(this.value)" type="text">
   <div id="content">Test</div>
</body>
</html>