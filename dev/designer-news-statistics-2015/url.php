<?php

function get_url ($url) {

	$cache = file("urlcache.txt");

	foreach ($cache as $i => $row) {

		$urldata = explode(";", $row);

		if ($urldata[0] == $url) {
			return $urldata[1];

		}

	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); //set url
	curl_setopt($ch, CURLOPT_HEADER, true); //get header
	curl_setopt($ch, CURLOPT_NOBODY, true); //do not include response body
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //do not show in browser the response
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //follow any redirects
	curl_exec($ch);
	$true_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); //extract the url from the header response
	curl_close($ch);


	file_put_contents("urlcache.txt", $url.";".$true_url."\n", FILE_APPEND);

	// return $true_url;
	echo " — Done.\n";

}

$urls = file('urls.txt');

foreach ($urls as $i => $url) {
	$url = trim($url);
	echo ($i+1)." — ".$url."\n";
	get_url($url);
}

?>