<?php
	include '../includes/settings.php';
	include '../includes/functions.php';
		
	if( isset( $_GET['id'] ) ) {
		
		
		if( isset( $_POST['submit'] ) ){
			
			$parameters = $_POST;
			unset( $parameters['submit'] );
			$parameters['id'] = $_GET['id'];
			$db = new DB();
			$table = User::update( $parameters );
			unset( $db );			
		}
		
		$db = new DB();
		$table = User::find("id = {$_GET['id']}");
		$row = $table[0];
		
		unset( $db );
		
	}
	else{
		alerts('شناسه کاربر نامشخص!');
		//redirect
	}
	
	$alerts = alerts();
	echo $alerts;
	include '../includes/views/editUser.php';