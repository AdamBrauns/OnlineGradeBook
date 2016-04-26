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
            <li><a href="dash.html">Dashboard</a></li>
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

			
			$idNumber=$_POST['idNumber'];
			$assignID=$_POST['assignmentID'];
			$grade=$_POST['grade'];
			$classID=$_POST['classID'];
			echo "id: ".$idNumber." assignmentID:   ".$assignID." classID:  ".$classID." Grade:  ".$grade." ";
			
			//connect  to the database
			$db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
			//-select  the database to use
			$mydb=mysql_select_db("cs476");
			//-query  the database table
			$sql="SELECT  Gradebook.classID FROM Gradebook WHERE Gradebook.classID=".$classID." AND Gradebook.assignmentID=".$assignID." AND Gradebook.idNumber=".$idNumber."";
			echo $sql;
			//-run  the query against the mysql query function
			$result=mysql_query($sql);
			echo "Boop";
			//-create  while loop and loop through result set
			$rowCt=mysql_num_rows($result);
			if($rowCt>0){
				$sql2 = "UPDATE Gradebook 
				SET Gradebook.grade=".$grade."
				WHERE Gradebook.classID=".$classID." AND Gradebook.assignmentID=".$assignID." AND Gradebook.idNumber=".$idNumber."";
				echo "Shabam";
				if (mysql_query($sql2) === TRUE) {
					echo "New record updated successfully";
				} else {
					echo "Error: " . $sql . "<br>";
				}
				echo "This is Sad.";
			}else if($rowCt==0){
				$sql3 = "INSERT INTO Gradebook (classID, assignmentID, idNumber, grade)
				VALUES (".$classID.", ".$assignID.", ".$idNumber.", ".$grade.")";

				if (mysql_query($sql3) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>";
				}

			}

	?>