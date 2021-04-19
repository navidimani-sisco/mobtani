<?php
	include '__php__.php';	
	
	if( isset( $_GET['id'] ) ) {
		$db = new DB();
		$table = Product::find("id = {$_GET['id']}");	
		unset( $db );
		$row = $table[0];
		$alerts = alerts();
		
		view('productDetails', null, ['row' => $row], $alerts);
	}
	else{
		alerts('شناسه کاربر نامشخص!');
		redirect('catalog.php');
	}