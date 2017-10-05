<?php

	include 'Coordinate_find.php';
	include 'yt_geolocatn.php';

	$ytsearch = $_POST["ytsearch"];
	$addr = $_POST["addr"];
	$radius = $_POST["radius"];
	$max_results = $_POST["max_results"];


	$addr_plus = str_replace(' ','+',$addr);
	$locatn_cordinates = maps_location_getter($addr_plus);

	$xml = simplexml_load_string($locatn_cordinates);


	$lat_val = (String)$xml->result->geometry->location->lat;
	$long_val = (String)$xml->result->geometry->location->lng;

	yt_getList($ytsearch, $lat_val, $long_val, $radius, $max_results);

?>
