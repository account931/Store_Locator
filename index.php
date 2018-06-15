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

.myShadow{
  box-shadow: 10px 10px 5px grey;}

</style>

</head>
<body>
<center>
<div id="">
   
    <h2 class="myShadow"> 
	  <img style="height:29px;" src="images/store-locator.png"/>
	  Custom store locator
	  <img style="height:29px;" src="images/store-locator.png"/><br>
	 </h2>
</div>
<br>

<!-- this div will hold your map -->
<div id="map" class="myShadow"></div>

<!-- this div will hold your store info -->
<div id="info_div" class="myShadow"></div>

<!-- my pop up -->
<div id="myTil"></div>

</center>


<script>
window.x;
var infowindow; // add as closing prev onfowindow caused the error, was not visible in  showStoreInfo(storeInfo, marker)
		
		
//core function to show GMaps, trigered in //script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer		
function initMap() {  
	var myMapCenter = {lat:50.257943 , lng: 28.663423};  

	// Create a map object and specify the DOM element for display.
	var map = new google.maps.Map(document.getElementById('map'), {
		center: myMapCenter,
		zoom: 14
	});


	
	
	
	//donor
	
	//donor
	//var marker;
	
	function markStore(storeInfo){

		// Create a marker and set its position.
		var marker = new google.maps.Marker({  //removed var to make global and seen in  showStoreInfo(storeInfo)
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
			 
			
			showStoreInfo(storeInfo, marker); //Mega error was here, onClick was displayed the correct pin info, but location was always of the last Object {stores},
			                                  //because  I removed /*var*/ marker in {markStore(storeInfo)} to make it global and visible in {showStoreInfo()}
											  //the right solution is to pass {marker} as argument in showStoreInfo(storeInfo, marker)
			//showCoords(event); //my gets coord clicked	
            
		
		});
	}

	
	
	
	// show store info in text box OnClick
	function showStoreInfo(storeInfo, marker)
	{
			
			resultedText = 'Store name: '
			    + storeInfo.name
			    + '<br>Hours: ' + storeInfo.hours
			    + '<br>Info: ' + storeInfo.description;
				
			
			//my animation
			$("#info_div").stop().fadeOut("slow",function(){ $(this).html(resultedText)}).fadeIn(2000);
			
			//closes prev infowindow if any
			if (infowindow) {
                infowindow.close();
			}
			
			
			//My pop up onClick------
			infowindow = new google.maps.InfoWindow({
                 content: resultedText //"Hello World!"
              });
			
            infowindow.open(map, marker);
			
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
			name: 'Магазин Природа',
			location: {lat: 50.258093, lng: 28.663449},  
			hours: 'круглосуточно',
			description: '',
		},
		{
			name: 'McDonald"s',
			location: {lat: 50.265906, lng: 28.683787},  
			hours: 'Київська 77, Житомир, 10000',
			description: 'McDrive',
		},
			{
			name: 'Замковая Гора',
			location: {lat: 50.253627, lng: 28.655032},  
			hours: 'Парк',
			description: 'Кафедральна, 10002',
		},
		{
			name: 'Парк Гагрина',
			location: {lat: 50.247574, lng: 28.665838},  
			hours: 'Атракционы',
			description: 'Старий Бульвар 34',
			
		},
		
	];
    // END  INFO DATA------------------------------
	
	
	
	
	
	
	stores.forEach(function(store){
		markStore(store);
	});

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=PASTE_YOUR_KEY_HERE&callback=initMap" async defer></script>-->
</body>
</html>