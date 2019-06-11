

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
  <title>reg</title>
  
  
  
      <link rel="stylesheet" href="regstyle.css">

  
</head>

<body>

  <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script> 

  <div class="sidenav">
  <a href=home.php>Home</a>
  <a href=register.php>Registration</a>
  <a href=loomno.php>Loom</a>  
  <a href=result.php>Result</a>
  <a href=index.php>Log out</a>
</div>

<div class="main">
  <h2>Registration Form</h2>
  
<form method="POST" action="reg.php">
  
  <h6>Employee_Id:</h6>
<div class="frm">  <input id="empid" type="text" placeholder="Enter id" name="empid" required>
</div>
  
  <h6>Name:</h6>
<div class="frm">  <input id="name" type="text" placeholder="Enter Name" name="name" required>
</div>

  <h6>Age:</h6>
<div class="frm">  <input id="age" type="text" placeholder="Enter Age" name="age" required>
</div>
  
    <h6>Gender:</h6>
<div class="radiotext">
    <input class="radio" type="radio" name="gender" value="male" checked> Male
  <input class="radio" type="radio" name="gender" value="female"> Female
  <input class="radio" type="radio" name="gender" value="other"> Other
  
  </div> 
  
  <h6>DOB:</h6>
<div class="frm">  <input id="dob" type="date" name="dob" required>
</div>
    <h6>Address:</h6>
<div class="frm">  <input id="address" type="text" placeholder="Enter Address" name="address" required>
</div>
      <h6>Permanent_Address:</h6>
<div class="frm">  <input id="paddress" type="text" placeholder="Enter Permanent Address" name="paddress" required>
  </div>
  
  <h6>Contact_No:</h6>
<div class="frm">  <input id="mobileno" type="text" placeholder="Enter Mobile no " name="mobile" required>
</div>
      <h6>Email:</h6>
<div class="frm">  <input id="email" type="text" placeholder="Enter Email Id" name="email" required>
</div>

          <h6>Make_Admin:</h6>
<div class="radiotext">
    <input class="radio" type="radio" name="admin" value="0" checked> No
  <input class="radio" type="radio" name="admin" value="1"> Yes <input id="pwd" type="password" placeholder="Set password" name="pwd">
  
  </div> 
  
  
<div class="frm">  <input id="button" input type="submit" value="Submit">
</div>
  
  
  
    
  
  </form>
  
</div>
  
  

    <script  src="index.js"></script>




</body>

</html>
