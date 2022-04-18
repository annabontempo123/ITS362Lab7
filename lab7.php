<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="style.css">
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

	<title>Lab 7</title>
	
</head>
<body>
<h1> ITS 362 - Lab 7 </h1>
<h3> Anna Bontempo </h3>
	<hr>
	<div id="main">
		<form action="" method="POST">
		<br>
			<select class="options" name="options">
				<option value="viewAll">All Students</option>
				<option value="fromChi">All Students from Chicago</option>
				<option value="lNameGroup">All Students Alpabetically by Last Name</option>
				<option value="fNameGroup">All Students Alphabetically by First Name</option>
			</select>
			<input class="button" type="submit" name="view" value="View"></input>
			
		</form>
	</div>
	<br>
	<hr>

<?php
	include_once("db.php");
	if (isset($_POST['view'])){
		if(isset($_POST['options'])){
			$check = $_POST['options'];
		
			if ($check == "viewAll"){
				$query = mysqli_query($conn, "SELECT * from students");
				echo '<br><h2>All Students: </h2><br>';
			}
			if ($check == "fromChi"){
				$query = mysqli_query($conn, "SELECT * from students WHERE city LIKE '%Chicago' ");
				echo '<br><h2>All Students from Chicago: </h2><br>';
			}
			if ($check == "lNameGroup"){
				$query = mysqli_query($conn, "SELECT * from students ORDER BY lName");
				echo '<br><h2>All Students Sorted by Last Name: </h2><br>';
			}
			if ($check == "fNameGroup"){
				$query = mysqli_query($conn, "SELECT * from students ORDER BY fName");
				echo '<br><h2>All Students Sorted by First Name: </h2><br>';
			}
			echo '<table id="mytable" class="tbl">';
			echo '<tr class="tRow"><th class="tHead">Name</th><th class="tHead">Email</th><th class="tHead">Street</th><th class="tHead">City</th><th class="tHead">Zip Code</th></tr><tbody id="thebody">';
			
			while($r = mysqli_fetch_array($query)) 
			{
				echo '<tr class="tRow">';
				echo '<td class="tData">', $r['fName'], ' ', $r['lName'], '</td>';
				echo '<td class="tData">', $r['email'], '</td>';
				echo '<td class="tData">', $r['street'], '</td>';
				echo '<td class="tData">', $r['city'], '</td>';

				echo '<td class="tData">', $r['zipcode'], '</td>';
				echo '</tr>';
			}
			
			echo '</tbody></table>';
		}
	}
?>

</body>	
</html>