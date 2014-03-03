<html>
<head>
</head>
<body>
<?php

	require_once 'meekrodb.php';
	DB::$user = 'root';
	DB::$password = '';
	DB::$dbName = 'toto_result';
	
	
	// Post form input from form and insert into database
	function addResult()
	{
		
		//might need some modifications on date
		$date = $_POST['resultdate'];
		$number = $_POST['resultnumber'];
		$prize = $_POST['prize'];
		$vendor= $_POST['vendor'];
		
		DB::insert("result", array('resultdate'=>$date, "resultnumber"=>$number,"prize"=>$prize, "vendor"=>$vendor));
		
	}
?>

</body>
</html>