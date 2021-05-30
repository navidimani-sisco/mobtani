<?php
include '__php__.php';	

if( isset( $_GET['id'] ) ) {
	$db = new DB();
	$table = Product::find("id = {$_GET['id']}");	
	unset( $db );
	$row = $table[0];
	// افزودن مشخصات دیگر جداول نظیر امتیاز و لایک و ...
	$row['rate'] = 4;
	
	$alerts = Alert :: alerts();
	view('productDetails', null, $row, $alerts);
}
else{
	alerts('شناسه کاربر نامشخص!');
	redirect('catalog.php');
}