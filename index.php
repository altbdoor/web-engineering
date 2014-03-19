<?php
	require_once 'php/template.php';
	require_once 'php/meekrodb.php';
	
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
				</div>
			</div>
		</div>
		
		<div class="container">
			<div id="attention" class="row">
				<div class="span12">
					<div id="attentionText">
						<h1>Special Draw Today!</h1>
						<a class="pull-right btn btn-large btn-inverse"><i class="icon-dollar"></i> BUY NOW</a>
						<h3 style="margin-left:2em">Have you bought your numbers?</h3>
					</div>
				</div>
			</div>
			
			<div id="search" class="row">
				<div class="span12 clearfix">
					<h3 class="pull-left"><i class="icon-time"></i> <?php echo date('d M Y', $date); ?></h3>
					
					<?php getSearchForm(); ?>
				</div>
			</div>
			
			<div id="result" class="row">
				<?php
					$vendorsList = getVendors();
					
					foreach ($vendorsList as $key => $value) {
						$data = getTodayResult($value);
						$prizeList = array();
						
						foreach ($data as $datum) {
							if (!array_key_exists($datum['prize'], $prizeList)) {
								$prizeList[$datum['prize']] = array();
							}
							
							array_push($prizeList[$datum['prize']], $datum['resultnumber']);
						}
						
						echo '
							<div class="span4">
								<div class="well">
									<h3><img src="img/vendor_'.strtolower(str_replace(' ', '', $key)).'.jpg" width="50" height="50" class="img-polaroid img-circle hidden-tablet"> '.$key.'</h3>
									
									<div class="btn-group btn-group-vertical">
										<button class="btn btn-primary">1st Prize: '.$prizeList['01'][0].'</button>
										<button class="btn">2nd Prize: '.$prizeList['02'][0].'</button>
										<button class="btn">3rd Prize: '.$prizeList['03'][0].'</button>
									</div>
									<br>
									<div class="clearfix text-center">
										<div class="pull-left" style="width:50%">
											<b>Special</b>
											<ul class="list">
						';
						
						foreach ($prizeList['10'] as $datum) {
							echo '<li>'.$datum.'</li>';
						}
						
						echo '
											</ul>
										</div>
										
										<div class="pull-left" style="width:50%">
											<b>Consolation</b>
											<ul class="list">
						';
						
						foreach ($prizeList['11'] as $datum) {
							echo '<li>'.$datum.'</li>';
						}
						
						echo '
										</div>
									</div>
								</div>
							</div>
						';
					}
				?>
			</div>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
