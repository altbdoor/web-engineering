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
		<?php getNav(); ?>
		
		<div class="container">
			<div class="row" style="margin-top:1em">
				<div class="span6 offset3 text-center">
					<form id="signinForm" class="well well-large" method="post" action=".">
						<input class="input-block-level" type="text" id="signinUser" name="signinUser" placeholder="Username" maxlength="32" autofocus>
						<input class="input-block-level" type="password" id="signinPass" name="signinPass" placeholder="Password" maxlength="32">
						<button class="btn btn-primary btn-large btn-block" type="submit" name="signin">Sign In</button>
					</form>
				</div>
			</div>
			
			<?php getFooter(); ?>
		</div>
		
		<?php getJs(); ?>
	</body>
</html>
