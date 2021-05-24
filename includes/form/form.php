<?php
if(! class_exists('Form')) {
	class Form {
		public $valid = true;
		var $inputArray = [];
		private function template( $input, $helper = null, $error = null ){			
			$result = <<< EOT
			
				<section class="mb-3">
					{$input}
EOT;
			if( isset($helper) )
				$result .= <<< EOT
					<section class = "text-muted">{$helper}</section>
					
EOT;
				$result .= <<< EOT
					<section class = "text-danger">{$error}</section>
										
				</section>
EOT;
			$this -> inputArray[] = $result;
		}
		private function text( $type = 'text', $label, $name, $value, $helper, $error = null, $options = '' ){
			if( ! isset($name) )
				$name = $type;
			if( ! isset($label) )
				$label = $name;
			$optionsArray = explode( '|', $options );
			$options = implode(' ', $optionsArray);
			$result = <<< EOT
					<label for = "{$name}" class = "form-label">{$label}</label><br>
					<input type = "{$type}" name = "{$name}" id = "{$name}" value = "{$value}" class = "form-control" {$options}>
					
EOT;
			$this -> template( $result, $helper, $error );
		}
		public function bigText($label = null, $name, $value = '', $helper = null, $options = '' ){
			if( ! isset($name) )
				$name = $type;
			if( ! isset($label) )
				$label = $name;
			$result = <<< EOT
					<label for = "{$name}" class = "form-label">{$label}</label><br>
					<textarea name = "{$name}" id = "{$name}" class = "form-control" {$options}>{$value}</textarea>
EOT;
			$this -> template( $result, $helper );
		}
		public function select($label = null, $name, $value = '', $helper = null, $options = '', $values = array() ){
			
			if( ! isset($label) )
				$label = $name;
			
			$result = <<< EOT
					<label for = "{$name}" class = "form-label">{$label}</label><br>
					<select name = "{$name}" id = "{$name}" class = "form-control">
					{$value}
EOT;
					foreach($values as $valuesKey => $valuesValue){
						$selected = '';
						if( $value === $valuesKey )
							$selected = 'selected';
						$result .= <<< EOT
						<option value = {$valuesKey} {$selected}>{$valuesValue}</option>
EOT;
					}
			$result .= '
					</select>
			';
			$this -> template( $result, $helper );
		}
		public function password( $label = null, $name = null, $value = '', $helper = null, $options = '' ){
			$error = null;
			$type = 'password';
			if( ! isset($name) )
				$name = $type;
			if( ! isset($label) )
				$label = $name;
			$optionsArray = explode( '|', $options );
			$options = implode(' ', $optionsArray);
			$result = <<< EOT
					<label for = "{$name}" class = "form-label">{$label}</label><br>
					<section class = "input-group">
						<input type = "{$type}" name = "{$name}" id = "{$name}" value = "{$value}" class = "form-control" {$options}>
						<button type = "button" class = "input-group-text far fa-eye" id = "toggleButton"></button>
					</section>
					
EOT;
			$this -> template( $result, $helper, $error );
		}
		
		public function textbox( $label = null, $name = null, $value = '', $helper = null, $options = '' ){
			$error = null;
			$this -> text('text', $label, $name, $value, $helper , $error, $options);
		}
		public function number( $label = null, $name = null, $value = 0, $helper = null, $error = null, $options = '' ){
			if( ! Validation :: number( $value ) )
				$error = 'مقدار باید یک عدد صحیح باشد!';
			$this -> text('number', $label, $name, $value, $helper , $error, $options);
		}
		public function email( $label = null, $name = null, $value = '', $helper = null, $options = '' ){
			$options = 'pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title = "ایمیل به فرمت مناسب نیست"';
			$error = null;
			$this -> text('email', $label, $name, $value, $helper , $error, $options);
		}
		public function switch( $label = null, $name = null, $value = 'true', $helper = null, $options = '' ){
			$this -> text('checkbox', $label, $name, $value, $helper, $options);
		}
		
		public function time( $label = null, $name = null, $value = '00:00', $helper = null, $options = '' ){
			$this -> text('time', $label, $name, $value, $helper, $options);
		}
		
		public function image( $label = null, $name = null, $value = '', $helper = null, $options = '' ){
			$this -> text('file', $label, $name, $value, $helper, $options);
		} // accept = 'image/jpeg, image/gif, ...' | 'image/*'
		
		
		private static function csrf(){
			$token = Validation :: tokenGenerator();
			$_SESSION['csrf_token'] = $token;
			$result = <<< EOT
				<input type = 'hidden' name = 'csrf_token' value = '{$token}'><br>
EOT;
			return $result;
		}
		public function __toString(){
			$result = <<< EOT
				
				<form action = "" method = "post"  enctype = "multipart/form-data">
EOT;
				$result .= self :: csrf();
				foreach($this -> inputArray as $inputString)
					$result .= $inputString;
			$result .= <<< EOT
					<input type = "submit" name = "submit" value = "ثبت نام" class= "btn btn-primary">
				</form>
EOT;
			return $result;
		}
	}
}

include 'register.php';
include 'addProduct.php';