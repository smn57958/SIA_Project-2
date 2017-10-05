<?php
	
	function maps_location_getter($addr_plus)
	{
		// create curl resource 
        $ch = curl_init(); 

        // set url

		// echo "https://maps.googleapis.com/maps/api/geocode/xml?address='$addr_plus'&key=AIzaSyBe1V58rpXg9OjQ2HDKDM14BozWN4C5zxM";	
        curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/xml?address='$addr_plus'&key=AIzaSyBe1V58rpXg9OjQ2HDKDM14BozWN4C5zxM"); 
		
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

		// echo $output;
        // close curl resource to free up system resources 
        curl_close($ch);

		return $output;	
	}

?>