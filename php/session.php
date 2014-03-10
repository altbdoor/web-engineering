<?php

	//=============================================
	
	// to generate session ID
	function generateSessionID()
	{
		$session = hash('md5', getenv('REMOTE_ADDR').session_id());
		//return $sessionID;
		// mistyped
		return $session;
	}
	//=============================================
	
	// to create session
	// require username input
	function createSession()
	{
		// generate session ID
		// session should be started manually to prevent complications
		//session_start();
		$sessionID = generateSessionID();
		$_SESSION['login'] = $sessionID;
	}
	
	//=============================================
	
	// to retrieve session
	// require sessionID input
	// the input is not used...?
	function retrieveSession($sessionID)
	{
		if (isset($_SESSION['login']) && $_SESSION['login'] == generateSessionID())
		{
			$_SESSION['login'] = generateSessionID();
		}
	}
	
	// check session
	function checkSession () {
		if (isset($_SESSION['login']) && $_SESSION['login'] == generateSessionID()) {
			return true;
		}
		else {
			return false;
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