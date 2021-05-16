<?php
include '__php__.php';

$parameters = $_POST;
if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن
		if( Validation :: tokenCheck( $_POST['csrf_token'] ) )
		{
			// A. validation
			$imgSrc = 'assets/images/image.jpg';
			unset( $parameters['submit'] ); // این پارامتر درج نشود
			unset( $parameters['csrf_token'] );
			$_POST['imgSrc'] = $imgSrc; // تصویر محصول به پارامترها اضافه شود

			// B. Insert in DB
			$db = new DB();
			Product::add( $_POST );
			unset( $db );
		}
		else{
			Alert::alerts('دسترسی غیر مجاز!');
			redirect('dashboard.php');
		}
}
	$alerts = Alert::alerts();
	// در هر صورت فرم را نمایش بده
	//include '../includes/views/addUser.php';
	view('addProduct', null, $parameters, $alerts);