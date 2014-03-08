<?php

	//=============================================
	
	// to generate session ID
	function generateSessionID()
	{
		$session = hash('md5', getenv('REMOTE_ADDR').session_id());
		return $sessionID;
	}
	//=============================================
	
	// to create session
	// require username input
	function createSession()
	{
		// generate session ID
		session_start();
		$sessionID = generateSessionID();
		$_SESSION['login'] = $sessionID;
	}
	
	//=============================================
	
	// to retrieve session
	// require sessionID input
	function retrieveSession($sessionID)
	{
		if (isset($_SESSION['login']) && $_SESSION['login'] == generateSessionID())
		{
			$_SESSION['login'] = generateSessionID();
		}
	}

	//=============================================
	
	// to destroy session
	function destroySession()
	{
		session_destroy();
		session_regenerate_id(true);
	}
	
	//=============================================
?>