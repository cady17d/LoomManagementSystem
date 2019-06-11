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


$pempid= $_SESSION['empid'];
$pempname= $_POST['empname'];
$ploomno= $_SESSION['loomno'];
$psread= $_POST['sread'];
/*$peread= $_POST['eread'];*/
$ptype= $_POST['type'];
$pdate= $_POST['date'];
$pshift= $_POST['shift'];

if(isset($pempid)){
    $sql="SELECT name FROM reg WHERE empid=$pempid";
    $res=$conn->query($sql);
    if($res->num_rows>0){
      $row=$res->fetch_assoc();
      $name=$row['name'];

    }
}
if(isset($pempid)){
    $sqllast="SELECT lastread FROM loomtable WHERE loomno=$ploomno";
    $res=$conn->query($sqllast);
    if($res->num_rows>0){
      $row=$res->fetch_assoc();
      $lastread=$row['lastread'];

    }
}

if(date("H")<12){
  $shift="day";
}
else {
  $shift="night";
}

if(isset($pempid,$pempname,$ploomno,$psread,$ptype,$pdate,$pshift)){

   // echo $pempid;echo $pempname;echo $ploomno;echo $psread;/*echo $peread;*/echo $ptype;echo $pdate;echo $pshift;

$sql="INSERT INTO tmp(empid,empname,loomno,sread,type,date,shift)  VALUES('$pempid','$pempname','$ploomno','$psread','$ptype','$pdate','$pshift')";
if ($conn->query($sql)){
  echo "Data updated";
            $_SESSION['message']='LOOM '. $ploomno .  ' STARTED.';
      header("Location: loomno.php");

} else {
  echo "ERROR: " . $sql . $conn->error;
}

}



?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>loomstart</title>
  
  
  
      <link rel="stylesheet" href="loomstartstyle.css">

  
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
  <h1>     LOOM MANAGMENT </h1><BR>
 <form method="POST" action="loomstart.php">
 
  <br><div class="userinput">
   <label> EMP Id  </label>
   <input type="text" name="empid" value="<?php echo $pempid; ?>" required>
  </div>
 <div class="userinput">
   <label> EMP Name  </label>
   <input type="text" name="empname" value="<?php echo $name; ?>" required>
  </div>
 <div class="userinput">
   <label> LOOM_No </label>   
   <input id="A" type="number" name="loomno" value="<?php echo $ploomno; ?>" readonly>
  </div>

 <div class="userinput">
   <label> Start Reading </label>   
   <input type="number" name="sread" value="<?php echo $lastread; ?>" required>
  </div>
<div class="userinput">
   <label> Type </label>   
    <select name="type" required>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
</select> 
  </div>
<div class="userinput">
   <label>Date</label>   
   <input type="date" name="date" value="<?php echo date("d-m-Y"); ?>" required>
  </div>
<div class="userinput">
   <label>Shift</label>   
   <input type="text" name="shift" value="<?php echo $shift; ?>" required>
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
