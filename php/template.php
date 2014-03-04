<?php
	function getMeta ($title) {
		echo '
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>'.$title.'</title>
		';
	}
	
	function getCss () {
		$css = array(
			'css/bootstrap.min.css',
			'css/datepicker.min.css',
			'css/font-awesome.min.css',
			'css/style.css'
		);
		
		foreach ($css as $x) {
			echo '<link rel="stylesheet" href="'.$x.'">';
		}
	}
	
	function getJs () {
		$js = array(
			'js/jquery.min.js',
			'js/bootstrap.min.js',
			'js/bootstrap-datepicker.min.js',
			'js/script.js'
		);
		
		foreach ($js as $x) {
			echo '<script src="'.$x.'"></script>';
		}
	}
?>