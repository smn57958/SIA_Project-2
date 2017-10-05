<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>AIS_Project-2</title>
<script>
function loading()
{
	var loader=document.getElementById("loading");
	loader.style.display="inline";
};
</script>
</head>
    <body ng-app="myApp">
	<div class="fullscreen-bg">
    <video loop muted autoplay poster="img/videoframe.jpg" class="fullscreen-bg__video">
   
        <source src="vid/background.mp4" type="video/mp4">
       
    </video>
<div id="loading"><img src="img/loading.gif"></img></div>
	<div id="main">
	<div class="title">
	<center><h1>frostScope</h1></center></div>
	<div id="box">
	<div class="left-info">&nbsp
	<ul>
	<li>Enter search term that you would like to search, example - Dog, Cat, Selfie</li>
	<li>The address you enter must be in such a way that if you search exactly same on Google Maps, it should give you the same place. I hope you know where you live, don't you?</li>
	<li>Radius specifies the circular distance from the point of your specified location. Make sure you enter "km", example - "25km", not "25".</li>
	<li>Number of results limits the number of videos shown on the google maps. Range: 1-25</li>
	</ul>
	</div>
	<div class="form">
	<script>
var app = angular.module('myApp', ['ngAnimate']);
</script>
<form method="post" action="php/main_call.php">
	<table>
	<tr><td>Search for:</td><td><input name="ytsearch" class="inform" type="text" required ng-model="myCheck" placeholder="uga"></td></tr>
	<tr><td>Address:</td><td><input name="addr" class="inform"  type="text" required placeholder="101 Davis street, Athens, GA"></td></tr>
	<tr><td>Radius:</td><td><input name="radius" id="rad" class="inform"  type="text" required placeholder="25km"></td></tr>
	<tr><td>No of Results:</td><td><input name="max_results" class="inform"  type="number" required min="1" max="10" placeholder="5"></td></tr>
	<td></td><td></td>
	</table>
	<center><input onclick="loading()" class="states" type="image" src="./img/search_button.png"/></center>
	</form>
	</div>
	</div>
	<div class="footer"><center>Copyright 2017.Made by CodeBusters.<br/><a href="mailto:smn57958@uga.edu?Subject=AIS_Project-2_CodeBusters">&nbsp Contact Developers &nbsp</a></center>
	</div>
	</div>
	</div>
    </body>
</html>