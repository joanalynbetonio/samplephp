<?php

	include_once("config.php");

	if(isset($_POST['update']))
	{
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
		$iso = mysqli_real_escape_string($mysqli, $_POST['iso']);
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$nicename = mysqli_real_escape_string($mysqli, $_POST['nicename']);
		$iso3 = mysqli_real_escape_string($mysqli, $_POST['iso3']);
		$numcode = mysqli_real_escape_string($mysqli, $_POST['numcode']);
		$phonecode = mysqli_real_escape_string($mysqli, $_POST['phonecode']);

		if( empty($iso) || empty($name) || empty($nicename) ||empty($iso3) || empty($numcode) || empty($phonecode)){

		if(empty($iso)){
				echo "<font color='red'> Iso field is empty. </font><br/>";
		}
		if(empty($name)){
				echo "<font color='red'> Name field is empty. </font><br/>";
		}
		if(empty($nicename)){
				echo "<font color='red'> Nicename field is empty. </font><br/>";
		}
		if(empty($iso3)){
				echo "<font color='red'> Iso3 field is empty. </font><br/>";
		}
		if(empty($numcode)){
				echo "<font color='red'> Numcode field is empty. </font><br/>";
		}
		if(empty($phonecode)){
				echo "<font color='red'> Phonecode field is empty. </font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

	} else {

		$result = mysqli_query($mysqli, "UPDATE country set iso='$iso', name='$name', nicename='$nicename', iso3='$iso3', numcode='$numcode', phonecode='$phonecode' WHERE id=$id");
		header("Location: index.php");
	}
}

?>

<?php

	$id = $_GET['id'];

	$result = mysqli_query($mysqli, "SELECT * FROM country WHERE id = $id");

	while($res = mysqli_fetch_array($result))
	{
		$iso = $res['iso'];
		$name = $res['name'];
		$nicename = $res['nicename'];
		$iso3 = $res['iso3'];
		$numcode = $res['numcode'];
		$phonecode = $res['phonecode'];

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Edit Data</title>
<style>
	body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
h1{
	color: white;
}
</style>
</head>
<body class="bg-dark">
	<br>
	<h1 class="font-weight-bold" text align="center">ADD NEW COUNTRY</h1><hr>
	<br><br><br>
 	<div class="container">
	<form name="form1" method="post" action="edit.php">

			<tr>
				<td>Iso</td>
				<td><input type="text" name="iso" value="<?php echo $iso;?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td>Nicename</td>
				<td><input type="text" name="nicename" value="<?php echo $nicename;?>"></td>
			</tr>
			<tr>
				<td>Iso3</td>
				<td><input type="text" name="iso3" value="<?php echo $iso3;?>"></td>
			</tr>
			<tr>
				<td>Numcode</td>
				<td><input type="text" name="numcode" value="<?php echo $numcode;?>"></td>
			</tr>
			<tr>
				<td>Phonecode</td>
				<td><input type="text" name="phonecode" value="<?php echo $phonecode;?>"></td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				</td>

				<td><input type="submit" class="btn btn-success" name="update" value="Update"></td>
			</tr>
	</form>
</div>

<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>