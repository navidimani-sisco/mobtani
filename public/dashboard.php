<?php
	include '__php__.php';
	
	if(! Authentication :: check() ){
		Alert::alerts('ابتدا وارد شوید');
		$_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
		redirect('login.php');
	}
		
	$alerts = Alert::alerts();
	// در هر صورت فرم را نمایش بده
	view('dashboard', null, null, $alerts);