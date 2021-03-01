<?php
if(! class_exists('DB')) {
	class DB{
		var $dbc; // class property
		function __construct(){
			// تابع سازنده با ایجاد شیء از کلاس، فراخوانی می‌شود
			$this -> connect();
			$this -> selectDB();
			$this -> dbc -> set_charset( CHARSET );
		}
		
		function connect(){
			// 1. connect to DB - mysql - mysqli - PDO
			$this -> dbc = new mysqli(DBHOST, DBUSER, DBPASS); // mysqli_connect
			if( $this -> dbc -> connect_error ){
				$error = "
						خطا در اتصال به دیتابیس!
						<section lang = 'en'>{$this -> dbc -> connect_error}</section>";
				die( $error );
			}
		}
		function selectDB(){
			$this -> dbc -> select_db(DBNAME);
			if( $this -> dbc -> error ){
				$error = "
						خطا در انتخاب دیتابیس!
						<section lang = 'en'>{$this -> dbc -> error}</section>";
				die( $error );
			}
		}

		function execute( $sql ){
			// 3. execute query
			$result = $this -> dbc -> query( $sql ); // mysqli_query
			if( $this -> dbc -> error ){
				$error = "
						خطا در اجرای کوئری!
						<section lang = 'en'>{$sql}<br>
						{$this -> dbc -> error}</section>";
				die( $error );
			}
			else
				return true;
		}
		
		function __destruct(){
			// با از بین رفتن شیء، تابع مخرب فراخوانی می‌شود
			// 4. close connection
			$this -> dbc -> close(); //mysqli_close
		}
	}
}
