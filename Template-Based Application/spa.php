<?php
/**
 * Template Name: Single-Page Application
 */
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
<script>
console.log("Web loading time: ", performance.now());

window.onload = function someFunc() {
	
	/** How many measurements to run */
	const MEASUREMENTS = 100;
	/** How many measurments has been done */
	const TIMES_RUN = (localStorage.getItem("TIMES_RUN")) ?
		parseInt(localStorage.getItem("TIMES_RUN")) : 0;
	
	callAjaxfunc(function() {
	    console.log('Ajax Loaded');
	    var ajaxTime = Math.floor(performance.now());
	    console.log("Loading time with Ajax: ", ajaxTime);
	    
	    if (TIMES_RUN < MEASUREMENTS) { // Save measurment
			/** All measurements of the page load times */
			let dataset = (localStorage.getItem("dataset")) ?
				JSON.parse(localStorage.getItem("dataset")) : {};
	            dataset[TIMES_RUN + 1] = ajaxTime;
			localStorage.setItem("dataset", JSON.stringify(dataset));
	
			localStorage.setItem("TIMES_RUN", TIMES_RUN + 1);
			console.log(`Times run: ${TIMES_RUN + 1} of ${MEASUREMENTS}`);
			document.location.reload();
			
		} else { // Download dataset
			let dataset = JSON.parse(localStorage.getItem("dataset"));
			let csv_row = convertJSONtoCsvRow(dataset);
			let csv_columns = convertJSONtoCsvColumns(dataset);
	
			download("dataset_json.json", localStorage.getItem("dataset"));
			download("dataset_csv_row.csv", csv_row);
			download("dataset_csv_columns.csv", csv_columns);
		}
		
		/**
		 * Converts a single level JSON string to a single row CSV string
		 * @param {object} JSON - Single level JSON
		 * @returns Single row CSV string
		 */
		function convertJSONtoCsvRow(JSON) {
			/** The converted values */
			let csv = ``;
	
			for (let key in JSON) {
				csv += `${JSON[key]},`;
			}
	
			// Remove the last comma sign
			csv = csv.slice(0, -1);
	
			return csv;
		}
	
		/**
		 * Converts a single level JSON string to a multiple row CSV string
		 * @param {object} JSON - Single level JSON
		 * @returns Multiple row CSV string
		 */
		function convertJSONtoCsvColumns(JSON) {
			/** The converted values */
			let csv = "";
	
			for (let key in JSON) {
				csv += key + "," + JSON[key] + "\n";
			}
	
			return csv;
		}
	
		/**
		 * Function to download text as a textfile
		 * 
		 * @param {string} filename - The name of the file
		 * @param {string} text - The contents of the file
		 */
		function download(filename, text) {
			let element = document.createElement('a');
			element.setAttribute(
				'href',
				'data:text/plain;charset=utf-8,' + encodeURIComponent(text)
			);
			element.setAttribute('download', filename);
	
			element.style.display = 'none';
			document.body.appendChild(element);
	
			element.click();
	
			document.body.removeChild(element);
		}
		
	});
	
}

function callAjaxfunc(callback) {
    var href = 'http://wordpress:8888/';
	
	$.ajax({ 
    	url:href,
        type:'GET',
        success: function(data) {
	        $("#content").html(data);
	        callback();
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




