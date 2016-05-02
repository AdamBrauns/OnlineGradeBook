<?php

		        	if(isset($_POST['addbutton'])){

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
                    }

					<!-- REMOVE USER FUNCTIONALITY -->
					if(isset($_POST['removeUserButton'])){
                        $removeuserid = $_POST['removeuserid'];

                        //connect  to the database
                        $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                        // select  the database to use
                        $mydb=mysql_select_db("cs476");

                        //set up the SQL statement for 'Authentication'
                        $sql= "DELETE FROM `cs476`.`Authentication` WHERE `Authentication`.`idnumber` = ".$removeuserid;
                        mysql_query($sql);

                        //set up the SQL statement for 'CONTACT'
                        $sql= "DELETE FROM `cs476`.`Contact` WHERE `Contact`.`idnumber` = ".$removeuserid;
                        mysql_query($sql);

                        //set up the SQL statement for 'USERS'
                        $sql= "DELETE FROM `cs476`.`Users` WHERE `Users`.`idnumber` = ".$removeuserid;
                        mysql_query($sql);
                    }

					<!-- ADD CLASS FUNCTIONALITY -->
					if(isset($_POST['addClassButton'])){
                        $coursename = $_POST['coursename'];
                        $coursedesc = $_POST['coursedesc'];

                        //connect  to the database
                        $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                        // select  the database to use
                        $mydb=mysql_select_db("cs476");

                        //set up the SQL statement for 'Authentication'
                        $sql= "INSERT INTO `cs476`.`Course` (`courseID`, `courseName`, `courseDescription`) VALUES (NULL, '".$coursename."', '".$coursedesc."')";
                        mysql_query($sql);

                    }

					<!-- REMOVE CLASS FUNCTIONALITY -->
					if(isset($_POST['removeClassButton'])){
                        $removeclassid = $_POST['removeclassid'];


                        //connect  to the database
                        $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                        // select  the database to use
                        $mydb=mysql_select_db("cs476");

                        //set up the SQL statement for 'Authentication'
                        $sql= "DELETE FROM `cs476`.`Course` WHERE `Course`.`courseID` = ".$removeclassid;
                        mysql_query($sql);

                    }

					<!-- UPDATE PASSWORD FUNCTIONALITY -->
					if(isset($_POST['changePasswordButton'])){
                        $changeuserid = $_POST['changeuserid'];
                        $newpass = $_POST['newpass'];
                        $newpass2 = $_POST['newpass2'];

                        //check if both passwords match
                        if (newpass == newpass2){
                            //connect  to the database
                            $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                            // select  the database to use
                            $mydb=mysql_select_db("cs476");

                            //set up the SQL statement for 'Authentication'
                            $sql = "UPDATE  `cs476`.`Authentication` SET  `password` =  '".newpass."' WHERE  `Authentication`.`idNumber` =".$changeuserid;
                            mysql_query($sql);
                        }
                    }


					<!-- ADD ENROLLMENT FUNCTIONALITY (LEFT INCOMPLETE!) -->
					if(isset($_POST['addEnrollment'])){
                        $enrollmentuserid = $_POST['enrollmentuserid'];
                        $enrollmentcourse = $_POST['enrollmentcourse'];

                        //connect  to the database
                        $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                        // select  the database to use
                        $mydb=mysql_select_db("cs476");





                    }

					<!-- REMOVE ENROLLMENT FUNCTIONALITY (LEFT INCOMPLETE!) -->
					if(isset($_POST['removeEnrollment'])){
                        $enrollmentuserid = $_POST['enrollmentuserid'];
                        $enrollmentcourse = $_POST['enrollmentcourse'];

                        //connect  to the database
                        $db=mysql_connect  ('localhost', 'root',  'SoftEng476') or die ('I cannot connect to the database  because: ' . mysql_error());
                        // select  the database to use
                        $mydb=mysql_select_db("cs476");
                    }
		  			?>
