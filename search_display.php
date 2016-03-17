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
				if(isset($_GET['idNumber'])){
				$idNumber=$_GET['idNumber'];
				//connect  to the database
				$db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
				//-select  the database to use
				$mydb=mysql_select_db("cs476");
				//-query  the database table
				$sql="SELECT  * FROM Contact WHERE idNumber = '$idNumber'";
				//-run  the query against the mysql query function
				$result=mysql_query($sql);
				//-create  while loop and loop through result set
				while($row=mysql_fetch_assoc($result)){
					$firstName =$row['firstName'];
					$lastName=$row['lastName'];
					$phoneNumber=$row['phoneNumber'];
					$emailAddress=$row['emailAddress'];
					$addressLine1=$row['addressLine1'];
					$addressLine2=$row['addressLine2'];
					$zipcode=$row['zipcode'];
					$stateID=$row['stateID'];
				//-display  the result of the array
				echo  "<ul>\n";
				echo  "<li>" . $FirstName . " " . $LastName .  "</li>\n";
			    echo  "<li>" . $PhoneNumber . "</li>\n";
				echo  "<li>" . "<a href=mailto:" . $Email .  ">" . $Email . "</a></li>\n";
				echo  "<li>" . $addressLine1 . " " . $addressLine2 . "</li>\n";
				echo  "<li>" . $stateID . " " . $zipcode . "</li>\n"; 
				echo  "</ul>";
				}
				}
			?>
      </div>
  </div>
</div>
</body>
</html>
