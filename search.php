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
	
	$date = strtotime('16 March 2014');
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
					<h3 class="pull-left"><i class="icon-time"></i> <?php echo date('d M Y', $date); ?></h3>
					
					<?php getSearchForm(); ?>
				</div>
			</div>
			
			<div class="row">
				<?php
					if (isset($_POST['searchDate']) && isset($_POST['searchVendor'])) {
						$date = $_POST['searchDate'];
						$vendor = $_POST['searchVendor'];
						
						$vendorsList = getVendors();
						$prizeList = getPrize();
						
						if (preg_match("/\d{2}\/\d{2}\/\d{4}/", $date) && (in_array($vendor, array_keys($vendorsList)))) {
							$result = searchResult(implode('-', array_reverse(explode('/', $date))), $vendorsList[$vendor]);
							
							if (empty($result)) {
								getError('Seems like our database does not have that entry');
							}
							else {
								echo '
									<div class="span3">
										<div class="well text-center">
											<img src="img/vendor_'.(str_replace(' ', '', strtolower($vendor))).'.jpg" width="100" height="100" class="img-polaroid img-circle">
											<h3>'.$vendor.'</h3>
										</div>
									</div>
									
									<div class="span9">
										<h3>Results on '.$date.'</h3>
										
										<table class="table table-striped table-bordered table-hover">
								';
								
								for ($i=0; $i<3; $i++) {
									$x = $result[$i];
									
									echo '
										<tr class="'.($i == 0 ? 'info' : '').'">
											<td style="font-weight:700;width:50%">'.array_search($x['prize'], $prizeList).' Prize</td>
											<td>'.$x['resultnumber'].'</td>
										</tr>
									';
								}
								
								echo '
										</table>
										
										<table class="table table-striped table-bordered table-hover">
											
										</table>
									</div>
								';
								
								/*str_replace("\t", ' ', $name);
									 Array ( [0] => Array ( [resultnumber] => 1234 [prize] => 01 ) [1] => Array ( [resultnumber] => 0851 [prize] => 02 ) [2] => Array ( [resultnumber] => 5801 [prize] => 03 ) [3] => Array ( [resultnumber] => 6890 [prize] => 10 ) [4] => Array ( [resultnumber] => 3493 [prize] => 11 ) )
								*/
								//print_r($result);
							}
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
