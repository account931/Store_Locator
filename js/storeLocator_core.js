// Google maps are displayed with { <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script> } in index.html.

window.x;
var infowindow; // add as closing prev onfowindow caused the error, was not visible in  showStoreInfo(storeInfo, marker)
var markers = [];		
		
		
		
  //core function to show GMaps, trigered in //script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer
  // **************************************************************************************
  // **************************************************************************************
  //                                                                                     **
  
  function initMap() {  
	var myMapCenter = {lat:50.257943 , lng: 28.663423};  

	// Create a map object and specify the DOM element for display.
	var map = new google.maps.Map(document.getElementById('map'), {
		center: myMapCenter,
		zoom: 14
	});


	
	

	//var marker;
	
	
	 // function to assign every single marker with relevat coords position and title from {var stores}
	 // **************************************************************************************
     // **************************************************************************************
     //                                                                                     **
	 
	function markStore(storeInfo){

		// Create a marker and set its position.
		var marker = new google.maps.Marker({  //!!!==DO not remove Var, it cause pop-up wrong appear
			map: map,
			position: storeInfo.location,
			title: storeInfo.name
		});
        markers.push(marker); // add marker to the array with all markers
		
		
		// ERASE, not used
		//mine----------
		/*
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
		*/
		//mine----------
		
		
		
		
		// show store info when marker is clicked
		// ****************************
        // ****************************
        //                           **
		
		marker.addListener('click', function(){		
			
			showStoreInfo(storeInfo, marker); //Mega error was here, onClick was displayed the correct pin info, but location was always of the last Object {stores},
			                                  //because  I removed /*var*/ marker in {markStore(storeInfo)} to make it global and visible in {showStoreInfo()}
											  //the right solution is to pass {marker} as argument in showStoreInfo(storeInfo, marker)
			//showCoords(event); //my gets coord clicked	          
		
		});
	    // **                       **
        // ***************************
        // ***************************
		// END // show store info when marker is clicked
		
		
		
	
	}  // END function markStore(storeInfo)
    // **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
	
	
	
	
	
	
	
	  
	// show store info in text box OnClick
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
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
      // **                                                                                  **
      // **************************************************************************************
      // **************************************************************************************
	
	
	
	
	// INFO DATA
	var stores = [
		{
			name: 'ул. Бандеры',
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
			name: 'Парк Гагарина',
			location: {lat: 50.247574, lng: 28.665838},  
			hours: 'Атракционы',
			description: 'Старий Бульвар 34',
			
		},
		{
			name: 'Ботанический сад',
			location: {lat: 50.251279, lng: 28.696526},   
			hours: '09:00–18:00',
			description: 'Корольова 39, Житомир',
			
		},
		{
			name: 'Корбутовский гидропарк',
			location: {lat: 50.237733, lng: 28.606245},   
			hours: 'Открыто 24 часа',
			description: 'Пляжна алея, Житомир',
			
		},
		
	];
    // END  INFO DATA-------
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
	
	
	
	
	
	// runs every Stores Object through function markStore
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     **
	
	stores.forEach(function(store){
		markStore(store);
	});
	
	// **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************
	
	
	

    $(document).ready(function(){
		
	   // Hide/show markers
	   // **************************************************************************************
       // **************************************************************************************
       //                                                                                     **
	   
        $("#btn_Control").click(function(){
			if ($("#btn_Control").prop("value")=="Hide markers"){
				$("#btn_Control").stop().fadeOut("fast",function(){ $(this).attr('value', 'Show markers')}).fadeIn(500);
				//$("#btn_Control").attr('value', 'Show markers');
				for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                 }
				//marker.setVisible(false);
			} else {
				$("#btn_Control").stop().fadeOut("fast",function(){ $(this).attr('value', 'Hide markers')}).fadeIn(500);
				for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                 }
			}
            
       }); //END $("#btn_Control").click
	  // **                                                                                  **
      // **************************************************************************************
      // **************************************************************************************
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   // click clears Matrix Api div
	   // **************************************************************************************
       // **************************************************************************************
       //                                                                                     **
	   
	    $("#btn_CalcRoute_Clear").click(function(){
			$("#distanceInfo").stop().fadeOut("fast",function(){ $(this).html('') }).fadeIn(2000);
	    }); 
	  
	  // **                                                                                  **
      // **************************************************************************************
      // **************************************************************************************
	  // END  click clears Matrix Api div 
	   
	   
	   
	   
	   
	   
	   
	    //generates start/end destinations option_select for usage in Matrix
	   // **************************************************************************************
       // **************************************************************************************
       //                                                                                     **
	   
	   function generateSelect(selectText, i, spanID){ //("start/end text", 1 or to to add to id="selectID", span to html() )
	       var destination = "<select id='selectID" + i + "'>";
	       destination += "<option value='' selected='selected'>" + selectText + "</option>";
	       for ( i = 0; i < markers.length; i++ ){
		       //alert(markers[i].position);
		       destination = destination + "<option value='" + markers[i].position + "'>" + markers[i].title + "</option>"; 
	        } 
	   
	        destination = destination + "</select>";
	        $("#" + spanID).html(destination);
	        //$("#destination2").html(destination);
	        //end generates option_select
	   }
	  // **                                                                                  **
      // **************************************************************************************
      // **************************************************************************************

	
	
	   //generates start/end destinations option_select for usage in Matrix
	   generateSelect('Start point', 1, 'destination' ); // generates start point dropdown
	   generateSelect('End point', 2, 'destination2' );  // generates end point dropdown
	   
	   
	   
	   
	   //Gets  Matrix API distance
	   // **************************************************************************************
       // **************************************************************************************
       //                                                                                     **
	   
	   $("#btn_CalcRoute").click(function(){
	       if ($("#selectID1").val() == '' || $("#selectID2").val() == '' ){ // if user selected both start/stop //value of dropdowns are coords
			  alert('Select start and stop location');
		   } else {
			   if ( $("#selectID1").val() == $("#selectID2").val()){ // if start/stop are not the same
			       alert("Start and stop points are the same. change one of them");
			   } else { 
			       //else form the request to AJAX Google Maps Distance Maxrix API
			       //we use here Proxy {https://cors-anywhere.herokuapp.com}, as direct addressing GM Matrix API causes {No 'Access-Control-Allow-Origin'} ERROR
				   //var URL = "https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=50.258004,28.659492&destinations=50.247574,28.665838";
				   var coords1 = $("#selectID1").val().replace("(", "").replace(")", ""); // get the value of start, which is coords {(2.65, 5.88)}, and  removes {()} from it
				   var coords2 = $("#selectID2").val().replace("(", "").replace(")", "");
				   var URL = "https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=" + coords1 + "&destinations=" + coords2;
                   //alert (URL);
				   //Start AJAX
				   $.ajax({
                       url: URL,
					  
                       type: 'POST',
			           dataType: 'json', // without this it returned string(that can be alerted), now it returns object //using "jsop" failed
			           //passing data
                       data: { },
                       success: function(data) {
                           // do something;
					       var finalText = "Distance between " + $("#selectID1 option:selected").html() + " and " + $("#selectID2 option:selected").html() + " is " +  Math.round( data.rows[0].elements[0].distance.value / 1000) + " km. <br>ETA by car is " +  Math.round( data.rows[0].elements[0].duration.value / 60) + " minutes.<br><br>"
					       $("#distanceInfo").stop().fadeOut("fast",function(){ $(this).html(finalText) }).fadeIn(2000);
                           //alert(data.rows[0].elements[0].distance.value);
                       },  //end success
			           error: function (error) {
						   alert("Ajax failed");
				       //$("#weatherResult").stop().fadeOut("slow",function(){ $(this).html("<h4 style='color:red;padding:3em;'>ERROR!!! <br> NO CITY FOUND</h4>")}).fadeIn(2000);
                       }	
                   });   //  END AJAXed  part 
	           } //end else 2
                                               
     
			   }
			  
		   //}
		   
	   }); // end $("#btn_CalcRoute").click
	   
	   // **                                                                                  **
       // **************************************************************************************
       // **************************************************************************************
	   
   });
	//   END ready 

} // END  function initMap