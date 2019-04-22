// ==UserScript==
// @name measure_twa_page_load_time
// @namespace Violentmonkey Scripts
// @match http://wordpress:8888/twa/*
// @grant none
// @require  
// ==/UserScript==

window.onload = function () {

	/** The time it took to load the entire page */
	const LOAD_TIME = performance.now();
    var result = Math.floor(LOAD_TIME);
	/** How many measurements to run */
	const MEASUREMENTS = 100;
	/** How many measurments has been done */
	const TIMES_RUN = (localStorage.getItem("TIMES_RUN")) ?
		parseInt(localStorage.getItem("TIMES_RUN")) : 0;

	if (TIMES_RUN < MEASUREMENTS) { // Save measurment
		/** All measurements of the page load times */
		let dataset = (localStorage.getItem("dataset")) ?
			JSON.parse(localStorage.getItem("dataset")) : {};
            dataset[TIMES_RUN + 1] = result;
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

};