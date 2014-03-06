<?php
	require_once 'meekrodb.php';
	
	=============================================
	
	// connect to database
	function dbConnect ()
	{
		require_once 'meekrodb.php'; // include database framework
		DB::$user = 'root'; // username
		DB::$password = ''; // password
		DB::$dbName = 'toto_result'; // database name
	}
	
	=============================================
	
	// dictionary for vendors
	function getVendors () {
	
		dbConnect();
		
		$x = array(
			'Magnum' => 01, 
			'Da Ma Cai' => 02, 
			'Sports Toto' => 03
		);
		
		sort($x);
		
		return $x;
	}
	
	=============================================
	
	// dictionary for prizes
	function getPrize ()
	{
		dbConnect();
		
		$x = array(
			'First' => 01,
			'Second' => 02,
			'Third' => 03,
			'Special' => 10,
			'Consolation' => 11
		)
		
		return $x;
	}
	
	=============================================
	
	// authentication for admin login
	function authentication()
	{
		dbConnect();
		
		// get data from form posting
		$username = $_POST['signinUser'];
		$password = $_POST['signinPass'];
		
		// salt key
		$salt = "WebE";
		
		// initialised to result not found
		$found = false;
		
		$results = DB::query("SELECT userid, password FROM user");
		
		foreach ($results as $row) 
		{
			// resolve salt hashing
			$resolved_pass = hash("md5", $password . $salt);
			
			if ( $username == $row['userid'] && $resolved_pass == $row['password'])
			{
				$found = true;
				break;
			}	
		}
		
		if ($found == 1)
		{
			echo "Welcome ", $username, " Sama";
		}
		
		return $found;
	}
	
	=============================================
	
	
	// to get today's result
	function getTodayResult()
	{
		dbConnect();
		
		// set to Malaysia timezone
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date('Y-m-d');
		echo $date;
		
		// date format might have issue
		// might need to seperate to different views for each vendor, depends on the design
		$results = DB::query("SELECT resultnumber, prize, vendor FROM result WHERE resultdate = %s", $date);
		
		/*
		foreach ($results as $row)
		{
		  echo "Number: " . $row['resultnumber'] . "\n";
		  echo "Prize: " . $row['prize'] . "\n";
		  echo "Prize: " . $row['vendor'] . "\n";
		  echo "-------------\n";
		}
		*/
		
		return $results;
	}
	
	=============================================
	
	// to search for result
	function searchResult()
	{
		dbConnect();
		
		$date = $_POST['resultdate'];
		$vendor= $_POST['vendor'];
		
		// date format might have issue
		$results = DB::query("SELECT resultnumber, prize FROM result WHERE resultdate = %s AND vendor = %d", $date, $vendor);
		
		/*
		foreach ($results as $row)
		{
		  echo "Number: " . $row['resultnumber'] . "\n";
		  echo "Prize: " . $row['prize'] . "\n";
		  echo "-------------\n";
		}
		*/
		
		return $results;
	}
	
	=============================================
	
	// to add new result
	function addResult()
	{
		dbConnect();
		
		//might need some modifications on date
		$date = $_POST['resultdate'];
		$number = $_POST['resultnumber'];
		$prize = $_POST['prize'];
		$vendor= $_POST['vendor'];
		
		$x = DB::insert("result", array('resultdate'=>$date, "resultnumber"=>$number,"prize"=>$prize, "vendor"=>$vendor));
		
		return $x;
		
	}
	
	=============================================
?>