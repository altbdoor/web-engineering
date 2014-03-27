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
	
	if ($user && isset($_POST['save'])) {
		$date = DateTime::createFromFormat('d/m/Y', $_POST['modalEditDate']);
		$vendor = $_POST['modalEditVendor'];
		
		if ($_POST['modalEditMode'] == 'old') {
			editResult($_POST['modalEditFirstId'], $date, $_POST['modalEditFirstNumber'], '01', $vendor);
			editResult($_POST['modalEditSecondId'], $date, $_POST['modalEditSecondNumber'], '02', $vendor);
			editResult($_POST['modalEditThirdId'], $date, $_POST['modalEditThirdNumber'], '03', $vendor);
			
			for ($i=0; $i<10; $i++) {
				$x = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
				
				editResult($_POST['modalEditSpecialId'.$x], $date, $_POST['modalEditSpecialNumber'.$x], '10', $vendor);
				editResult($_POST['modalEditConsolationId'.$x], $date, $_POST['modalEditConsolationNumber'.$x], '11', $vendor);
			}
		}
		else {
			addResult($date, $_POST['modalEditFirstNumber'], '01', $vendor);
			addResult($date, $_POST['modalEditSecondNumber'], '02', $vendor);
			addResult($date, $_POST['modalEditThirdNumber'], '03', $vendor);
			
			for ($i=0; $i<10; $i++) {
				$x = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
				
				addResult($date, $_POST['modalEditSpecialNumber'.$x], '10', $vendor);
				addResult($date, $_POST['modalEditConsolationNumber'.$x], '11', $vendor);
			}
		}
		
		header('location:admin.php?success');
	}
	
	$today = DateTime::createFromFormat('d/m/Y', '25/03/2014');
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			getMeta('Gambling Result System');
			getCss();
		?>
		
		<style>
			.datepicker.dropdown-menu {z-index:1200}
		</style>
	</head>
	
	<body>
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href=".">GRS</a>
					<?php
						if ($user) {
							echo '
								<form class="navbar-form pull-right" method="post" action="./admin.php">
									<button class="btn btn-danger" type="submit" name="logout">Sign Out</button>
								</form>
							';
						}
					?>			
				</div>
			</div>				
		</div>
		
		<div class="container">
			<?php
				require_once 'php/admin/'.($user ? 'dashboard' : 'login').'.php';
			?>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
