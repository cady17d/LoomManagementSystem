<?php

session_start();


if (!isset($_SESSION['sessionid'])){
  header("Location: index.php");
}


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

$pname= test_input($_POST['name']);
$page= test_input($_POST['age']);
$pgender= $_POST['gender'];
$pdob= test_input($_POST['dob']);
$paddress= test_input($_POST['address']);
$ppaddress= test_input($_POST['paddress']);
$pmobile= test_input($_POST['mobile']);
$pemail= test_input($_POST['email']);
$pempid= test_input($_POST['empid']);
$padmin=  $_POST['admin'];
$ppwd= password_hash($_POST['pwd'], PASSWORD_DEFAULT);

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

echo $pname;echo $page;echo $pgender;echo $pdob;echo $paddress;echo $ppaddress;echo $pmobile;echo $pemail; echo $pempid; echo $padmin; echo $ppwd;

$sql="INSERT INTO reg(name,age,gender,dob,address,paddress,contact,email,empid,admin,password)  VALUES('$pname','$page','$pgender','$pdob','$paddress','$ppaddress','$pmobile','$pemail','$pempid','$padmin','$ppwd')";
if ($conn->query($sql)){
	echo "Data updated";
} else {
	echo "ERROR: " . $sql . $conn->error;
}
?>

