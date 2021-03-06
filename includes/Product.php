<?php
	if(! class_exists('Product')) {
		class Product
		{
			static function columnsList( $vars, $sep = ', ' ){
				// رشته‌ای شامل اسامی ستون‌های جدول را بر میگرداند
				$columns = array_keys( $vars );
				return join($sep , $columns);
			}
			static function valuesList( $vars, $sep = "', '" ){
				// رشته‌ای شامل مقادیر رکورد را بر میگرداند
				$values = array_values( $vars );
				return "'" . join($sep , $values) . "'";
			}
			static function add( $params ){
				$columnsString = self::columnsList( $params );
				$valuesString = self::valuesList( $params );
				$tableName = __CLASS__; // self::class
				
				// 2. create insert query
				$sql = "INSERT INTO {$tableName}({$columnsString}) 
						VALUES({$valuesString})";
				$result = $GLOBALS['db'] -> execute( $sql );
				// C. success message
				//اگر با موفقیت درج شد
				if( $result )
					alerts('محصول با موفقیت ثبت شد!', 'success');

			}
			static function update(){}
			static function delete(){}
			static function find(){}
		}
	}
?>