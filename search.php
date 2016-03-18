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
			if(isset($_POST['submit'])){
			if(isset($_GET['go'])){
			if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
			$name=$_POST['name'];
			//connect  to the database
			$db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
			//-select  the database to use
			$mydb=mysql_select_db("cs476");
			//-query  the database table
			$sql="SELECT  idNumber, firstName, lastName FROM Users WHERE firstName LIKE '%" . $name .  "%' OR lastName LIKE '%" . $name ."%'";
			//-run  the query against the mysql query function
			$result=mysql_query($sql);
			//-create  while loop and loop through result set
			while($row=mysql_fetch_array($result)){
					$firstName  =$row['firstName'];
					$lastName=$row['lastName'];
					$idNumber=$row['idNumber'];
			//-display the result of the array
			echo "<ul>\n";
			echo  "<li>" . "<a  href=\"search_display.php?idNumber=$idNumber\">"   .$firstName . " " . $lastName . " " .$idNumber ."</a></li>\n";
			echo "</ul>";
			}
			}
			else{
			echo  "<p>Please enter a search query</p>";
			}
			}
			}//end of search form script
			if(isset($_GET['by'])){
			$letter=$_GET['by'];
			//connect  to the database
			$db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
			//-select  the database to use
			$mydb=mysql_select_db("cs476");
			//-query  the database table
			$sql="SELECT  idNumber, firstName, lastName FROM Users WHERE firstName LIKE '%" . $letter . "%' OR lastName LIKE '%" . $letter ."%'";
			//-run  the query against the mysql query function
			$result=mysql_query($sql);
			//-count  results
			$numrows=mysql_num_rows($result);
			echo  "<p>" .$numrows . " results found for " . $letter . "</p>";
			//-create  while loop and loop through result set
			while($row=mysql_fetch_array($result)){
				$firstName  =$row['firstName'];
				$lastName=$row['lastName'];
				$idNumber=$row['idNumber'];
			//-display  the result of the array
			echo  "<ul>\n";
			echo  "<li>" . "<a  href=\"search_display.php?idNumber=$idNumber\">"   .$firstName . " " . $lastName . " " .$idNumber ."</a></li>\n";
			echo  "</ul>";
			}
			}
			?>
      </div>
  </div>
</div>
</body>
</html>
