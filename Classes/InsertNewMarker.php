<?php
 Class InsertNewMarker
 {
	 
	 
  // selects all markers stored in SQL DB markers and JSON echo it
  // **************************************************************************************
  // **************************************************************************************
  //                                                                                     **  
   
    public static function addMarker()
    { 
	global $conn;
	//echo "Check</br>";
	echo $_POST['markerName'];  
	echo "<br>";
	echo $_POST['markerCoords'] . " -> ";    
	echo $_POST['markerInfo'] . " -> ";  
	echo $_POST['markerDescription'] . " -> ";  

    $conn = null;

	}
   
  // **                                                                                  **
  // **************************************************************************************
  // **************************************************************************************
 

  
 


}
?>