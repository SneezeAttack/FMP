<?php

//Get data from imaginary front end: POST

//extract($_POST)//Much simpler but for demonstration purposes I will not use it 
$cargo = $_POST['cargo'];
$driver = $_POST['driver'];
$seller = $_POST['seller'];


//Get the individual boxes and their contents
$boxes = Array()
for($i = 0, $i < count($_POST)-3, $i++){

	$boxes.push($_POST['box'.$i]);
}



//get data from imaginary front end: JSON

$data = file_get_contents( 'php://input' );

//decode it so we can work with it
$data =  json_decode($post, true);

$cargo = $data['cargo'];
$driver = $data['driver'];
$seller = $data['seller'];

$boxes = $data->boxes;

//var_dump($boxes);//Check if array is filled properly, debugging purposes

//Add to database
$con = mysqli_connect("192.168.1.254","myUser","myPassword", "storageDB");//All fake values, this is imaginary after all


if(!$con) $data->failure = "DB connection failure";
if (mysqli_connect_errno()) {

    $err = "MySQL connection failure: ". mysqli_connect_err();
  
}
$success = true;

foreach($boxes as $type){

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

if($success)
	echo "Data was successfully added";

else
	echo "Error in adding data";

?>