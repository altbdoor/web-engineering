<?php
	require_once 'php/template.php';
	require_once 'php/database.php';
	
	function getError ($msg) {
		echo '
			<div class="span12">
				<div class="hero-unit text-center">
					<h1 style="margin-bottom:0.5em"><i class="icon-warning-sign"></i> Woops!</h1>
					<p>'.$msg.'.</p>
					<p>Please try again.</p>
				</div>
			</div>
		';
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
		<?php 
			getSearchModal();
		?>
		
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href=".">GRS</a>
					
					<div class="navbar-form pull-right">
						<a href="index.php" class="btn">Back to Home <i class="icon-home"></i></a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div id="search" class="row">
				<div class="span12 clearfix">
					<h3 class="pull-left"><i class="icon-time"></i> <?php getNewDate(); ?></h3>
					
					<?php getSearchForm(); ?>
				</div>
			</div>
			
			<div class="row">
				<?php
					if (isset($_POST['searchDate']) && isset($_POST['searchVendor'])) {
						$date = $_POST['searchDate'];
						$vendor = $_POST['searchVendor'];
						
						if (preg_match("/\d{2}\/\d{2}\/\d{4}/", $date) && (in_array($vendor, getVendors()))) {
							// reformat date to yyyy-mm-dd
							$date = implode('-', array_reverse(explode('/', $date)));
							
							/*
								based on $date and $vendor, please make a query and return the
								rightful values (supposedly in array). i will design them when
								the output is ready.
								
								please wrap the process in a function in /php/database.php, and
								call it out here.
								
								thank you.
							*/
							
							//getError('Seems like our database does not have that entry');
						}
						else {
							getError('Seems like there was something wrong with the input');
						}
					}
					else {
						getError('Seems like you have forgotten to type in your search fields');
					}
				?>
				
				<!--<div class="span3">
					<div class="well text-center">
						<img src="img/vendor_sportstoto.jpg" width="100" height="100" class="img-polaroid img-circle">
						<h3>Sports Toto</h3>
					</div>
				</div>
				
				<div class="span9">
					<h3>Results on 23/04/1992</h3>
				</div>-->
			</div>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
