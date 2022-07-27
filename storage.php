<?php

//Get storage layout. Only using POST method this time
$storage = Array(Array());//Inside storage

foreach($_POST as $key => $val){
	$storage[][] = $val;//It's a stack of multiple boxes, managed in front end.
}

$goods = decode_json("{}");//All raw material available

//Get data from imaginary database
if(!$con) die("Connection failed.");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$con = mysqli_connect("192.168.1.254","myUser","myPassword", "storageDB");

$query = "SELECT type,cargo,dateOfArrival FROM storage;";

if($result = mysqli_query($con, $query)){
    
    while($row = mysqli_fetch_assoc($result)){
        
        
		$goods[] = $row;//Append entire row to goods object


        
    }
    
    mysqli_free_result($result);
    
}else{die("Query failed");}


$con->close();

?>