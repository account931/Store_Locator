<!DOCTYPE html>
  <html>
    <head>
      <title>Store Locator</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/storeLocator_core.js"></script><!--  Core Sore locator JS-->
      <link rel="stylesheet" type="text/css" media="all" href="css/myStoreLocator.css">

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
 
  
    <div class="wrapper grey">
      <div class="container">
 
    <!-- Controls: show/hide markers, from/to dropdowns--> 
    <div id="controls" class="row no-gutter"> <!-- CLASS no-gutter that fixes spaces between cols-->
	
	    <div class="col-md-2 col-xs-12  style="">
            <input id="btn_Control" type="button" name="Button2" value="Hide markers" class="btn" />
	    </div>
	    
		<div class="col-md-3 col-xs-6 ">
            <span id="destination" ></span>
		</div>
		
		<div class="col-md-3 col-xs-6 dest2">	
            <span id="destination2" ></span>
		</div>
		
		<div class="col-md-2 col-xs-6">
            <input id="btn_CalcRoute" type="button" name="Button" value="Calc the route" class="btn" >
		</div>
		
		<div class="col-md-1 col-xs-6">
            
		</div>
		<input id="btn_CalcRoute_Clear" type="button" name="Button" value="Clear" class="btn" >
    </div>
	<br>


    <!--Div holds Matrix distance info-->
    <div id="distanceInfo"></div>


    <!-- this div will hold your map -->
    <div id="map" class="myShadow"></div>


   <!-- this div will hold your store info -->
   <div id="info_div" class="myShadow"></div>


   <!--CONFIRM DELETE?? my pop up -->
   <div id="myTil"></div>

  </center>

  </div> <!--END class="wrapper grey">-->
  </div> <!--END class="container">-->
  
  
  
  
  
  
  
  
  
  
  <!-- Modal -->
  <!--we add {data-toggle='modal' data-target='#myModal'} to button (in JS) which triggers  to open modal with Bootstrap, no additional JS is needed-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a new marker</h4>
      </div>
      <div class="modal-body">
        <p>Provide info for marker <span id="newMarkerCoords"></span></p>
		
		<label for="usr">Marker Name:</label>
        <input type="text" class="form-control" id="">
		<label for="usr">Marker Info:</label>
        <input type="text" class="form-control" id="">
		<label for="usr">Marker Description:</label>
        <input type="text" class="form-control" id="">
		
  
      </div>
      <div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <!-- END Modal -->
 
 
 
  
  <!-- CORE SCRIPT, runs the Google maps Load-->
  <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=PASTE_YOUR_KEY_HERE&callback=initMap" async defer></script>-->
</body>
</html>