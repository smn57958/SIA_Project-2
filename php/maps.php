<?php
session_start();
?>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>

    <script>
	var latloc = <?php echo $_SESSION['LAT'] ?>;
	var longloc = <?php echo $_SESSION['LONG'] ?>;
	
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(latloc, longloc),
          zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('./../xml/markers.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
			  var embed_val=markerElem.getAttribute('video_id');
			  var labelv="https://img.youtube.com/vi/"+embed_val+"/default.jpg";
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
			  var embed=markerElem.getAttribute('embed');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.HTMLContent = embed
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
			var image = new google.maps.MarkerImage(labelv,
       	 	new google.maps.Size(60, 60),
    		);	  

var marker = new google.maps.Marker({
                map: map,
                position: point,
				icon: image
              });
			  
              marker.addListener('click', function() {
                infoWindow.setContent(embed);
                infoWindow.open(map, marker);
				
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjOaX3CI9Ek6bwfeXtaJ-nc56MzJbb0lg&callback=initMap">
    </script>
  </body>
</html>