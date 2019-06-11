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




?>





<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>res</title>
  
  
  
      <link rel="stylesheet" href="resstyle.css">

  
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
  <h2>Result</h2>
 <form method="POST" action="res.php">
 
  <br><div class="userinput">
   <label> EMP Id  </label>
   <input type="text" name="empid">
  </div>
 <div class="userinput">
   <label> Type  </label>
   <input type="text" name="type" placeholder="A/B/C">
  </div>
 <div class="userinput">
   <label> LOOM_No </label>   
   <input id="A" type="number" name="loomno">
  </div>



  <div style="text-align:center">
   <input type="reset" name="reset">
   <input type="submit" name="submit" value="Submit">   
  </div><br><br>

 </form>
</div>
  
  

</body>

</html>
