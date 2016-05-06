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
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>
</html>
<?php

//$conn = new mysqli('localhost', 'root', 'SoftEng476', 'cs476') 
//or die ('Cannot connect to db');

$db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
//-select  the database to use
$mydb=mysql_select_db("cs476");


    $result2 = mysql_query("select Course.courseName, Class.sectionID from Class, Course
							where Course.courseID=Class.courseID and Class.classID=".$_GET['classID']." and Class.semesterID=1");
	$row2 = mysql_fetch_assoc($result2);
	echo "<h2> Grades for ".$row2['courseName']." section ".$row2['sectionID']."</h2>";

	//Build the named column for the table.
	$result1 = mysql_query("select Assignment.assignmentName from Assignment");
	echo "<table class='table table-bordered'><thread class='t-head'><tr><td>Student ID</td><td>First Name</td><td>Last Name</td>";
	
	if(mysql_num_rows($result1)>0){
		while($row1 = mysql_fetch_assoc($result1)){
		echo"<td>".$row1['assignmentName']."</td>";
		}
	}
	echo "<td>Final Grade</td></tr>";
	
	$sql2="Select Registers.idNumber From Registers Where Registers.classID =".$_GET['classID']."";
	//-run  the query against the mysql query function
	$student_list=mysql_query($sql2);

	
	if( mysql_num_rows($student_list)>0){
		echo "Hello~";
		while($row = mysql_fetch_assoc($student_list))
		{
			//Print the students information
			$idNumber=$row['idNumber'];
			$result3 = mysql_query("select Users.idNumber, Users.firstName, Users.lastName, Registers.finalGrade from Users, Registers where Users.idNumber=".$idNumber."
									and Registers.idNumber=Users.idNumber and Registers.classID=".$_GET['classID']."");
			$row3=mysql_fetch_assoc($result3);
			$idNumber = $row3['idNumber'];
			$firstName = $row3['firstName'];
			$lastName = $row3['lastName'];
			$finalGrade = $row3['finalGrade'];
			echo "<tr><td>".$idNumber."</td><td>".$firstName."</td><td>".$lastName."</td>";
			
			//Print their grades for each assignment
			$result4= mysql_query("select Gradebook.grade
					from Gradebook, Users, Class, Assignment, Registers
					where Registers.classID=".$_GET['classID']." and Gradebook.classID=Registers.classID and Gradebook.classID=Class.classID
					and Gradebook.idNumber=Registers.idNumber and Registers.idNumber=Users.idNumber and Users.idNumber=".$idNumber."
					and Gradebook.assignmentID=Assignment.assignmentID and Class.semesterID=1");
			
				if(mysql_num_rows($result4)>0){
				while($row4 = mysql_fetch_assoc($result4)){
					echo"<td>".$row4['grade']."</td>";
					}
				}
				echo "<td>".$finalGrade."</td>";
				echo "</tr>";
		}
	}
	echo "</table>";

?>
