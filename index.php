<?php

	include_once("config.php");

	$result = mysqli_query($mysqli, "SELECT * FROM country");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Final Drill</title>

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: black;
    color: white;
}
hr {
    border: 1px solid black;
    margin-bottom: 45px;
}

</style>

</head>
<body>
	<br>
	<h1 class="font-weight-bold" text align="center">WORLD COUNTRIES</h1><hr>
	<a type="button" class="btn btn-success" href="add.html">Add New Data</a><br><br>


	<table class="table">
		<tr class="font-weight-bold alert-success" text align="center">
			<td width="15">Iso</td>
			<td width="20">Name</td>
			<td width="20">Nicename</td>
			<td width="15">Iso3</td>
			<td width="15">Numcode</td>
			<td width="15">Phonecode</td>
			<td width="20">Created</td>
			<td width="15">Update</td>

		</tr>

		<?php
			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$res['iso']."</td>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['nicename']."</td>";
				echo "<td>".$res['iso3']."</td>";
				echo "<td>".$res['numcode']."</td>";
				echo "<td>".$res['phonecode']."</td>";
				echo "<td>".$res['created_at']."</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record?')\">Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>

	<script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>