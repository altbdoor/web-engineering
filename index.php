<?php
	require_once 'php/template.php';
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
					<h3 class="pull-left"><i class="icon-time"></i> <?php getNewDate(); ?></h3>
					
					<?php getSearchForm(); ?>
				</div>
			</div>
			
			<div id="result" class="row">
				<?php
					// should format output properly
				?>
				<div class="span4">
					<div class="well">
						<h3><img src="img/vendor_magnum.jpg" width="50" height="50" class="img-polaroid img-circle hidden-tablet"> Magnum</h3>
						
						<div class="btn-group btn-group-vertical">
							<button class="btn btn-primary">1st Prize: 2301</button>
							<button class="btn">2nd Prize: 8247</button>
							<button class="btn">3rd Prize: 9766</button>
						</div>
						
						
					</div>
				</div>
				
				<div class="span4">
					<div class="well">
						<h3><img src="img/vendor_sportstoto.jpg" width="50" height="50" class="img-polaroid img-circle hidden-tablet"> Sports Toto</h3>
						
						<div class="btn-group btn-group-vertical">
							<button class="btn btn-primary">1st Prize: 2301</button>
							<button class="btn">2nd Prize: 8247</button>
							<button class="btn">3rd Prize: 9766</button>
						</div>
						
					</div>
				</div>
				
				<div class="span4">
					<div class="well">
						<h3><img src="img/vendor_damacai.jpg" width="50" height="50" class="img-polaroid img-circle hidden-tablet"> Da Ma Cai</h3>
						
						<div class="btn-group btn-group-vertical">
							<button class="btn btn-primary">1st Prize: 2301</button>
							<button class="btn">2nd Prize: 8247</button>
							<button class="btn">3rd Prize: 9766</button>
						</div>
						
						
					</div>
				</div>
			</div>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
