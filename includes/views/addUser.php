<?php
$title = 'ثبت نام';
$form = new Form();
$form -> textbox('نام', 'firstname');
$form -> textbox('نام خانوادگی', 'lastname');
$form -> email('ایمیل');
$form -> password('کلمه عبور', null, null, 'حداقل 8 کاراکتر<br> حروف و اعداد و کاراکترهای ویژه');
$form -> textbox('استان', 'state');
$form -> textbox('شهز', 'city');
//$form -> add('textbox', "نام", "firstname");
$main = '
			echo $form;
';

include 'templates/master.php';