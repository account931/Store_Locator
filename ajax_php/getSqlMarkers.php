<?php
    include '../Classes/autoload.php';//uses autoload instead of manual includin each class-> Error if it is included in 2 files=only1 is accepted

	 //connects to SQL DB
     /* $singeltone= */ ConnectDB::getInstance();
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 //echo "<br>";
	 
	 // sql to create table
	 /*
$sql = "CREATE TABLE `markers` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 60 ) NOT NULL ,
  `address` VARCHAR( 80 ) NOT NULL ,
  `lat` FLOAT( 10, 6 ) NOT NULL ,
  `lng` FLOAT( 10, 6 ) NOT NULL
) ENGINE = MYISAM" ;


try{
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
 }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    } 
	*/
	
	
	//echo "<br>";
	
	
//INSERT records
/*
try {
   
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO markers (name, lat, lng) 
    VALUES (:firstname, :lat, :lon)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lat', $latt);
    $stmt->bindParam(':lon', $lonn);

    // insert a row
    $firstname = "my";
    $latt = 50.2627051;
    $lonn = 28.661707;
    $stmt->execute();

    // insert another row
	
    

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    } 
*/
// END INSERT records	
	
	
	//echo "<br>";
	
	
	
	
	
	
	
	//Selecting markers
	$markers = new SelectFromMarkers();
	$markers->selectSqlMarkers();
?>