<?php
	if(! class_exists('AddProduct')) {
		class AddProduct extends Form {
			public function __construct( $parameters = array() ){
				$allowedInputs = ['name', 'price', 'productPicture', 'weekday', 'timeFrom', 'timeTo', 'description'];
				foreach( $allowedInputs as $function ){
					if( isset( $parameters[$function] ) ){
						$value = $parameters[$function];
						$this -> $function( $value );
						// $this -> name( $parameters['name'] );
					}
					else
						$this -> $function();
						
				}
				
				/*				
				$this -> name();
				$this -> price();
				$this -> weekday();
				$this -> description();
				$this -> timeFrom();
				$this -> timeTo();
				*/
			}
			public function name( $value = '' ){
				$this -> textbox("نام دوره", "name", $value, null, null, 'required' );			
			}
			public function price( $value = 0 ){
				$error = null;
				if( ! Validation :: price( $value ) ){
					$error = 'مقدار قیمت نامعتبر است!';
					$this -> valid = false;
				}
				$this -> number("قیمت", "price", $value, 'عدد مثبت با ضرایبی از 1000', $error, 'required | min = "0" | step = "1000"');	
			}
			public function weekday( $value = 'monday' ){
				$values = [
					'saturday'	=> 'شنبه',
					'sunday'	=> 'یکشنبه',
					'monday'	=> 'دوشنبه',
					'tuesday'	=> 'سه شنبه',
					'wednesday'	=> 'چهارشنبه',
					'thursday'	=> 'پنجشنبه',
					'friday'	=> 'جمعه'
				];
				$this -> select("روز هفته", "weekday", $value, null, null, $values);				
			}
			public function description( $value = '' ){
				$this -> bigText("توضیحات", "description", $value, null, 'required');		
			}
			public function productPicture(){
				$this -> image("تصویر محصول", "productPicture");
			}
			public function timeFrom( $value = '00:00' ){
				$this -> time("زمان کلاس از", "timeFrom", $value);
			}
			public function timeTo( $value = '00:00'){
				$this -> time("زمان کلاس تا", "timeTo", $value);
			}			
		}
	}