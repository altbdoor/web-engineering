<html>
<head>
</head>
<body>
<?php

	require_once 'meekrodb.php';
	DB::$user = 'root';
	DB::$password = '';
	DB::$dbName = 'toto_result';
	
	echo "So it's working, haha, welcome!";
	echo "\n";
	
	// after user clicked submit on the login form, it should redirect to this script.
	// authenticate user with id and pass.
	function authentication()
	{
	
		//$user = $_POST['username'];
		$user = "carbon";
		
		$found = 0;
		$user_f = "";
		
		$results = DB::query("SELECT userid FROM user");
		
		/*
		foreach ($results as $row) {
		  echo "Name: " . $row['userid'] . "\n";
		  echo "-------------\n";
		}
		*/
		
		foreach ($results as $row) 
		{
			if ( $user == $row['userid'])
			{
				$found = 1;
				break;
			}	
		}
		
		if ($found == 1)
		{
			echo "Welcome, ";
			echo $user;
			echo " Sama!";
		}
		
	}
	
	
	
?>

</body>
</html>