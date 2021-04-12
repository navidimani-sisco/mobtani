<?php
	include 'Table.php';
	include 'Product.php';
	include 'User.php';
	// include ...
if(! class_exists('DB')) {
	class DB{
		private $dbc; // class property
		public function __construct( $selectDB = true ){
			// تابع سازنده با ایجاد شیء از کلاس، فراخوانی می‌شود
			$this -> connect();
			if( $selectDB )
				$this -> selectDB();
			$this -> dbc -> set_charset( CHARSET );
		}
		
		private function connect(){
			// 1. connect to DB - mysql - mysqli - PDO
			$this -> dbc = new mysqli(DBHOST, DBUSER, DBPASS); // mysqli_connect
			if( $this -> dbc -> connect_error ){
				$error = "
						خطا در اتصال به دیتابیس!
						<section lang = 'en'>{$this -> dbc -> connect_error}</section>";
				die( $error );
			}
		}
		private function selectDB(){
			$this -> dbc -> select_db(DBNAME);
			if( $this -> dbc -> error ){
				$error = "
						خطا در انتخاب دیتابیس!
						<section lang = 'en'>{$this -> dbc -> error}</section>";
				die( $error );
			}
		}

		public function execute( $sql, $params = false )
		{
			// 3. execute query
			$result = $this -> dbc -> query( $sql ); // mysqli_query
			
			if( $this -> dbc -> error){
				$error = "
						خطا در اجرای کوئری!
						<section lang = 'en'>{$sql}<br>
						{$this -> dbc -> error}</section>";
				//echo 'hel0';
				die( $error );
				return false;
			}
			else{
				if( $result !== TRUE && $result !== FALSE){ // select
					$table = $result -> fetch_all( MYSQLI_ASSOC );
					//echo 'hel1';
					return $table;
				}				
				else{
					if( isset($this -> dbc -> insert_id) ){ // insert
						//echo 'hel2';
						return $this -> dbc -> insert_id;
					}
					else{ // update, delete
						//echo 'hel3';
						return $result; // true|false
					}
				}
			}			
		}
		
		public function __destruct(){
			// با از بین رفتن شیء، تابع مخرب فراخوانی می‌شود
			// 4. close connection
			$this -> dbc -> close(); //mysqli_close
		}
	}
}
