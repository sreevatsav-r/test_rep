<?php

if(!isset($_SESSION['isLoggedIn']) || !($_SESSION['isLoggedIn']))
{
	//code for authentication comes here
	//ASSUME USER IS VALID
	$_SESSION['isLoggedIn'] = true;
	/////////////////////////////////////////
	$_SESSION['timeOut'] = 600;
	$logged = time();
	$_SESSION['loggedAt']= $logged;	
	showLoggedIn();
}
else
{
	require 'timeCheck.php';
	$hasSessionExpired = checkIfTimedOut();
	if($hasSessionExpired)
	{
		session_unset();
		header("Location:logout.php");
		exit;
	}
	else
	{
		$_SESSION['loggedAt']= time();// update last accessed time
		showLoggedIn();
	}

}
	function showLoggedIn()
	{
		echo'<html>';
		echo'<head>';
		echo'<script type="text/javascript" src="ajax.js"></script>';
		echo'</head>';
		
		echo'</html>';
	}
	
