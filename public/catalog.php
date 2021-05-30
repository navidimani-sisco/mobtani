<?php
	include '__php__.php';
	
	$db = new DB();
	$table = Product::find();
	
	foreach( $table as $key => $row){
		// اگر کاربر لاگین است و موز لایک دارد، لایک او را اضافه کن
		$userid = Authentication :: uid();
		$likeTable = LikeProduct :: find( "Userid = {$userid} AND Productid = {$row['id']}" );
		if( isset($likeTable[0]) )
			$table[$key]['like'] = true;
			//$row['like'] = true; // کار نمیکنه: درک بهتر با مبحث ارجاع/اشاره گرها
		
		// اگر کاربر لاگین است و موز لایک دارد، بوک مارک او را اضافه کن
	}
	
	unset( $db );
	
	$alerts = Alert::alerts();
	
	view('catalog', null, ['table' => $table], $alerts);
	//include 'views/catalog.php';