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
    echo "<form method='post' action='display_added.php'>";
	echo "<br> Enter assignment name. <br>";
	echo "<input type='text' name='assignmentName'>";
	echo "<br> Enter assignment description. <br>";
	echo "<input type='text' name='description'>";
	echo "<br> Enter assignment due date. <br>";
	echo "<input type='text' name='dueDate'>";
	echo "<br> Enter assignment total score. <br>";
	echo "<input type='text' name='totalScore'>";
	echo "<br> Enter assignment weight.<br>";
	echo "<input type='text' name='weight'>";
	
	echo "<input type='hidden' name='classID' value='".$_GET['classID']."'>";
	echo "<br> <button type='submit' name='submit'> Submit </button></form>";
	
	
?>
