<?php

include 'php/video_address.php';
  function show_vids($vid_long_arr,$vid_lati_arr,$vid_id_arr)
  {
     echo $vid_id_arr[0]."aaaaaaaaaaaaaaaaaaaaaa";
    // echo $vid_lati_arr[0]."<br />";
    // echo $vid_long_arr[0];


	 $dom = new DOMDocument('1.0');
	$dom->formatOutput = true;
	 $marker_xml = $dom->createElement('markers');
	 $marker_xml = $dom->appendChild($marker_xml);

   // foreach ($vid_id_arr as $vid_id) {
	   for($x=0; $x< count($vid_id_arr); $x++){
	   
      // echo "<iframe></iframe>https://www.youtube.com/watch?v=$vid_id";
?>

    <li><iframe src="https://www.youtube.com/embed/<?php echo $vid_id_arr[$x]; ?>" width="588" height="258" ></iframe></li>
	<h1>HEY</h1>

<?php
// code to fetch address from given latitude and longitude

	echo $vid_lati_arr[0];
/* 	$address_str = video_address_getter($vid_lati_arr[$x],$vid_long_arr[$x]);
	$xml = simplexml_load_string($address_str);

	// print_r($xml);

	$video_addr = (String)$xml->results->formatted_address;
	echo $video_addr."aaaaaaaaaaaaaaa";
	 */
	// xml generation code	
	 $marker_child = $dom->createElement('marker');
	 $marker_child = $marker_xml->appendChild($marker_child);

	// $text = $dom->createTextNode('This is the title');
	// $text = $marker_child->appendChild($text);
	
	$marker_child->setAttribute('type', 'stars');
		 
    }
	$dom->save("test.xml");
  }
 ?>
