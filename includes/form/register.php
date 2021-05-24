<?php
	if(! class_exists('Register')) {
		class Register extends Form {
			public function __construct(){				
				$this -> textbox('نام', 'firstname');
				$this -> textbox('نام خانوادگی', 'lastname');
				$this -> email('ایمیل', 'email', null, null, 'required');
				$this -> password('کلمه عبور', null, null, 'حداقل 8 کاراکتر<br> حروف و اعداد و کاراکترهای ویژه' , 'required');
				$this -> textbox('استان', 'state');
				$this -> textbox('شهز', 'city');
				//$this -> add('textbox', "نام", "firstname");
			}
		}
	}
?>