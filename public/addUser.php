<?php
	include '__php__.php';
	
	if( Authentication :: check() ){		
		Alert::alerts('قبلا وارد شدید!', 'warning');
		redirect('dashboard.php');
	}
	
	$parameters = $_POST;
	if( isset( $_POST['submit'] ) ){ // اگر از فرم آمده
		$db = new DB();
		
		$where = "email = '{$_POST['email']}'";
		$table = User::find( $where );
		if( ! isset($table[0]) ) {// username تکراری نباشد
			// کاربر را ثبت نام کن
			unset( $parameters['submit'] );
			$parameters['passwordHash'] = password_hash($parameters['password'], PASSWORD_DEFAULT);
			unset( $parameters['password'] );
			$uid = User::add( $parameters );
			
			// کاربر را لاگین هم کن
			Authentication :: login( $uid );
			
			Alert::alerts("{$parameters['firstname']} {$parameters['lastname']} خوش آمدی!", 'success');
			
			if( isset($_SESSION['redirect']) ){
				$redirectAddress = $_SESSION['redirect'];
				unset( $_SESSION['redirect'] );
				redirect( $redirectAddress );
			}
			else
				redirect('dashboard.php');
			}
		else{ // اگر ایمیل تکراری باشد
			Alert::alerts('این ایمیل از قبل وجود دارد!');
		}
		unset( $db );
		
	}
	
	$alerts = Alert::alerts();
	// در هر صورت فرم را نمایش بده
	//include '../includes/views/addUser.php';
	view('addUser', null, $parameters, $alerts);