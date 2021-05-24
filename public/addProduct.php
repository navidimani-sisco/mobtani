<?php
include '__php__.php';

$parameters = $_POST;
if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن
	if( Validation :: tokenCheck( $_POST['csrf_token'] ) ) {
		
		// A. validation
		$imgSrc = assets('images/image.jpg');
		unset( $parameters['submit'] ); // این پارامتر درج نشود
		unset( $parameters['csrf_token'] );
		$parameters['imgSrc'] = $imgSrc; // تصویر محصول به پارامترها اضافه شود

		$form = new AddProduct( $parameters );
		if( $form -> valid ){
			// B. Insert in DB
			$db = new DB();
			Product::add( $parameters );
			unset( $db );
		}
		//else 
			// نمایش فرم با خطاها
			
			
	}
	else{
		Alert::alerts('دسترسی غیر مجاز!');
		redirect('dashboard.php');
	}
}
else
	$form = new AddProduct();

$alerts = Alert::alerts();
// در هر صورت فرم را نمایش بده
//include '../includes/views/addUser.php';
view('addProduct', null, ['form' => $form], $alerts);