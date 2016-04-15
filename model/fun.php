<?php

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
$username = "";
$idNumber = "";
if (isset($_POST['username']))
        $username = $_POST['username'];
	
$password = "";
if (isset($_POST['password']))
        $password = $_POST['password'];
if (empty($username) || empty($password)){
        echo "Invalid data";
}else {
  // validate user
global $db;
  // prepare SQL statement
  $sql = "select Authentication.username from Authentication, Users where Authentication.username=:username 
  and Authentication.password=:password and Authentication.idNumber=Users.idNumber;";
	//echo($sql);
  $statement=$db->prepare($sql);

  // Bind values to names parameteres
  $statement->bindValue(':username', $username);
	echo($statement);
  /* Passwords in the database are encrypted using md5() function.
     Therefore, password value needs to be encrytped using md5( ) function.
  */

  $statement->bindValue(':password', $password);

  try {
        $statement->execute();
        // Fetch matching record
        $result = $statement->fetch();
		echo("Hello");
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

function getUserType(){// Read input
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
  $sql = "select Users.userType from Authentication, Users where Authentication.username=:username 
  and Authentication.password=:password and Authentication.idNumber=Users.idNumber;";
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
        return $result;
		
  } catch (PDOException $e){
        echo "Error! ".$e->getMessage();
  }//end catch
 }//end if  else
}//end function 



?>