<?php
session_start();
include('./model/fun.php');

$action = "";

if (isset($_REQUEST['action']))
        $action = $_REQUEST['action'];
	
	if ($action=='login'){
	if(isset($_POST['username'])&& isset($_POST['password'])){
	/* If both username and password are nonempty then check if it is
	s valid user. If it is a valid user then display default page for
	the admin. Else, it must be an invalid user. Redirect to the login
	page if username or password is empty then display the login page*/
	$count = validateUser();
	if($count == 1){

	/* Found a valid user. Register a session variable for the user*/
		$_SESSION['valid_user']=$_POST['username'];
	/* The default view will be displayed by default*/
		echo "This far.";
	}else{
	// Must be an invalid user. Redirect to login page
	header('Location: ./view/login.html');
	}
}else{
	//Either username or password must be empty! Redirect to the login page
	header('Location: ./view/login.html');
}
}

if($action=='logout'){
	// Destroy session variables and redirect to login page
	session_unset();
	setcookie(session_start(),'',time()-3600,'/');
	session_destroy();
	header("Location: ./view/login.html");
	}
/* Only valid users should be able to perform any of the following tasks!
  It is possible for invalid user to reach this far
  Check if it is a valid user. If not, redirect to the login page.*/

if(!isset($_SESSION['valid_user'])){
	header("Location: ./view/dashboard.html");}
//Valid users should be able to performt he following tasks.

switch($action) {

default:
	include("./view/dashboard.html");
	break;
}
?>