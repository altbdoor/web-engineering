<?php
	require_once 'meekrodb.php';
	//require_once 'session.php';
	
	//=============================================
	
	// connect to database
	function dbConnect ()
	{
		DB::$user = 'root';				// username
		DB::$password = '';				// password
		DB::$dbName = 'toto_result';	// database name
	}
	
	//=============================================
	
	// dictionary for vendors
	function getVendors ()
	{
		$x = array(
			'Magnum' => '01', 
			'Da Ma Cai' => '02', 
			'Sports Toto' => '03'
		);
		
		return $x;
	}
	
	//=============================================
	
	// dictionary for prizes
	function getPrize ()
	{
		$x = array(
			'First' => '01',
			'Second' => '02',
			'Third' => '03',
			'Special' => '10',
			'Consolation' => '11'
		);
		
		return $x;
	}
	
	//=============================================
	
	// authentication for admin login
	function authentication($username, $password)
	{
		dbConnect();
		
		// salt key
		$salt = "WebE";
		$password = hash("md5", $password . $salt);
		
		// initialised to result not found
		$found = false;
		
		$results = DB::query("SELECT userid FROM user WHERE userid = %s AND password = %s", $username, $password);
		
		if (!empty($results)) {
			$found = true;
			// session will be created by the page.
			//createSession();
		}
		
		return $found;
	}
	
	//=============================================
	
	
	// to get today's result
	function getTodayResult($vendor)
	{
		dbConnect();
		
		// set to Malaysia timezone
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date('Y-m-d');
		
		// date format might have issue
		// might need to seperate to different views for each vendor, depends on the design
		// missed the comparison operator, to allow it to get the latest result, and the order
		$results = DB::query("SELECT resultnumber, prize, FROM result WHERE resultdate <= %s AND vendor = %d ORDER BY resultdate DESC LIMIT 23", $date, $vendor);
		
		return $results;
	}
	
	//=============================================
	
	// to search for result
	function searchResult($date, $vendor)
	{
		dbConnect();
		
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
	
	//=============================================
	
	// to add new result
	function addResult()
	{
		dbConnect();
		
		//might need some modifications on date
		$date = $_POST['resultdate'];
		$number = $_POST['resultnumber'];
		$prize = $_POST['prize'];
		$vendor= $_POST['vendor'];
		
		DB::insert("result", array("resultdate"=>$date, "resultnumber"=>$number,"prize"=>$prize, "vendor"=>$vendor));
		
		return $x;
		
	}
	
	//=============================================
	
?>