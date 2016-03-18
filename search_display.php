<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gradebook Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="jumbotron">
    <h1>Welcome to the Gradebook Search</h1> 
    <div class="col-md-6 col-centered">
    <p>Type in a last name to search.</p>
	    <form  method="post" action="search.php?go"  id="searchform"> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
	<?php
				echo $_GET['idnumber'];
				if(isset($_GET['idNumber'])){
				$idNumber=$_GET['idNumber'];
				include('./model/dbconnect.php');
				global $db;
				//-query  the database table
				$sql="SELECT  * FROM Contact WHERE idNumber = '".$idNumber."'";
				
				// Prepare statement
				$statement = $db->prepare($sql);
				// Execute the statement
				$statement->execute();
				// Read records into an array
				$results = $statement->fetchAll();

				foreach  ($results as $row){
				//	$firstName =$row['firstName'];
				//	$lastName=$row['lastName'];
				//	$phoneNumber=$row['phoneNumber'];
				//	$emailAddress=$row['emailAddress'];
				//	$addressLine1=$row['addressLine1'];
				//	$addressLine2=$row['addressLine2'];
				//	$zipcode=$row['zipcode'];
				//	$stateID=$row['stateID'];
				
				//-display  the result of the array
				echo   $row['firstName']  $row['lastName'];
			    echo   $row['phoneNumber'];
				echo   $row['emailAddress'];
				echo   $row['addressLine1']  $row['addressLine2'];
				echo   $row['stateID']  $row['zipcode']; 

				}
				}
	?>

  </div>
</div>
</div>
</body>
</html>