<form id="modalEdit" class="modal hide fade" method="post">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h3>Add/Edit Entry</h3>
	</div>
	
	<div id="modalEditBody" class="modal-body">
		<input type="hidden" id="modalEditMode" name="modalEditMode">
		<table class="table">
			<tr>
				<td style="border:0">Date</td>
				<td style="border:0">
					<input id="modalEditDate" name="modalEditDate" type="text">
				</td>
			</tr>
			<tr>
				<td>Vendor</td>
				<td>
					<select id="modalEditVendor" name="modalEditVendor">
						<?php
							$vendorsList = getVendors();
							
							foreach ($vendorsList as $key => $value) {
								echo '<option value="'.$value.'">'.$key.'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>First Prize</td>
				<td>
					<input type="text" id="modalEditFirstNumber" name="modalEditFirstNumber">
					<input type="hidden" id="modalEditFirstId" name="modalEditFirstId">
				</td>
			</tr>
			<tr>
				<td>Second Prize</td>
				<td>
					<input type="text" id="modalEditSecondNumber" name="modalEditSecondNumber">
					<input type="hidden" id="modalEditSecondId" name="modalEditSecondId">
				</td>
			</tr>
			<tr>
				<td>Third Prize</td>
				<td>
					<input type="text" id="modalEditThirdNumber" name="modalEditThirdNumber">
					<input type="hidden" id="modalEditThirdId" name="modalEditThirdId">
				</td>
			</tr>
			<tr>
				<td>Special Prize</td>
				<td>
					<ul class="clearfix" style="list-style:none;margin:0;padding:0">
						<?php
							for ($i=0; $i<10; $i++) {
								$x = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
								
								echo '
									<li class="pull-left input-prepend" style="margin-right:10px">
										<span class="add-on">'.$x.'</span>
										<input type="text" id="modalEditSpecialNumber'.$x.'" name="modalEditSpecialNumber'.$x.'" class="span1">
										<input type="hidden" name="modalEditSpecialId'.$x.'" id="modalEditSpecialId'.$x.'">
									</li>
								';
							}
						?>
					</ul>
				</td>
			</tr>
			<tr>
				<td>Consolation Prize</td>
				<td>
					<ul class="clearfix" style="list-style:none;margin:0;padding:0">
						<?php
							for ($i=0; $i<10; $i++) {
								$x = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
								
								echo '
									<li class="pull-left input-prepend" style="margin-right:10px">
										<span class="add-on">'.$x.'</span>
										<input type="text" id="modalEditConsolationNumber'.$x.'" name="modalEditConsolationNumber'.$x.'" class="span1">
										<input type="hidden" name="modalEditConsolationId'.$x.'" id="modalEditConsolationId'.$x.'">
									</li>
								';
							}
						?>
					</ul>
				</td>
			</tr>
		</table>
	</div>
	
	<div class="modal-footer">
		<button type="submit" class="btn btn-success" name="save">Save</button>
		<button type="button" class="btn" data-dismiss="modal">Cancel</button>
	</div>
</form>

<div class="row" style="margin-top:1em">
	<div class="span12">
		<?php
			if (isset($_GET['success'])) {
				echo '
					<div class="alert alert-success">
						<button data-dismiss="alert" class="close" type="button">&times;</button>
						<b>Done!</b> The entry was successfully saved.
					</div>
				';
			}
		?>
		
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th><h3 style="margin:0">Date</h3></th>
				<th style="vertical-align:middle"><h3 style="margin:0">Vendor</h3></th>
				<th style="vertical-align:middle">
					<button id="btnNew" class="btn btn-inverse" data-toggle="modal" data-target="#modalEdit" data-today="<?php echo $today->format('d/m/Y'); ?>">New</button>
				</th>
			</tr>
		
			<?php
				$data = listResult();
				$vendorsList = getVendors();
				
				for ($i=0; $i<count($data); $i+=23) {
					$date = DateTime::createFromFormat('d M Y', $data[$i]['_resultdate']);
					$vendor = $data[$i]['vendor'];
					$prizeList = array();
					
					for ($j=$i; $j<$i+23; $j++) {
						if (!array_key_exists($data[$j]['prize'], $prizeList)) {
							$prizeList[$data[$j]['prize']] = array();
						}
						
						array_push($prizeList[$data[$j]['prize']], $data[$j]['resultid'].'_'.$data[$j]['resultnumber']);
					}
					
					echo '
						<tr>
							<td>'.$date->format('d M Y').'</td>
							<td>'.array_search($vendor, $vendorsList).'</td>
							<td>
								<button class="btn btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit" data-date="'.$date->format('d/m/Y').'" data-vendor="'.$vendor.'" data-01="'.$prizeList['01'][0].'" data-02="'.$prizeList['02'][0].'" data-03="'.$prizeList['03'][0].'" data-10="'.implode(',', $prizeList['10']).'" data-11="'.implode(',', $prizeList['11']).'">Edit</button>
							</td>
						</tr>
					';
				}
			?>
		
		</table>
	</div>
</div>