<html>
<head>
</head>
<body>
<?php

	require_once 'meekrodb.php';
	DB::$user = 'root';
	DB::$password = '';
	DB::$dbName = 'toto_result';
	
	
	
	// search result with the provided date and vendor
	function getTodayResult()
	{
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date('Y-m-d');
		echo $date;
		
		// date format might have issue
		// might need to seperate to different views for each vendor, depends on the design
		$results = DB::query("SELECT resultnumberji, prize, vendor FROM result WHERE resultdate = %s", $date);
		
		foreach ($results as $row)
		{
		  echo "Number: " . $row['resultnumber'] . "\n";
		  echo "Prize: " . $row['prize'] . "\n";
		  echo "Prize: " . $row['vendor'] . "\n";
		  echo "-------------\n";
		}
		*/
	}
	
	getTodayResult();
?>

</body>
</html>