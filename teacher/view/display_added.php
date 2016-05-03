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
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>


<?php

			$assignmentName=$_POST['assignmentName'];
			$description=$_POST['description'];
			$dueDate=$_POST['dueDate'];
			$totalScore=$_POST['totalScore'];
			$weight=$_POST['weight'];
			$classID=$_POST['classID'];
	
			//connect  to the database
			$db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
			//-select  the database to use
			$mydb=mysql_select_db("cs476");
			//-query  the database table
			$sql="INSERT INTO Assignment(assignmentName, description, dueDate, totalScore, weight)
				VALUES ('".$assignmentName."', '".$description."', '".$dueDate."', '".$totalScore."', ".$weight.")";
			
			//-run  the query against the mysql query function
			if (mysql_query($sql) === TRUE) {
					//echo "New assignment added successfully";
				} else {
					//echo "Error: " . mysql_error() . "<br>";
				}
	
			$sqlAssign = "select Assignment.assignmentID FROM Assignment WHERE Assignment.assignmentName='".$assignmentName."' and Assignment.description='".$description."'
						 and Assignment.dueDate='".$dueDate."' and Assignment.totalScore='".$totalScore."' and
						 Assignment.weight=".$weight."";

			$getAssign = mysql_query($sqlAssign) or die(mysql_error());
			//echo $getAssign['assignmentID']."<br>";
			$gA = mysql_fetch_assoc($getAssign);
			
			
			//get a list of the students registered for the selected class.
			$sql2="Select Registers.idNumber From Registers Where Registers.classID =".$classID."";
			//-run  the query against the mysql query function
			$student_list=mysql_query($sql2);
			if(/*is_resource($student_list) and*/ mysql_num_rows($student_list)>0){
				while($row = mysql_fetch_assoc($student_list))
				{
					$sql3 = "INSERT INTO Gradebook (classID, assignmentID, idNumber, grade)
					VALUES (".$classID.", ".$gA['assignmentID'].", ".$row['idNumber'].", 0 )";
					//echo $sql3;
					if (mysql_query($sql3) === TRUE) {
						//echo "New assignment added successfully";
					} else {
						//echo "Error: " . mysql_error() . "<br>";
					}
					
				}
			}
			

	?>
	
			<script language="javascript">
			alert("New assignment successfully added!");
			location= "./dash.php";
			</script>
	</body>
</html>