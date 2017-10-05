<?php

function redirect($url) {
    header('Location: '.$url);
}
include 'video_address.php';
  function show_vids($vid_long_arr,$vid_lati_arr,$vid_id_arr,$vid_name_arr)
  {

	 $dom = new DOMDocument('1.0');
	$dom->formatOutput = true;
	 $marker_xml = $dom->createElement('markers');
	 $marker_xml = $dom->appendChild($marker_xml);
	
    for($x=0; $x< count($vid_id_arr); $x++){
      


    $embed_val=$vid_id_arr[$x];
	$embed='<iframe src="https://www.youtube.com/embed/'.$embed_val.'" width="588" height="258" ></iframe>';
	// to find address from given longitude and latitude
 	$address_str = video_address_getter($vid_lati_arr[$x],$vid_long_arr[$x]);
	$xml = simplexml_load_string($address_str);

	$video_addr = (String)$xml->result->formatted_address ;
	
	// xml generation code	
	 $marker_child = $dom->createElement('marker');
	 $marker_child = $marker_xml->appendChild($marker_child);
	
	$marker_child->setAttribute('id', $x+1);
	$marker_child->setAttribute('name', $vid_name_arr[$x]);
	$marker_child->setAttribute('address',$video_addr);
	$marker_child->setAttribute('lat', $vid_lati_arr[$x]);
	$marker_child->setAttribute('lng',$vid_long_arr[$x]);
	$marker_child->setAttribute('embed',$embed);
	$marker_child->setAttribute('video_id',$embed_val);
		 
    }
	$dom->save("./../xml/markers.xml");
  }
  redirect("http://localhost/CodeBusters2/php/maps.php");
 ?>
