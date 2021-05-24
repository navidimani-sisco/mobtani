<?php
include 'alert.php';
include 'DB/DB.php';
include 'security/Authentication.php';
include 'security/Authorization.php';
include 'security/Validation.php';
include 'form/Form.php';
/*
$postfixes = ['header', 'sidebar', 'footer'];
foreach($postfixes as $postfix){
	$functionName = "get_{$postfix}";
	$functionNameString = $functionName;
	echo $functionName;
	//if( ! function_exists($functionName) ){
		$functionName = function( $name = null, $args = array() ){ 
			//get_template_part($postfix, $name, $args);
			//var_dump( $postfix );
			return true;
		};
		
		if( function_exists( $functionNameString ) )
			echo yes;
	//}
}
*/
if( ! function_exists('get_header') ){
	function get_header($name = null, $path = '', $args = array()){ // 'home'
		get_template_part($path . 'header', $name, $args);
	}	
}
if( ! function_exists('get_sidebar') ){
	function get_sidebar($name = null, $path = '', $args = array()){ // 'home'
		get_template_part($path . 'sidebar', $name, $args);
	}	
}
if( ! function_exists('get_footer') ){
	function get_footer($name = null, $path = '', $args = array()){ // 'home'
		get_template_part($path . 'footer', $name, $args);
	}	
}

if( ! function_exists('get_template_part') ){
	function get_template_part($slug, $name = null, $args = array()){ // 'home'
		if( isset( $name ) )
			$name = "-{$name}"; // '-home'
		$__pathToTemplate = "views/templates/{$slug}{$name}.php";
		
		if( ! isset($args) )
			$args = array();
		$args = safeScript($args);
		//extract($args);
		foreach($args as $key => $value)
			$$key = $value;
		
		include $__pathToTemplate;
	}	
}
function safeScript($arg){  // against script injection
	//var_dump($arg);
	if( is_array($arg) )
		foreach($arg as $key => $value)
			$arg['key'] = safeScript($value);
	else
		$arg = htmlspecialchars($arg);
	//var_dump($arg);
	return $arg;
}
if( ! function_exists('view') ){
	function view($slug, $name = null, $args = array(), $alerts = null){ // 'home'
		if( isset( $name ) )
			$name = "-{$name}"; // '-home'
		$__pathToTemplate = "views/{$slug}{$name}.php";
		
		//$args = safeScript($args);
		//extract($args);
		if( isset($args) ) // اگر نال نیست
			foreach($args as $key => $value){
				$$key = $value;
			}
		
		include $__pathToTemplate;
	}	
}

if( ! function_exists('redirect') ){
	function redirect( $address ){
		header("Location: {$address}"); // دستور به مرورگر براي ريدایرکت به آدرس
		exit();
	}
}
function mySessionStater(){
		//if(session_status() !== PHP_SESSION_ACTIVE){
			$lifetime = 365 * 24 * 60 * 60 ; // 365 days
			session_set_cookie_params ( $lifetime, $path = '/', $domain = $_SERVER['HTTP_HOST'] , $secure = false , $httponly = true );
			session_start();
		//}
}