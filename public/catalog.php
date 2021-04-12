<?php
	include '../includes/settings.php';
	include '../includes/functions.php';
	
	$db = new DB();
	$table = Product::find();
	unset( $db );
	
	$alerts = alerts();
	
	include '../includes/views/catalog.php';