<?php
// Destroy session variables
session_unset();
setcookie(session_start(),'',time()-3600,'/');
session_destroy();
	
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
	//echo($_POST['username']);

	$count = validateUser();
	if($count == 1){
	$userInfo = getUserInfo();
	
	/* Found a valid user. Register a session variable for the user*/
		$_SESSION['valid_user']=$_POST['username'];
		//echo ("Valid User");
		//echo($_SESSION['valid_user']);
		$_SESSION['userType']=strtolower($userInfo['userType']);
		//echo $_SESSION['userYype'];
		$_SESSION['idNumber']=$userInfo['idNumber'];
		//echo $_SESSION['idNumber'];
		header('Location: ./'.$_SESSION['userType'].'/view/dash.php');
	/* The default view will be displayed by default*/
	}else{
	//echo("Invalid User");
	// Must be an invalid user. Redirect to login page
	header('Location: ./login.html');
	}
}else{
	echo ("No username or password recognized.");
	echo ("Username: "+ $_POST['username'] );
	echo ("Password: "+ $_POST['password'] );
	//Either username or password must be empty! Redirect to the login page
	header('Location: ./login.html');
}
}

/*if($action=='logout'){
	// Destroy session variables and redirect to login page
	session_unset();
	setcookie(session_start(),'',time()-3600,'/');
	session_destroy();
	header("Location: ./login.html");
	}/*
/* Only valid users should be able to perform any of the following tasks!
  It is possible for invalid user to reach this far
  Check if it is a valid user. If not, redirect to the login page.*/


?>