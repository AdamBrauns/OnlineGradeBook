<!DOCTYPE html>
<?php
session_start();
?>
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
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 main">
          <h1 class="page-header">Class List</h1>
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



<?php

$conn = new mysqli('localhost', 'root', 'SoftEng476', 'cs476') 
or die ('Cannot connect to db');
	//echo $_SESSION['idNumber'];
    //$result = $conn->query("select Class.classID, Course.courseName, Class.sectionID from Class, Course, Registers
	//						where Registers.idNumber=".$_SESSION['idNumber']." and Registers.classID=Class.classID and Course.courseID=Class.courseID and Class.semesterID=1");

 $result = $conn->query("select Class.classID, Course.courseName, Class.sectionID from Class, Course, Registers
							where Registers.idNumber=".$_SESSION['idNumber']." and Registers.classID=Class.classID and Course.courseID=Class.courseID and Class.semesterID=1");

	//create a table with class name
	echo "<table class='table table-bordered'><thread class='t-head'><tr><td></td><td>Class Name</td><td>Class Section</td></tr>";
    while ($row = $result->fetch_assoc()) {
				$classID = $row[classID];
				$classN = $row[courseName];
				$sectionID = $row[sectionID];
				echo "<tr><td><form method='post' action='./grades.php?classID=".$classID."'><button type='submit'>Select</button><input type='hidden' name='action' value='select_gradebook'></td></form>";
				//echo "<input type='hidden' name='cid' value='".$classID."'</form></td>";
				echo "<td>".$classN. "</td><td>".$sectionID."</td></tr>";


}
	echo "</table>";

	
?>






