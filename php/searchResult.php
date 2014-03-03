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
	function searchResult()
	{
		
		$date = $_POST['resultdate'];
		$vendor= $_POST['vendor'];
		
		// date format might have issue
		$results = DB::query("SELECT resultnumber, prize FROM result WHERE resultdate = %s AND vendor = %d", $date, $vendor);
		
		foreach ($results as $row)
		{
		  echo "Number: " . $row['resultnumber'] . "\n";
		  echo "Prize: " . $row['prize'] . "\n";
		  echo "-------------\n";
		}
		
	}
?>

</body>
</html>