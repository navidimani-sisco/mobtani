<?php
include '__php__.php';
	
$parameters = $_POST;
if( isset( $_POST['submit'] ) ){ // اگر از فرم آمده
	if( Validation :: tokenCheck( $_POST['csrf_token'] ) ) {
		
		$db = new DB();
		
		$where = "email = '{$_POST['email']}'";
		$table = User::find( $where );
		if( ! isset($table[0]) ) {// username تکراری نباشد
		
			// کاربر را ثبت نام کن
			unset( $parameters['submit'] );
			unset( $parameters['csrf_token'] );
			$parameters['passwordHash'] = password_hash($parameters['password'], PASSWORD_DEFAULT);
			unset( $parameters['password'] );
			// افزودن کاربر و دریافت شناسه آن
			$uid = User::add( $parameters );
			
			// کاربر را لاگین هم کن
			Authentication :: login( $uid );
			
			Alert::alerts("{$parameters['firstname']} {$parameters['lastname']} خوش آمدی!", 'success');
						
			// ریدایرکت به پنل کاربری
			$redirectAddress = 'dashboard.php';
			if( isset( $_SESSION['redirect'] ) ) {
				$redirectAddress = $_SESSION['redirect'];
				unset( $_SESSION['redirect'] );
			}
			redirect( $redirectAddress );
				
		else{ // اگر ایمیل تکراری باشد
			Alert::alerts('این ایمیل از قبل وجود دارد!');
		}
	}
	else{
		Alert::alerts('دسترسی غیر مجاز!');
		redirect('dashboard.php');
	}
	unset( $db );
	
}

$alerts = Alert::alerts();
// در هر صورت فرم را نمایش بده
//include '../includes/views/addUser.php';
view('addUser', null, $parameters, $alerts);