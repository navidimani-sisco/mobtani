<?php
$title = 'افزودن محصول';
$form = new Form();
$form -> textbox("نام دوره", "name");
$form -> number("قیمت", "price", null, 'عدد مثبت با ضرایبی از 1000');
$form -> bigText("توضیحات", "description");
$form -> image("تصویر محصول", "productPicture");
$values = [
	'saturday'	=> 'شنبه',
	'sunday'	=> 'یکشنبه',
	'monday'	=> 'دوشنبه',
	'tuesday'	=> 'سه شنبه',
	'wednesday'	=> 'چهارشنبه',
	'thursday'	=> 'پنجشنبه',
	'friday'	=> 'جمعه'
];
$form -> select("روز هفته", "weekday", 'monday', null, null, $values);
$form -> time("زمان کلاس از", "timeFrom");
$form -> time("زمان کلاس تا", "timeTo");
$main = '
			echo $form;
';

include 'templates/panel/master.php';