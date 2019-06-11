<?php
echo "hello";
$server= "127.0.0.1";
$bduser= "root";
$dbpass= "devilmaycry";
$db= "Loom";

$conn= new mysqli($server,$dbuser,$dbpass,$db);
if($conn->connect_error){
			 die("Connection failed!" . $conn->connect_error);
			}
else
	{
	 echo "Connection success!";
	}

$ploomno= $_POST['loomno'];
$pa= $_POST['a'];
$pb= $_POST['b'];
$pc= $_POST['c'];
$pprod= $_POST['prod'];



$sql="INSERT INTO loomtable  VALUES('$ploomno','$pa','$pb','$pc','$pprod')";
if ($conn->query($sql)){
	echo "Data updated";
} else {
	echo "ERROR: " . $sql . $conn->error;
}
?>
