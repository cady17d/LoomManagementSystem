<?php

session_start();


if (!isset($_SESSION['sessionid'])){
  header("Location: index.php");
}

echo $_SESSION['messagelogin'];

$server= "127.0.0.1";
$bduser= "root";
$dbpass= "devilmaycry";
$db= "Loom";


$conn= new mysqli($server,$dbuser,$dbpass,$db);




?>






<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  
  
  
      <link rel="stylesheet" href="homestyle.css">

  
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
  <h2>Loom Management System</h2>
  <p>A <b>loom</b> is a device used to weave cloth and tapestry.</p>
  <p>The basic purpose of any loom is to hold the warp threads under tension to facilitate the interweaving of the weft threads. </p>
  <p>The precise shape of the loom and its mechanics may vary, but the basic function is the same. </p>
  <p>A <b>power loom</b> is a mechanized loom, and was one of the key developments in the industrialization of weaving during the early Industrial Revolution.</p>
  <p>The first power loom was designed in 1784 by Edmund Cartwright and first built in 1785.</p>
  <p>It was refined over the next 47 years until a design by Kenworthy and Bullough made the operation completely automatic.</p>
  <p>By 1850 there was 260,000 power looms in operation in England.</p>
  <p>Fifty years later came the Northrop loom which replenished the shuttle when it was empty. This replaced the Lancashire loom.</p>
</div>
  
  

</body>

</html>
