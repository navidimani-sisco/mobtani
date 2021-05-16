<?php
if(! class_exists('Authorization')) {
	class Authorization{
		static public function check( $permission ){ // ProductAdd
			if( ! Authentication :: check() )
				return false;
			$uid = Authentication :: uid();
			$table = Role :: join("User.id = {$uid}");
			$row = $table[0];
			return boolval( $row[$permission] ); // تبدیل به نوع بولین
		}
	}
}