<?php
	if(! class_exists('Table')) {
		class Table
		{
			static protected function columnsList( $vars, $sep = ', ' ){
				// رشته‌ای شامل اسامی ستون‌های جدول را بر میگرداند
				$columns = array_keys( $vars );
				return join($sep , $columns);
			}
			static protected function valuesList( $vars, $sep = "', '" ){
				// رشته‌ای شامل مقادیر رکورد را بر میگرداند
				$values = array_values( $vars );
				return "'" . join($sep , $values) . "'";
			}			
			static protected function columnValueList( $vars, $sep = ', ' ){
				// = رشته‌ای شامل زوج اسامی و مقادیر جدول جدا شده با
				foreach($vars as $key => $value){
					$varPairs[] = "{$key} = '{$value}'";
				}
				return join($sep , $varPairs);		
			}
			
			static public function add( $params ){
				$params['status'] = 'default';
				$columnsString = self::columnsList( $params );
				$valuesString = self::valuesList( $params );
				$tableName = static::class; // self::class // __CLASS__
				
				// 2. create insert query
				$sql = "INSERT INTO {$tableName}({$columnsString}) 
						VALUES({$valuesString})";
				$result = $GLOBALS['db'] -> execute( $sql );
				// C. success message
				//اگر با موفقیت درج شد
				if( $result )
					alerts("{$tableName} با موفقیت ثبت شد!", 'success');

			}
			static public function update( $params ){
				$columnValueString = self::columnValueList( $params );
				
				$tableName = static::class; // self::class // __CLASS__
				
				// 2. create insert query
				$sql = "UPDATE {$tableName}
						SET {$columnValueString}
						WHERE id = {$params['id']}";
				$result = $GLOBALS['db'] -> execute( $sql );
				// C. success message
				//اگر با موفقیت درج شد
				if( $result ){
					alerts("{$tableName} با موفقیت ویرایش شد!", 'success');
				}
			}
			static public function delete($id){
				$tableName = static::class; // self::class // __CLASS__ // get_class()
				/*$sql = "DELETE FROM {$tableName}
						WHERE id = {$id}";*/
				$sql = "UPDATE {$tableName}
						SET status = 'deleted'
						WHERE id = {$id}";
				$result = $GLOBALS['db'] -> execute( $sql );
				// C. success message
				//اگر با موفقیت درج شد
				//if( $result ){
					alerts("{$tableName} با موفقیت حذف شد!", 'success');
				//}
			}
			static public function find($where = 'TRUE', $order = 'id DESC', $count = 10000, $offset = 0){
				$tableName = static::class; // self::class // __CLASS__
				$sql = "SELECT * FROM {$tableName}
						WHERE {$where} AND status != 'deleted'
						ORDER BY {$order}
						LIMIT {$offset}, {$count}";
				$table = $GLOBALS['db'] -> execute( $sql );
				return $table;
			}
		}
	}
?>