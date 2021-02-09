<?php

	include_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Add Script</title>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}


h1{
	color: white;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
.container {
    padding: 16px;
    background-color: white;
}
</style>
</head>
<body class="bg-dark">
<br>
	<h1 class="font-weight-bold" text align="center">ADD NEW COUNTRY</h1><hr>
	<br><br><br>
<form action="add.php" method="post" name="form1" style="max-width: 500px;margin:auto">
<div class="container" align="center">
  <table class="table table-bordered">
    <tbody>
      <tr>
    	<?php
	if (isset($_POST['submit'])){
		$iso = mysqli_real_escape_string($mysqli, $_POST['iso']);
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$nicename = mysqli_real_escape_string($mysqli, $_POST['nicename']);
		$iso3 = mysqli_real_escape_string($mysqli, $_POST['iso3']);
		$numcode = mysqli_real_escape_string($mysqli, $_POST['numcode']);
		$phonecode = mysqli_real_escape_string($mysqli, $_POST['phonecode']);

		if( empty($iso) || empty($name) || empty($nicename) ||empty($iso3) || empty($numcode) || empty($phonecode) ){

			if(empty($iso)){ 
				echo "<font color='red'> Iso field is empty. </font></br>";
			}
			if(empty($name)){
				echo "<font color='red'> Name field is empty. </font></br>";
			}
			if(empty($nicename)){
				echo "<font color='red'> Nicename field is empty. </font></br>";
			}
			if(empty($iso3)){
				echo "<font color='red'> Iso3 field is empty. </font></br>";
			}
			if(empty($numcode)){
				echo "<font color='red'> Numcode field is empty. </font></br>";
			}
			if(empty($phonecode)){
				echo "<font color='red'> Phonecode field is empty. </font></br>";
			}
			echo "</br><a href='javascript:self.history.back();'>Go Back</a>";

		} 
		else {

		$result = mysqli_query($mysqli, "INSERT INTO country(iso, name, nicename, iso3, numcode, phonecode ) VALUES ('$iso', '$name', '$nicename', '$iso3', '$numcode', '$phonecode')");

		echo "<font color='green'> Data Added Successfully.";
		echo "<br><a href='index.php'> View Result </a>";

		}
	}
?>    
      </tr>
    </tbody>
  </table>
</div>		
</form>
	<script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>