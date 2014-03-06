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
		
		$username = $_POST['signinUser'];
		$password = $_POST['signinPass'];

		$salt = "WebE";
		
		$found = 0;
		
		$results = DB::query("SELECT userid, password FROM user");
		
		foreach ($results as $row) 
		{
			$resolved_pass = hash("md5", $password . $salt);
			
			if ( $username == $row['userid'] && $resolved_pass == $row['password'])
			{
				$found = 1;
				break;
			}	
		}
		
		if ($found == 1)
		{
			echo "Welcome ", $username, " Sama";
		}
		
	}
	
	authentication();
?>

</body>
</html>