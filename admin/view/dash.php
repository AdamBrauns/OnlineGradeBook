
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gradebook Service Dashboard</title>
    <meta name="description" content="Dashboard for Gradebook">
    <meta name="author" content="Adam Brauns">
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
          <a class="navbar-brand">Gradebook Service</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dash.html">Dashboard</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        < class="col-sm-12 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/img/students.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><a id="addRemStu">Add/Remove Users</a></h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/img/classes.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><a id="addRemClass">Add/Remove Classes</a></h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/img/password.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><a id="changepass">Change Password</a></h4>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="assets/img/enroll.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4><a id="enroll">Manage Enrollment</a></h4>
            </div>
          </div>
          <h1 class="page-header" id="headsub"></h1>
          <div id="test">
          <div>
            <form id="firstbuttons" style="display:none">
              <h2 style="text-decoration: underline;">Add/Remove Users</h2><br>
              <button type="button" id="add">Add User</button>
              <button type="button" id="rem">Remove User</button>
            </form>  
          </div>  
          <div>
              <form id="info" style="display:none">
                  <br>
                  Select User Type:<br>
                  <select name = "userType">
                      <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                      <option value="administrator">Administrator</option>
                  </select>
                  <br>
                  ID Number:<br>
                  <input type="text" name="idnumber"><br>
                  Email Address:<br>
                  <input type="text" name="emailaddress"><br>
                  Username:<br>
                  <input type="text" name="username"><br>
                  Password:<br>
                  <input type="text" name="password"><br>
                  First Name:<br>
                  <input type="text" name="firstname"><br>
                  Last Name:<br>
                  <input type="text" name="lastname"><br>
                  Address:<br>
                  <input type="text" name="address"><br>
                  Address 2:<br>
                  <input type="text" name="address2"><br>
                  State:<br>
                  <input type="text" name="state"><br>
                  Zipcode:<br>
                  <input type="text" name="zip"><br>
                  Phone Number:<br>
                  <input type="text" name="phonenumber"><br><br>

                  <button type="button" id="addbutton" name="addbutton">Submit</button>
            </form>
          </div>
          <div>
            <form id="removeSearch" style="display:none">
            <br>
            Username:<br>
            <input type="text" name="lastname">&nbsp;&nbsp;
            <button type="button" id="searchbutton">Remove User</button>
            </form>
          </div>
          <div>
            <form id="classbuttons" style="display:none">
              <h2 style="text-decoration: underline;">Add/Remove Classes</h2><br>
              <button type="button" id="addc">Add Class</button>
              <button type="button" id="remc">Remove Class</button>
            </form>  
          </div>
          <div>
            <form id="addclass" style="display:none">
              <br>Course Name:<br>
              <input type="text" name="coursename"><br>
              Course Description:<br>
              <input type="text" name="coursedesc"><br><br>
              <button type="button" id="searchbutton">Add Class</button>
            </form>  
          </div>
          <div>
            <form id="remclass" style="display:none">
              <br>Course Name:<br>
              <input type="text" name="coursename"><br><br>
              <button type="button" id="searchbutton">Remove Course</button>
            </form>  
          </div>  
          <div>
            <form id="passChange" style="display:none">
            <h2 style="text-decoration: underline;">Change Password</h2><br>
            Username:<br>
            <input type="text" name="username"><br>
            Enter New Password:<br>
            <input type="text" name="newpass"><br>
            Confirm Password:<br>
            <input type="text" name="newpass2"><br><br>
            <button type="button" id="searchbutton">Change Password</button>
            </form>
          </div>
          <div>
            <form id="enrollform" style="display:none">
            <h2 style="text-decoration: underline;">Manage Enrollment</h2>
            <br>
            Select User Type:<br>
            <select>
              <option value="student">Student</option>
              <option value="teacher">Teacher</option>
            </select>
            <br> 
            User ID:<br>
            <input type="text" name="firstname"><br>
            Course:<br>
            <input type="text" name="course"><br><br>
            <button type="button">Add</button>
            <button type="button">Remove</button>
            </form>
          </div>    
          </div>
          <script type="text/javascript">

            $(function(){

              $('#addRemStu').click(function(){
                $('#passChange').css("display", "none");
                $('#enrollform').css("display", "none");
                $('#classbuttons').css("display", "none");
                $('#remclass').css("display", "none");
                $('#addclass').css("display", "none");
                $('#firstbuttons').css("display", "inline");
              });

              $('#add').click(function(){
                $('#removeSearch').css("display", "none");
                $('#enrollform').css("display", "none");
                $('#info').css("display", "inline");
              });

              $('#rem').click(function(){
                $('#info').css("display", "none");
                $('#passChange').css("display", "none");
                $('#enrollform').css("display", "none");
                $('#remclass').css("display", "none");
                $('#addclass').css("display", "none");
                $('#removeSearch').css("display", "inline");
              });

              $('#addRemClass').click(function(){
                $('#info').css("display", "none");
                $('#removeSearch').css("display", "none");
                $('#firstbuttons').css("display", "none");
                $('#passChange').css("display", "none");
                $('#enrollform').css("display", "none");
                $('#classbuttons').css("display", "inline");
              });

              $('#addc').click(function(){
                $('#remclass').css("display", "none");
                $('#addclass').css("display", "inline");
              });  

              $('#remc').click(function(){
                $('#addclass').css("display", "none");
                $('#remclass').css("display", "inline");
              });  

              $('#changepass').click(function(){
                $('#info').css("display", "none");
                $('#removeSearch').css("display", "none");
                $('#firstbuttons').css("display", "none");
                $('#enrollform').css("display", "none");
                $('#classbuttons').css("display", "none");
                $('#remclass').css("display", "none");
                $('#addclass').css("display", "none");
                $('#passChange').css("display", "inline");
              });

              $('#enroll').click(function(){
                $('#info').css("display", "none");
                $('#removeSearch').css("display", "none");
                $('#firstbuttons').css("display", "none");
                $('#passChange').css("display", "none");
                $('#classbuttons').css("display", "none");
                $('#remclass').css("display", "none");
                $('#addclass').css("display", "none");
                $('#enrollform').css("display", "inline");
              });

              $('#addbutton').click(function(){

                  <?php
                  /*
                  //populate variables from the form
                  $usertype = $_POST['userType'];
                  $idnumber=$_POST['idnumber'];
                  $emailaddress=$_POST['emailaddress'];
                  $username=$_POST['username'];
                  $password=$_POST['password'];
                  $firstname=$_POST['firstname'];
                  $lastname=$_POST['lastname'];
                  $address=$_POST['address'];
                  $address2=$_POST['address2'];
                  $state=$_POST['state'];
                  $zip=$_POST['zip'];
                  $phonenumber=$_POST['phonenumber'];
                  $password=$_POST['password'];
                  */

                  /*
                  // create connection
                  $conn = new mysqli('localhost', 'root', 'SoftEng476', 'cs476');
                  // check connection
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }
                  $sql="INSERT INTO `cs476`.`Authentication` (`idNumber`, `username`, `password`) VALUES ('".$idnumber."', '".$username."', '".$password."')";

                  if ($conn->query($sql) === TRUE) {
                      echo "New record created successfully";
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                  }

                  $conn->close();
                  */

                  /*
                  //connect  to the database
                  $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                  // select  the database to use
                  $mydb=mysql_select_db("cs476");

                  //set up the SQL statement for 'AUTHENTICATION'
                  $sql="INSERT INTO `cs476`.`Authentication` (`idNumber`, `username`, `password`) VALUES ('".$idnumber."', '".$username."', '".$password."')";
                  //run the SQL statement
                  mysql_query($sql);

                  //set up the SQL statement for 'CONTACT'
                  $sql="INSERT INTO `cs476`.`Contact` (`idNumber`, `phoneNumber`, `emailAddress`, `addressLine1`, `addressLine2`, `stateID`, `zipcode`) VALUES ('".$idnumber."', '".$phonenumber."', '".$emailaddress."', '".$address."', '".$address2."', '".$state."', '".$zip."')";
                  //run the SQL statement
                  mysql_query($sql);

                  //set up the SQL statement for 'USERS'
                  $sql= "INSERT INTO `cs476`.`Users` (`idNumber`, `userType`, `lastName`, `firstName`) VALUES ('".$idnumber."', '".$usertype."', '".$lastname."', '".$firstname."')";
                  mysql_query($sql);
                  */
                  ?>

              });

            });

          </script>



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
