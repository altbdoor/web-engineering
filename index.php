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
					<h3 class="pull-left"><i class="icon-time"></i> 24 Jan 2013</h3>
					
					<form class="pull-right">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-calendar"></i></span>
							<input id="searchDate" name="searchDate" class="span2" type="text" placeholder="Date">
						</div>
						
						<div class="input-prepend">
							<span class="add-on"><i class="icon-flag-checkered"></i></span>
							<select id="searchVendor" name="searchVendor">
								<option disabled selected>Vendor Name
								<option>Magnum
								<option>Sports Toto
							</select>
						</div>
						
						<button type="submit" class="btn btn-success">Search <i class="icon-search"></i></button>
					</form>
				</div>
			</div>
			
			<div id="result" class="row">
				<div class="span4">
					<div class="well">
						<h3>Magnum</h3>
						
						<div class="btn-group btn-group-vertical">
							<button class="btn btn-primary">1st Prize: 2301</button>
							<button class="btn">2nd Prize: 8247</button>
							<button class="btn">3rd Prize: 9766</button>
						</div>
						
						
					</div>
				</div>
				
				<div class="span4">
					<div class="well">
						<h3>Sports Toto</h3>
						
						<div class="btn-group btn-group-vertical">
							<button class="btn btn-primary">1st Prize: 2301</button>
							<button class="btn">2nd Prize: 8247</button>
							<button class="btn">3rd Prize: 9766</button>
						</div>
						
					</div>
				</div>
				
				<div class="span4">
					<div class="well">
						<h3>Magnum</h3>
						
						<div class="btn-group btn-group-vertical">
							<button class="btn btn-primary">1st Prize: 2301</button>
							<button class="btn">2nd Prize: 8247</button>
							<button class="btn">3rd Prize: 9766</button>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
