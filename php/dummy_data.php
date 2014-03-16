<?php
	require_once 'meekrodb.php';
	
	DB::$user = 'root';				// username
	DB::$password = '';				// password
	DB::$dbName = 'toto_result';	// database name
	
	
	$date = "2014-03-1";
	
	for ($vendor = 1; $vendor < 4; $vendor++)
	{
	
		$num1 = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
		echo $num1;
		DB::insert("result", array("resultdate"=>$date, "resultnumber"=>$num1,"prize"=>"01", "vendor"=>str_pad($vendor, 2, '0', STR_PAD_LEFT)));
		
		$num2 = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
		echo $num2;
		DB::insert("result", array("resultdate"=>$date, "resultnumber"=>$num2,"prize"=>"02", "vendor"=>str_pad($vendor, 2, '0', STR_PAD_LEFT)));
		
		$num3 = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
		echo $num3;
		DB::insert("result", array("resultdate"=>$date, "resultnumber"=>$num3,"prize"=>"03", "vendor"=>str_pad($vendor, 2, '0', STR_PAD_LEFT)));
		
		for ($special = 0;  $special < 10; $special++)
		{
			$num4 = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
			echo $num4;
			DB::insert("result", array("resultdate"=>$date, "resultnumber"=>$num4,"prize"=>"10", "vendor"=>str_pad($vendor, 2, '0', STR_PAD_LEFT)));
		}
		
		for ($consolation = 0;  $consolation < 10; $consolation++)
		{
			$num5 = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
			echo $num5;
			DB::insert("result", array("resultdate"=>$date, "resultnumber"=>$num5,"prize"=>"11", "vendor"=>str_pad($vendor, 2, '0', STR_PAD_LEFT)));
		}
	
	}
?>