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
	
	$today = DateTime::createFromFormat('d/m/Y', '25/03/2014');
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
					<h3 class="pull-left"><i class="icon-time"></i> <?php echo $today->format('d M Y'); ?></h3>
					
					<?php getSearchForm(); ?>
				</div>
			</div>
			
			<div class="row">
				<?php
					if (isset($_POST['searchDate']) && isset($_POST['searchVendor'])) {
						$vendorsList = getVendors();
						$prizeList = getPrize();
						
						$date = $_POST['searchDate'];
						$vendor = $_POST['searchVendor'];
						$vendorName = array_search($vendor, $vendorsList);
						
						if (preg_match("/\d{2}\/\d{2}\/\d{4}/", $date) && (in_array($vendor, array_values($vendorsList)))) {
							$date = DateTime::createFromFormat('d/m/Y', $date);
							$data = searchResult($date->format('Y-m-d'), $vendor);
							
							if (empty($data)) {
								getError('Seems like our database does not have that entry');
							}
							else {
								$prizeList = array();
								
								foreach ($data as $datum) {
									if (!array_key_exists($datum['prize'], $prizeList)) {
										$prizeList[$datum['prize']] = array();
									}
									
									array_push($prizeList[$datum['prize']], $datum['resultnumber']);
								}
								
								echo '
									<div class="span3">
										<div class="well text-center">
											<img src="img/vendor_'.(str_replace(' ', '', strtolower($vendorName))).'.jpg" width="100" height="100" class="img-polaroid img-circle">
											<h3>'.$vendorName.'</h3>
										</div>
									</div>
									
									<div class="span9">
										<h3>Results on '.$date->format('d M Y').'</h3>
										
										<table class="table table-striped table-bordered table-hover">
											<tr class="info" style="font-weight:700">
												<td style="width:50%">First Prize</td>
												<td>'.$prizeList['01'][0].'</td>
											</tr>
											<tr>
												<td style="width:50%">Second Prize</td>
												<td>'.$prizeList['02'][0].'</td>
											</tr>
											<tr>
												<td style="width:50%">Third Prize</td>
												<td>'.$prizeList['03'][0].'</td>
											</tr>
										</table>
										
										<table class="table table-striped table-bordered table-hover">
											<tr>
												<th style="width:50%">Special</th>
												<th>Consolation</th>
											</tr>
											<tr>
												<td>
													<ul style="list-style:none">
								';
								
								foreach ($prizeList['10'] as $datum) {
									echo '<li class="pull-left text-center" style="width:50%">'.$datum.'</li>';
								}
								
								echo '
													</ul>
												</td>
												<td>
													<ul style="list-style:none">
								';
								
								foreach ($prizeList['11'] as $datum) {
									echo '<li class="pull-left text-center" style="width:50%">'.$datum.'</li>';
								}
								
								echo '
													</ul>
												</td>
											</tr>
										</table>
									</div>
								';
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
			</div>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
