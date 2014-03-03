<html>
<head>
</head>
<body>
<?php

	require_once 'meekrodb.php';
	DB::$user = 'root';
	DB::$password = '';
	DB::$dbName = 'toto_result';
	
	// after user clicked submit on the login form, it should redirect to this script.
	// authenticate user with userid and password.
	function authentication()
	{
		
		$username = $_POST['user'];
		$password = $_POST['pass'];
		
		$found = 0;
		$user_f = "";
		
		$results = DB::query("SELECT userid, password FROM user");
		
		foreach ($results as $row) 
		{
			if ( $username == $row['userid'] && $password == $row['password'])
			{
				$found = 1;
				$user_f = $username;
				break;
			}	
		}
		
		if ($found == 1)
		{
			echo "Welcome, " + $user_f + " Sama!";
		}
		
	}
	
	authentication();
?>

</body>
</html>