<?php
	require_once 'php/template.php';
	require_once 'php/session.php';
	require_once 'php/database.php';
	
	session_start();
	$user = false;
	
	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$user = authentication($_POST['user'], $_POST['pass']);
		
		if ($user) {
			createSession();
		}
		
		header('location:admin.php');
	}
	else if (isset($_POST['logout'])) {
		destroySession();
		header('location:admin.php');
	}
	
	if (checkSession()) {
		$user = true;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			getMeta('Gambling Result System');
			getCss();
		?>
	</head>
	
	<body>
		<?php getNav(); ?>
		
		<div class="container">
			<?php
				$file = '';
				
				if ($user) {
					$file = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
				}
				else {
					$file = 'login';
				}
				
				readfile('php/admin/'.$file.'.php');
			?>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
