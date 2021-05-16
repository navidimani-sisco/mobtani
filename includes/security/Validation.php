<?php
if(! class_exists('Validation')) {
	class Validation{
		public static function tokenGenerator( $length = 20 ){
			return bin2hex( random_bytes( $length ) );
		}		
		public static function tokenCheck( $token, $name = 'csrf_token' ){
			if( isset($_SESSION[$name]) )
				return $_SESSION[$name] === $token;
			return false;
		}
	}
}