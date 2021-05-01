<?php
if(! class_exists('Alert')) {
	class Alert
	{
		static private function alertTemplate( $text , $type = 'error' ){
			switch( $type ){
				case 'success': break;
				case 'warning': break;
				case 'error':	$type = 'danger';
			}
			$alert = "
					<article class = 'alert alert-{$type} alert-dismissible fade show' role='alert'>
						{$text}
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					</article>";
			return $alert;	
		}
		
		static public function alerts( $text = '' , $type = 'error'){
			$alerts = '';
			if(  $text !== '' ){ // اگر پیام جدید داریم
				$_SESSION['alert'][] =  self::alertTemplate($text, $type);
			}
			elseif( isset($_SESSION['alert']) ){
				$result = join("\n", $_SESSION['alert']);
				unset($_SESSION['alert']);
				return $result;
			}
			else
				return false;		
		}
	}
}