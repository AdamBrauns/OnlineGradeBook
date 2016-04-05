<?php

/* List of functions that a teacher needs
	add gradebook
	view a gradebook
	view submitted assignments
	add assignments	
*/

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
$userType = "";
$username = "";
$idNumber = "";
if (isset($_POST['username']))
        $username = $_POST['username'];
$password = "";
if (isset($_POST['password']))
        $password = $_POST['password'];
		
if (empty($username) || empty($password))
        echo "Invalid data";
else {
  // validate user
global $db;
  // prepare SQL statement
  $sql = "select username.Authentication from Authentication, Users where username.Authentication=:username 
  and password.Authentication=:password and idNumber.Authentication=idNumber.Users and userType.Users='admin'";
  $statement=$db->prepare($sql);

  // Bind values to names parameteres
  $statement->bindValue(':username', $username);

  /* Passwords in the database are encrypted using md5() function.
     Therefore, password value needs to be encrytped using md5( ) function.
  */

  $statement->bindValue(':password', md5($password));

  try {
        $statement->execute();
        // Fetch matching record
        $result = $statement->fetch();
        // If the number of matching records (affected rows) is one then it is a valid user
        if ($statement->rowCount() ==1)
                return 1;
        else // Invalid user
                return -1;
  } catch (PDOException $e){
        echo "Error! ".$e->getMessage();
  }//end catch
 }//end if  else
}//end function validateUser

?>