<?php
	require_once 'database.php';
	
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
	
	function getNav () {
		echo '
			<div class="navbar navbar-inverse navbar-static-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="brand" href=".">GRS</a>
					</div>
				</div>
			</div>
		';
	}
	
	function getSearchForm () {
		echo '
			<form id="searchForm" class="pull-right" method="post" action="search.php">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-calendar"></i></span>
					<input id="searchDate" name="searchDate" class="span2" type="text" placeholder="Date">
				</div>
				
				<div class="input-prepend">
					<span class="add-on"><i class="icon-flag-checkered"></i></span>
					<select id="searchVendor" name="searchVendor">
						<option selected value="">Vendor Name
		';
		
		$vendors = array_keys(getVendors());
		sort($vendors);
		
		foreach ($vendors as $x) {
			echo '<option value="'.$x.'">'.$x;
		}
		
		echo '
					</select>
				</div>
				
				<button type="submit" class="btn btn-success">Search <i class="icon-search"></i></button>
			</form>
		';
	}
	
	function getSearchModal () {
		echo '
			<div id="searchError" class="modal fade hide">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
					<h3>Error in Search Form</h3>
				</div>
				
				<div class="modal-body">
					<p>The following errors were found while submitting the form:</p>
					
					<ul id="searchErrorList"></ul>
					
					<p>Please fix them before proceeding.</p>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Okay, got it!</button>
				</div>
			</div>
		';
	}
	
	function getFooter () {
		echo '
			<div class="row">
				<div class="span12 text-center">
					<hr>
					<small class="muted">
						2014 Licensed under <a href="LICENSE.txt">MIT</a>. Team Potato for UECS3333 Web Engineering.<br>
						All trademarks and copyrights displayed are owned by their respective parties.
					</small>
				</div>
			</div>
		';
	}
?>