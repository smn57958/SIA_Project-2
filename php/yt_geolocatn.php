<?php
 // Code by AKshay Agashe
 
 
/**/
//Sohan----------------------
session_start();
//$_SESSION['LAT'];
//$_SESSION['LONG'];
/**/

include 'video_disp.php';
$vid_id_arr = array();
$vid_long_arr = array();
$vid_lati_arr = array();
$vid_name_arr = array();
// Code by Akshay Agashe ENDS

 $htmlBody = null;
function yt_getList($ytsearch, $lat_val, $long_val, $radius, $max_results)
{
	$_SESSION['LAT']=$lat_val;
	$_SESSION['LONG']=$long_val;

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
  throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}

require_once __DIR__ . '/vendor/autoload.php';

$htmlBody = <<<END
<h1>yt Video<h1>
END;

if (isset($ytsearch) && isset($max_results)) {

  $DEVELOPER_KEY = 'AIzaSyCxxqUnLZ6znzG4DksSiWvOyi4Xio1R1TA';  // developer key for codebusters
 
  $client = new Google_Client();
  $client->setDeveloperKey($DEVELOPER_KEY);
  $youtube = new Google_Service_YouTube($client);

  try {
    echo "<br />";
    $loc= round($lat_val,5).", ".round($long_val,5);
 
    $searchResponse = $youtube->search->listSearch('id,snippet', array(
        'type'=>'video',
        'q'=>$ytsearch,
        'location'=>$loc,
        'locationRadius'=>$radius,
        'maxResults'=>$max_results,

    ));
    $videoResults = array();
    foreach ($searchResponse['items'] as $searchResult) {
      array_push($videoResults, $searchResult['id']['videoId']);
      $vid_id_arr[] = $searchResult['id']['videoId']; //adding video ID to array Akshay Agashe.
    }
    $videoIds = join(',', $videoResults);
    $videosResponse = $youtube->videos->listVideos('snippet, recordingDetails', array(
    'id' => $videoIds,
    ));
    $videos = '';
    foreach ($videosResponse['items'] as $videoResult) {
		  $vid_name_arr[] = $videoResult['snippet']['title'];	
          $vid_long_arr[] = round($videoResult['recordingDetails']['location']['longitude'],5); 
          $vid_lati_arr[] = round($videoResult['recordingDetails']['location']['latitude'],5);
    }

    $htmlBody .= <<<END
    <h3>Videos</h3>
    <ul>$videos</ul>
END;
  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
        htmlspecialchars($e->getMessage()));
  }
}

echo $htmlBody;

show_vids($vid_long_arr,$vid_lati_arr,$vid_id_arr,$vid_name_arr);

}

?>
