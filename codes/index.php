<?php

session_start();
session_unset(); 
session_destroy(); 

session_start();
$server= "127.0.0.1";
$bduser= "root";
$dbpass= "devilmaycry";
$db= "Loom";


$conn= new mysqli($server,$dbuser,$dbpass,$db);


$pempid= $_POST['empid'];
$ppwd= $_POST['pwd'];
$pass= password_hash($ppwd, PASSWORD_DEFAULT);

echo $_SESSION['messagelogin'];

$sql="SELECT * FROM reg WHERE (admin='1' && empid=$pempid)";

$res=$conn->query($sql);

if(isset($pempid,$ppwd)){
	if($res->num_rows>0){

							$row=$res->fetch_assoc();
							
							if($pempid==$row['empid'] && password_verify($ppwd,$row['password'])){
								$_SESSION['sessionid']=$row['empid'];
                //$_SESSION['messagelogin']='Logged in!';
								  header("Location: home.php");
							}  
							  }else{
                    $_SESSION['messagelogin']='Invalid Credentials!';
							      header("Location: index.php");
							  }

}

?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>loomno</title>
  
  
  
      <link rel="stylesheet" href="loomnostyle.css">

  
</head>

<body>

  

  <div class="sidenav">
  <a href=home.php>Home</a>
  <a href=register.php>Registration</a>
  <a href=loomno.php>Loom</a>  
  <a href=result.php>Result</a>
</div>

<div class="main">
  <h1>     Login </h1><BR>

  <h6>Please log in to continue.</h6>
 <form method="POST" action="index.php">
 
  <div class="userinput">
   <label> EMP Id : </label>
   <input type="text" name="empid" required>
  </div>

 <div class="userinput">
   <label> Password : </label>   
   <input type="password" name="pwd"  required>
  </div>

  <div style="text-align:center">
   <input type="reset" name="reset">
   <input type="submit" name="submit" value="Submit">   
  </div><br><br>

 </form>
 
 </div>
 
 </div>  

  
  
</div>
  
  

</body>

</html>
