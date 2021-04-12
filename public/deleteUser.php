<?php
	include '../includes/settings.php';
	include '../includes/functions.php';
		
	if( isset( $_GET['id'] ) ) {		
		
		$db = new DB();
		$table = User::delete($_GET['id']);		
		unset( $db );
		
	}
	else{
		alerts('شناسه کاربر نامشخص!');
		//redirect
	}
	
	$alerts = alerts();
	include '../includes/views/deleteUser.php';
	//redirect ...