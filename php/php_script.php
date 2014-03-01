<html>
<head>
</head>
<body>
<?php

	require_once 'meekrodb.php';
	DB::$user = 'root';
	DB::$password = '';
	DB::$dbName = 'toto_result';
	
	echo "halo";
	echo "\n";
	
	function retrieveResult()
	{
		
		$results = DB::query("SELECT userid, password FROM user");
		foreach ($results as $row) 
		{
			echo "ID: " . $row['userid'];
			echo "\n";
			echo "Password: " . $row['password'];
			echo "\n";
			echo "-------------\n";
		}
		
	}
	
	retrieveResult();
	
?>

</body>
</html>