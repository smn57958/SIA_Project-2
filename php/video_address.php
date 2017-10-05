<?php

	function video_address_getter($lat,$lng)
	{
		// echo $lat."<br>";
		// create curl resource 
        $ch = curl_init(); 

        // set url
		$co_ord = $lat.",".$lng;

			
        curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/xml?latlng=$co_ord&key=AIzaSyCxxqUnLZ6znzG4DksSiWvOyi4Xio1R1TA"); 
		
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
