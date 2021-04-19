<?php
include 'DB/DB.php';
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
	function get_header($name = null, $args = array()){ // 'home'
		get_template_part('header', $name, $args);
	}	
}
if( ! function_exists('get_sidebar') ){
	function get_sidebar($name = null, $args = array()){ // 'home'
		get_template_part('sidebar', $name, $args);
	}	
}
if( ! function_exists('get_footer') ){
	function get_footer($name = null, $args = array()){ // 'home'
		get_template_part('footer', $name, $args);
	}	
}

if( ! function_exists('get_template_part') ){
	function get_template_part($slug, $name = null, $args = array()){ // 'home'
		if( isset( $name ) )
			$name = "-{$name}"; // '-home'
		$__pathToTemplate = "views/templates/{$slug}{$name}.php";
		
		$args = safeScript($args);
		//extract($args);
		foreach($args as $key => $value)
			$$key = $value;
		
		include $__pathToTemplate;
	}	
}
function safeScript($arg){  // against script injection
	if( is_array($arg) )
		foreach($arg as $key => $value)
			$arg['key'] = safeScript($value);
	else
		$arg = htmlspecialchars($arg);
	
	return $arg;
}
if( ! function_exists('view') ){
	function view($slug, $name = null, $args = array(), $alerts = null){ // 'home'
		if( isset( $name ) )
			$name = "-{$name}"; // '-home'
		$__pathToTemplate = "views/{$slug}{$name}.php";
		
		$args = safeScript($args);
		//extract($args);
		foreach($args as $key => $value)
			$$key = $value;
		
		include $__pathToTemplate;
	}	
}

if( ! function_exists('alertTemplate') ){
	function alertTemplate( $text , $type = 'error' ){
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
}
if( ! function_exists('alerts') ){
	function alerts( $text = '' , $type = 'error'){
		static $alerts = ''; // متغیر استاتیک فقط دفعه اول مقدار اولیه میگیرد
		if(  $text !== '' ){ // اگر پیام جدید داریم
			$alerts .=  alertTemplate($text, $type);
		}
		elseif( $alerts !== '' ){
			$result = $alerts;
			$alerts = '';
			return $result;
		}
		else
			return false;		
	}
}

if( ! function_exists('redirect') ){
	function redirect( $address ){
		header("Location: {$address}"); // دستور به مرورگر براي ريدایرکت به آدرس
		exit();
	}
}