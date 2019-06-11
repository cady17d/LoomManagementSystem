<?php
session_start();

if (!isset($_SESSION['sessionid'])){
  header("Location: index.php");
}

$server= "127.0.0.1";
$bduser= "root";
$dbpass= "devilmaycry";
$db= "Loom";
echo $_SESSION['message'];

$conn= new mysqli($server,$dbuser,$dbpass,$db);

$ploomno= $_POST['loomno'];
$pempid= $_POST['empid'];
$_SESSION['loomno']=$ploomno;
$_SESSION['empid']=$pempid;
$sql="SELECT * FROM tmp WHERE loomno='$ploomno'";

$res=$conn->query($sql);

if(isset($ploomno)){
	if($res->num_rows>0){
  header("Location: loomstop.php");
  
  }else{
      echo "Loom Inactive";
      header("Location: loomstart.php");
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
  <a href=index.php>Log out</a>
</div>

<div class="main">
  <h1>     Loom Number </h1><BR>
 <form method="POST" action="loomno.php">
 

 <div class="userinput">
   <label> LOOM_No : </label>   
   <input id="A" type="number" name="loomno"  required>
  </div>
  <div class="userinput">
   <label> EMP Id  </label>
   <input type="text" name="empid" required>
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
