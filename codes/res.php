<?php
session_start();

if (!isset($_SESSION['sessionid'])){
	header("Location: index.php");
}

//echo $_SESSION['sessionid'];

$server= "127.0.0.1";
$bduser= "root";
$dbpass= "devilmaycry";
$db= "Loom";

$conn= new mysqli($server,$dbuser,$dbpass,$db);


$pempid= test_input($_POST['empid']);
$ptype= test_input($_POST['type']);
$ploomno= test_input($_POST['loomno']);

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($pempid)){
	$sql="SELECT * FROM reg WHERE empid='$pempid' ";

$res=$conn->query($sql);
if($res->num_rows>0){
			echo '<div class="main">' . "<br>"."<b>Details of EMP Id: </b>". $pempid;
			echo '<table border=4>
						<tr>
						<th>Name</th>
						<th>Age</th>
						<th>Gender</th>
						<th>DOB</th>
						<th>Address</th>
						<th>Permanent Address</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Production</th>
						</tr>';			
	while($row=$res->fetch_assoc()){

						echo '
						<tr>
						<td>'.$row['name'].'</td>
						<td>'.$row["age"].'</td>
						<td>'.$row["gender"].'</td>
						<td>'.$row["dob"].'</td>
						<td>'.$row["address"].'</td>
						<td>'.$row["paddress"].'</td>
						<td>'.$row["contact"].'</td>
						<td>'.$row["email"].'</td>
						<td>'.$row["production"].'</td>
						</tr>';


		//echo "<br>". "Name:".$row['name'] . "Age:" . $row['age'] . "Gender:" . $row['gender'] . "DOB:" .$row['dob'] . "Address:" . $row['address'] ."Permanent Address:". $row['paddress'] . "Contact:" . $row['contact'] . "Email:" . $row['email'] . "EMP Id:". $row['empid'] ."Production:" .$row['production'] ."<br>";
	}

					echo '</table>';	
					echo '</div>';
}
else
{
	echo "No results found!";
}
}

if(isset($ptype)){

		$sql="SELECT loomno, $ptype FROM loomtable ";

		$res=$conn->query($sql);
		if($res->num_rows>0){
			echo '<div class="main">' . "<br>"."<b>Production of cloth type: </b>". $ptype;
			echo '<table border=4>
						<tr>
						<th>Loom_no</th>
						<th>Production</th>
						</tr>';

			while($row=$res->fetch_assoc()){
				//echo $sql;

						echo '
						<tr>
						<td>'.$row['loomno'].'</td>
						<td>'.$row["$ptype"].'</td>
						</tr>';

				//echo "<br>". "Loom no:".$row['loomno'] . "Production:".$row["$ptype"].   "<br>";
				$sumtype=$sumtype + $row["$ptype"];
			}

					echo '</table>';
		echo " Total Production: " .$sumtype. "<br>";
					echo '</div>';					

		}else{
			echo "No results found!";
		}		 		
		//echo " Total Production: " .$sumtype. "<br>";

} else {
	echo "enter data";
}


if(isset($ploomno)){
	$sql="SELECT * FROM loomtable WHERE loomno='$ploomno' ";

$res=$conn->query($sql);
if($res->num_rows>0){
			echo '<div class="main">' . "<br>"."<b>Production of Loom_no: </b>". $ploomno;
					echo '<table border=4>
						<tr>
						<th>A</th><th>B</th><th>C</th><th>Total Production</th><th>Day</th><th>Night</th>
						</tr>';

	while($row=$res->fetch_assoc()){


					echo '
						<tr>
						<td>'.$row['A'].'</td>
						<td>'.$row['B'].'</td>
						<td>'.$row['C'].'</td>
						<td>'.$row['production'].'</td>
						<td>'.$row['day'].'</td>
						<td>'.$row['night'].'</td>
						</tr>';
		//echo "<br>". "Loom_no:".$row['loomno'] . "A:" . $row['A'] . "B:" . $row['B'] . "C:" .$row['C'] . "Total Production:" . $row['production'] ."Day:". $row['day'] . "Night:" . $row['night'] ."<br>";
	}

					echo '</table>';
					echo '</div>';	
}
else
{
	echo "No results found!";
}
}

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

</div>
  
  

</body>

</html>