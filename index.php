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

     <style type="text/css">

    /* map needs width and height to appear */
    #map{
	    width: 900px;
	    max-width: 100%;
	    height: 500px;
    }

    #info_div{
	   margin-top:14px;
	   background:grey;
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
       box-shadow: 10px 10px 5px grey;
   }
   
    .dest2 {
     overflow:hidden;
	 word-wrap: break-word;
   }
   
   /* -- START CLASS no-gutter that fixes spaces between cols--*/
   .row.no-gutter {
      margin-left: 0;
      margin-right: 0;
    }
    .row.no-gutter [class*='col-']:not(:first-child),
    .row.no-gutter [class*='col-']:not(:last-child) {
       padding-right: 0;
       padding-left: 0;
    }
    .row > div {
        background: lightgrey;
        border: 1px solid;
    }
   /* --END  CLASS no-gutter that fixes spaces between cols--*/
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
            <input id="btn_CalcRoute_Clear" type="button" name="Button" value="Clear" class="btn" >
		</div>
		
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
  
  
  
  <!-- CORE SCRIPT, runs the Google maps Load-->
  <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=PASTE_YOUR_KEY_HERE&callback=initMap" async defer></script>-->
</body>
</html>