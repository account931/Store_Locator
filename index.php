<!DOCTYPE html>
<html>
<head>
<title>Store Locator</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">

/* map needs width and height to appear */
#map{
	width: 900px;
	max-width: 100%;
	height: 500px;
}

#info_div{
	background:lime;
	padding:20px;
	width:50%;
	border-radius:20px;
}

#myTil{
	position:absolute;
	
	background:red;
	width:30%;
}

</style>

</head>
<body>
<center>
<div id="">
    <h2> Custom store locator</h2>
</div>

<!-- this div will hold your map -->
<div id="map"></div>

<!-- this div will hold your store info -->
<div id="info_div"></div>

<!-- my pop up -->
<div id="myTil"></div>

</center>


<script>
window.x;
      
		
		
//core function to show GM, trigered in //script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer		
function initMap() {  
	var myMapCenter = {lat:50.257943 , lng: 28.663423};  

	// Create a map object and specify the DOM element for display.
	var map = new google.maps.Map(document.getElementById('map'), {
		center: myMapCenter,
		zoom: 14
	});


	
	
	
	//donor
	
	//donor
	
	
	function markStore(storeInfo){

		// Create a marker and set its position.
		/*var*/ marker = new google.maps.Marker({  //removed var to make global and seen in  showStoreInfo(storeInfo)
			map: map,
			position: storeInfo.location,
			title: storeInfo.name
		});

		
		
		// ERASE, not used
		//mine----------
		function showCoords(event) {
           window.x = event.clientX;
           window.y = event.clientY;
           var coords = "X coords: " + x + ", Y coords: " + y;
           //document.getElementById("demo").innerHTML = coords;
		   //alert(window.x); //important alert
		   return { //multiple return
             dCodes: x, 
             dCodes2:y
           };   
		}
		//mine----------
		
		
		
		
		// show store info when marker is clicked
		marker.addListener('click', function(){
			showStoreInfo(storeInfo);
			//showCoords(event); //my gets coord clicked			
		});
	}

	
	
	
	// show store info in text box OnClick
	function showStoreInfo(storeInfo){
		/*
		var info_div = document.getElementById('info_div');
		info_div.innerHTML = 'Store name: '
			+ storeInfo.name
			+ '<br>Hours: ' + storeInfo.hours
			+ '<br>Info: ' + storeInfo.description;
			*/
			
			resultedText = 'Store name: '
			    + storeInfo.name
			    + '<br>Hours: ' + storeInfo.hours
			    + '<br>Info: ' + storeInfo.description;
			
			//my animation
			$("#info_div").stop().fadeOut("slow",function(){ $(this).html(resultedText)}).fadeIn(2000);
			
			
			//My pop up onClick------
			 var infowindow = new google.maps.InfoWindow({
                 content: resultedText //"Hello World!"
              });
             infowindow.open(map,marker);
			 // END My pop up onClick-------------
			 
			 
			
           // alert(window.x ); //important alert
			
			//$('#myTil').css('position', 'absolute');
			/*
            $('#myTil').css('top', '-100'); //or wherever you want it
            $('#myTil').css('left', '200'); //or wherever you want it
			$("#myTil").stop().fadeOut("slow",function(){ $(this).html(resultedText)}).fadeIn(2000);
			*/
	}

	
	
	
	
	// INFO DATA
	var stores = [
		{
			name: 'Point 1',
			location: {lat: 50.2627051, lng: 28.661707}, 
			hours: '8AM to 10PM',
			description: 'Great place to go',
		},
		{
			name: 'Львівська майстерня шоколаду',
			location: {lat: 50.258004, lng: 28.659492}, 
			hours: '9AM to 9PM',
			description: 'Затишне місце',
		},
		
		{
			name: 'Магазин "Природа"',
			location: {lat: 50.258093, lng: 28.663449},  
			hours: 'круглосуточно',
			description: '',
		},
		
		{
			name: 'McDonald"s',
			location: {lat: 50.265297, lng: 28.685040},  
			hours: 'вулиця Київська, 77, Житомир, Житомирська область, 10000',
			description: 'McDrive',
		}
	];
    // END  INFO DATA
	
	stores.forEach(function(store){
		markStore(store);
	});

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=PASTE_YOUR_KEY_HERE&callback=initMap" async defer></script>-->
</body>
</html>