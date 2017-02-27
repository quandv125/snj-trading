
<?php 
	if (isset($users->Aro['id']) && !empty($users->Aro['id'])) {
		$aros_id = $users->Aro['id'];
		$aros_username = $users->username;
	} else {
		$aros_id = null;
		$aros_username = null;
	}
	
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
	        <div class="panel-body">
				<div class="table-responsive">
				    <table class="table">
				        <thead>
				            <tr>
								<th class="">Controller/Action</th>
								<th class="first-letter"><?php echo $users->username ?></th>
							</tr>
				        </thead>
				        <tbody>
					        <?php foreach ($acos as $key => $parent): ?>
								<?php $checked_parent = $this->MyHtml->_GetCbxParent($parent, $aros_id); ?>
								<tr style="background-color: #3cc8de;">
									<td class="parent-acos" id="<?php echo $parent->id ?>" > <b><?php echo $parent->alias; ?></b></td>
									<td>
										<input type="checkbox" <?php echo $checked_parent ?> aro_id="<?php echo $aros_id ?>" aco_id="<?php echo $parent->id ?>" class="ChboxPA">
									</td>
								</tr>
								<?php foreach ($parent['children'] as $key => $children): ?>
									<?php $checked_children = $this->MyHtml->_GetCbxChildren($children, $aros_id, $checked_parent); ?>
										<tr class="hidden1 children-acos children-acos-<?php echo $parent->id ?>">
											<td>
												<span class="children-alias"><?php echo $children->alias; ?></span>
											</td>
											<td>
												<input type="checkbox" <?php echo $checked_children ?> aro_id="<?php echo $aros_id ?>" aco_id="<?php echo $children->id; ?>" class="ChboxPA">
												<?php echo ($checked_children == 'unchecked')? '<i class="fa fa-info-circle" title="-1"></i>' : ""; ?>
											</td>
										</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
				        </tbody>
				    </table>
				</div>
			</div>
		</div>
	</div>
</div>