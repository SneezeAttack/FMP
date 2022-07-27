<?php

function containerFull($num){
	$inContainer = 0;
	sell($num);
}

function sell($num){

$con = mysqli_connect("192.168.1.254","myUser","myPassword", "storageDB");

if(!$con) $data->failure = "DB connection failure";
if (mysqli_connect_errno()) {

    $err = "MySQL connection failure: ". mysqli_connect_err();
  
}
$success = true;


	$query = "INSERT INTO items(type,cargo,dateOfArrival) VALUES('$type', '$cargo', '$date');";//two foreign keys: cargo and date of arrival

	if($result = mysqli_query($con, $query)){
	    
	  echo "Data was successfully added";
	    
	    mysqli_free_result($result);
	    
	}else{
	    echo "Failure in adding data";
	    //die("Query failed");
	}
}


$con->close();


?>