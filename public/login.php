<?php
	include '__php__.php';
	if( Authentication :: check() ){		
		Alert::alerts('قبلا وارد شدید!', 'warning');
		redirect('dashboard.php');
	}
	
	$parameters = $_POST;
	if( isset( $_POST['submit'] ) ){ // اگر از فرم آمده
		$db = new DB();
		
		$where = "email = '{$parameters['email']}'";
		$table = User::find( $where );
		if( isset($table[0]) ){ // username esists
			$row = $table[0];
			
			if( password_verify($parameters['password'], $row['passwordHash']) ){ //password ok
				Authentication :: login( $row['id'] );
				
				Alert::alerts("{$row['firstname']} {$row['lastname']} خوش آمدی!", 'success');
				if( isset($_SESSION['redirect']) ){
					$redirectAddress = $_SESSION['redirect'];
					unset( $_SESSION['redirect'] );
					redirect( $redirectAddress );
				}
				else
					redirect('dashboard.php');
			}
			else{
				Alert::alerts('کلمه عبور اشتباه است!');				
			}
		}
		else{
			Alert::alerts('نام کاربری اشتباه است!');
		}
		unset( $db );
	}
	
	$alerts = Alert::alerts();
	// در هر صورت فرم را نمایش بده
	view('login', null, $parameters, $alerts);