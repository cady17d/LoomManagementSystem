<?php
session_start();

if (!isset($_SESSION['sessionid'])){
  header("Location: index.php");
}

$server= "127.0.0.1";
$bduser= "root";
$dbpass= "devilmaycry";
$db= "Loom";
$flag=0;
$conn= new mysqli($server,$dbuser,$dbpass,$db);

$ploomno= $_SESSION['loomno'];

$sql="SELECT * FROM tmp WHERE loomno='$ploomno'";

$res=$conn->query($sql);

if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		//echo "<br>". "Name:".$row['empid'] . $row['empname'] . $row['loomno'] . $row['sread'] . $row['eread'] . $row['type'] . $row['date'] . $row['shift'] ."<br>";
		$pempid= $row['empid'];
		$pempname= $row['empname'];
		$psread= $row['sread'];
		$ptype= $row['type'];
		$pdate= $row['date'];
		$pshift= $row['shift'];
	}
}



$peread= $_POST['eread'];

if($peread<$psread){
    echo "Please check end reading!";
}
else
{
        if($peread!=0){
                        $sql="UPDATE tmp SET eread=$peread WHERE loomno=$ploomno ";
                        if ($conn->query($sql)){
                        $flag=1;
                        echo "Data updated!";
                        //  cpy();
}       else {
                        $flag=0;
                        echo "ERROR: " . $sql . $conn->error;
}
}



if($flag==1)
{
  $prod=$peread-$psread;
  $type=$ptype;
  $shift=$pshift;
  $sql3="UPDATE loomtable SET production=production + $prod, $type= $type + $prod,$shift=$shift + $prod,lastread=$peread WHERE loomno=$ploomno ";

  if ($conn->query($sql3)){
  echo "Updated Production!";
  } 
    $sql4="UPDATE reg SET production=production + $prod WHERE empid=$pempid ";

      if ($conn->query($sql4)){
      echo "Updated Employee!";
      echo $pempid;

             $sql5=" DELETE FROM tmp WHERE loomno=$ploomno "; 
      if ($conn->query($sql5)){
      $_SESSION['message']='LOOM '. $ploomno .  ' CLOSED.';
      //echo $_SESSION['message'];
      header("Location: loomno.php");
      }    

      }else {
        echo "ERROR: " . $sql4 . $conn->error;
      }
}

     /* if($temp==1)
      {
        $sql5=" DELETE FROM tmp WHERE loomno=$ploomno "; 
      if ($conn->query($sql5)){
      echo "Temp data deleted!";
      }       
      }*/
}

/*function cpy(){
 echo "fum";

  $sql3="INSERT INTO loomtable SELECT * FROM tmp WHERE loomno=$ploomno ";
  if ($conn->query($sql3)){
      echo "Data copied!";
  }
  else
  {
  echo "ERROR: " . $sql3 . $conn->error;    
  }
}
*/
?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>loomstop</title>
  
  
  
      <link rel="stylesheet" href="loomstopstyle.css">

  
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
<form method="POST" action="loomstop.php">
 
  <br><div class="userinput">
   <label> EMP Id : </label>
   <?php echo "$pempid"; ?>
  </div>
 <div class="userinput">
   <label> EMP Name : </label>
   <?php echo "$pempname"; ?>
  </div>
 <div class="userinput">
   <label> LOOM_No : </label>   
   <input id="A" type="number" name="loomno" value="<?php echo $ploomno; ?>"  readonly>
  </div>

 <div class="userinput">
   <label> Start Reading : </label>   
   <?php echo "$psread"; ?>
  </div>
 <div class="userinput">
   <label> End Reading : </label>
   <input type="number" name="eread" value="0" >     
  </div>
<div class="userinput">
   <label> Type : </label>   
   <?php echo "$ptype"; ?>
  </div>
<div class="userinput">
   <label>Date : </label>   
   <?php echo "$pdate"; ?>
  </div>
<div class="userinput">
   <label>Shift : </label>   
   <?php echo "$pshift"; ?>
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

