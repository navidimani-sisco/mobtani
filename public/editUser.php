<?php

include '__php__.php';

$db = new DB();
if( ! Authorization :: check('UserEdit') ){		
	Alert::alerts('شما مجوز ویرایش حساب را ندارید!');
	redirect('dashboard.php');
}
	
if( isset( $_GET['id'] ) ) {
	
	// validate id
	$pageID = $_GET['id'];
	if( isset( $_POST['submit'] ) ){ // اطلاعات جدید
		// ویرایش کن
		//validate POST[]
		$parameters = $_POST;
		unset( $parameters['submit'] );
		
		$parameters['id'] = $pageID;
		
		$table = User::update( $parameters );			
	}
	// اطلاعات کاربر را از دیتابیس دریافت کن
	$table = User::find("id = {$pageID}");
	$row = $table[0];		
}
else{
	Alert::alerts('شناسه کاربر نامشخص!');
	//redirect
}

unset( $db );

$alerts = Alert::alerts();
view('editUser', null, $row , $alerts);