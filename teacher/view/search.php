
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gradebook Service Dashboard</title>
    <meta name="description" content="Dashboard for Gradebook">
    <meta name="author" content="Grant Jones">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href= "dist/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Gradebook Service</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dash.php">Dashboard</a></li>
			<li><a href="../../login.html">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 main">
          <h1 class="page-header">Directory Search</h1>
        </div>
      </div>
    </div>
<div class="container">
  <div class="jumbotron">
    <span><h1>Welcome to the Directory Search</h1></span>
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
			echo  "<li>" . "<a  href=\"search_display.php?idNumber=$idNumber\">"   .$firstName . " " . $lastName . ", ID Number =  " .$idNumber ."</a></li>\n";
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
			echo  "<li>" . "<a  href=\"search_display.php?idNumber=$idNumber\">"   .$firstName . " " . $lastName . ", ID Number =  " .$idNumber ."</a></li>\n";
			echo  "</ul>";
			}
			}
			?>
      </div>
  </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>
</html>






