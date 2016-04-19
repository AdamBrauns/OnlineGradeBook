<?php
include('/dbconnect.php');

function getResultArray($sql){
        global $db;
        // Prepare statement
        $statement = $db->prepare($sql);
        // Execute the statement
        $statement->execute();
        // Read records into an array
        $results = $statement->fetchAll();
        return $results;
}


function validateUser(){// Read input
$conn = new mysqli('localhost', 'root', 'SoftEng476', 'cs476') 
or die ('Cannot connect to db');

$userN = "";
$idNumber = "";
if (isset($_POST['username']))
        $userN = $_POST['username'];
	
$passW = "";
if (isset($_POST['password']))
        $passW = $_POST['password'];
if (empty($userN) || empty($passW)){
        echo "Invalid data";
}else {
  // validate user
global $db;
  // prepare SQL statement
  $sql = "select Authentication.username from Authentication, Users where Authentication.username='".$userN."' 
  and Authentication.password='".$passW."' and Authentication.idNumber=Users.idNumber;";
  $statement=$conn->query($sql);

  //try {
        //$statement->execute();
        // Fetch matching record
        $result = mysqli_fetch_assoc($statement);
		$rowNum = mysqli_num_rows($statement);
        // If the number of matching records (affected rows) is one then it is a valid user
        if ($rowNum ==1){
                return 1;
        }else{ // Invalid user
                return -1;
		}
  //} catch (PDOException $e){
    //    echo "Error! ".$e->getMessage();
  //}//end catch
 }//end if  else
}//end function validateUser

function getUserInfo(){// Read input
$conn = new mysqli('localhost', 'root', 'SoftEng476', 'cs476') 
or die ('Cannot connect to db');

$userN = "";
$idNumber = "";
if (isset($_POST['username']))
        $userN = $_POST['username'];
$password = "";
if (isset($_POST['password']))
        $passW = $_POST['password'];
		
if (empty($userN) || empty($passW))
        echo "Invalid data";
else {
	
  // validate user
global $db;
  // prepare SQL statement
  $sql = "select Users.userType, Users.idNumber from Authentication, Users where Authentication.username='".$userN."' 
  and Authentication.password='".$passW."' and Authentication.idNumber=Users.idNumber;";
  $statement=$conn->query($sql);
  // Bind values to names parameteres
        $result = mysqli_fetch_assoc($statement);
        return $result;
		

 }//end if  else
}//end function 



?>