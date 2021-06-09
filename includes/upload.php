<?php
if(! class_exists('Upload')) {
	class Upload {
		
		public function __construct( $fileInformationArray ){
			$this -> $fileInformationArray = $fileInformationArray;
		}
		public function validator( $maxSize = 2048 ){
			if( $this -> fileInformationArray['error'] === 0 ){ // خطا در ارسال نداشته باشد
			
			// بررسی کن تصویر باشد
			if( ! Validation :: image($this -> fileInformationArray['tmp_name'] ) ){
				$this -> error = "خطا - فایل حتما تصویر باشد!";
				return false;
			}
			else if( ! Validation :: fileSizeMax( $this -> fileInformationArray['size'], $maxSize ){
				$this -> error = 'حجم تصویر کوچکتر از ' . ($maxSize / 1024) . ' کیلوبایت باشد!';
				return false;
			}
			return true;
		}
		public function permanent(){
			// اسم کامل فایل را بساز
			$extension = pathinfo( $this -> fileInformationArray['name'] , PATHINFO_EXTENSION ); // پسوند فایل
			$fileName = time() . '.' . $extension;
			
			// مسیر ذخیره کردن فایل
			$uid = Authentication ::  uid();
			$destinationPath = UPLOAD_PATH . $uid . '/';
			if( ! is_dir($destinationPath) ){ // آیا این فولدر وجود دارد
				//mkdir( $destinationPath, '0777', true );
				mkdir( $destinationPath ); // این فولدر را ایجاد کن
			}
			
			$destinationAddress = $destinationPath . $fileName;
			
			move_uploaded_file( $this -> fileInformationArray['tmp_name'] , $destinationAddress);
			
			return $uid . '/' . $fileName;			
		}
	}
}