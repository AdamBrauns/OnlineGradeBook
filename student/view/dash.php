<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gradebook Service Dashboard</title>
    <meta name="description" content="Dashboard for Gradebook">
    <meta name="author" content="Grant Jones and Amber Thatcher">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

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
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/img/gradebook.png" width="225" height="225" class="img-responsive" alt="Generic placeholder thumbnail">
			  <h4><a href="display_classes3.php">View Gradebook</a></h4>
              <!--<h4><a id="view">View Gradebook</a></h4>-->
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/img/submit.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><a href="submit_assign.html">Submit Assignments</a></h4>
            </div>
            <div>
           <form id="classbuttons" style="display:none">
              <form>
              <?php
                $button = $_SESSION['classID'] == 'New' || $_SESSION['classID'] == '' ? "Submit" : "Update"; ?>
              <input id="<?php echo $button;?>" name ="<?php echo $button;?>" value="<?php echo $button;?>" type='button' onclick="window.location.href='grades.php'"/>

              <!--<input type="button" value="Class 1" onclick="window.location.href='grades.php'"/>
              <br>-->
              <br>
              <input type="button" value="Class 2" onclick="window.location.href='grades.php'" />
              <br>
              <br>
              <input type="button" value="Class 3" onclick="window.location.href='grades.php'" />
              <br>
              <br>
              <input type="button" value="Class 4" onclick="window.location.href='grades.php'" />
              <br>
              <br>
              <input type="button" value="Class 5" onclick="window.location.href='grades.php'" />
              </form>
            </form> 
            </div>   
            <div>
            <script type="text/javascript">
              $(function(){
                $('#view').click(function(){
                  $('#classbuttons').css("display", "inline");
                  $('#uploadButton').css("display", "none");
                });
                $('#classone').click(function(){
                  $('#grades').css("display", "inline");
                });
                $('#classtwo').click(function(){
                  $('#grades').css("display", "inline");
                });
                $('#classthree').click(function(){
                  $('#grades').css("display", "inline");
                });
                $('#classfour').click(function(){
                  $('#grades').css("display", "inline");
                });
                $('#classfive').click(function(){
                  $('#grades').css("display", "inline");
                });
                $('#submit').click(function(){
                  $('#submit_assign').css("display", "inline");
                });
              });  
            </script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
  </body>
</html>