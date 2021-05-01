<?php
if(! class_exists('Authentication')) {
	class Authentication{
		static public function login( $uid ){
			//$_SESSION['authenticated'] = true;
			$_SESSION['uid'] = $uid;
			
			$_SESSION['lastLogin'] = time();
		}
		
		static public function check(){
			return isset( $_SESSION['uid'] );
		}
		
		static public function logout(){
			// session_unset()
			// session_destroy()
			unset( $_SESSION['uid'] );
		}
		
		static public function uid(){
			if( self :: check() )
				return $_SESSION['uid'];
			else
				return false;
		}
		
		static public function autoLogout(){
			if( self :: check() ){
				if( time() - $_SESSION['lastLogin'] > LOGIN_DEADLINE * 24 * 60 * 60 ){ // 30 days
					Alert::alerts('با ورود مجدد به ما کمک کتید امنیت شما را تامین کنیم!', 'warning');
					self :: logout();
				}
					
				if( time() - $_SESSION['lastActivity'] > ACTIVITY_DEADLINE * 60){ // 10 min
					self :: logout();
					Alert::alerts('مدتی غیرفعال بودید، لطفا مجددا وارد شوید!', 'warning');
				}	
				$_SESSION['lastActivity'] = time();
			}
		}
	}
}