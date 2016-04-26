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

    $result2 = $conn->query("select Course.courseName, Class.sectionID from Class, Course
							where Course.courseID=Class.courseID and Class.classID=".$_GET['classID']." and Class.semesterID=1");
	$row2 = $result2->fetch_assoc();
	echo "<h2> Grades for ".$row2['courseName']." section ".$row2['sectionID']."</h2>";

    $result = $conn->query("select Users.idNumber, Users.firstName, Users.lastName, Assignment.assignmentName, Assignment.dueDate, Gradebook.grade, Assignment.totalScore
							from Gradebook, Users, Class, Assignment, Registers
							where Registers.classID=".$_GET['classID']." and Gradebook.classID=Registers.classID and Gradebook.classID=Class.classID
							and Gradebook.idNumber=Registers.idNumber and 
							Registers.idNumber=Users.idNumber and Gradebook.assignmentID=Assignment.assignmentID and Class.semesterID=1;");

	echo "<table class='table table-bordered'><thread class='t-head'><tr><td>Student ID</td><td>First Name</td><td>Last Name</td><td>Assignment Name</td>";
	echo "<td>Due Date</td><td>Grade</td><td>Total Score</td></tr>";
    while ($row = $result->fetch_assoc()) {
				$idNumber = $row[idNumber];
				$firstName = $row[firstName];
				$lastName = $row[lastName];
				$assignmentName = $row[assignmentName];
				$dueDate = $row[dueDate];
				$grade = $row[grade];
				$totalScore = $row[totalScore];
				echo "<tr><td>".$idNumber."</td><td>".$firstName."</td><td>".$lastName."</td><td>".$assignmentName. "</td><td>".$dueDate."</td><td>".$grade."</td><td>".$totalScore."</td></tr>";
	}
	echo "</table>";
	
?>
