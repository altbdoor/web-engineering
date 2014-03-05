<?php
	require_once 'meekrodb.php';
	
	function getVendors () {
		$x = array(
			'Magnum', 'Da Ma Cai', 'Sports Toto'
		);
		
		sort($x);
		
		return $x;
	}
?>