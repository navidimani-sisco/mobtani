<?php
	include '../includes/settings.php';
	include '../includes/functions.php';
	if( isset( $_POST['submit'] ) ){ // اگر از فرم آمده
		$db = new DB();
		
		$parameters = $_POST;
		unset( $parameters['submit'] );
		$table = User::add( $parameters );
		
		unset( $db );
	}
	$alerts = alerts();
	// در هر صورت فرم را نمایش بده
	include '../includes/views/addUser.php';