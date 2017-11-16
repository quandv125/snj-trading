
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
	        <div class="panel-body">
		        <!--  -->
				<?php echo $this->Html->tag('button', '<i class="fa fa-cog"></i> Reset', array('class' => 'btn btn-success btn-addon m-b-sm waves-effect waves-button waves-red',"data-toggle"=>"modal", "data-target" => "#myModal"));?>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				                <h4 class="modal-title" id="myModalLabel">Reset</h4>
				            </div>
				            <div class="modal-body row">
				            	<?php echo $this->Form->create(NULL,array('url'=>array('controller'=>'users','action'=>'resetaroaco')),array('inputDefaults' => array( 'label' => false,'div' => false ))); ?>
				           		<div class="col-md-12">
				               		<?php echo $this->Form->input(__('aros'), array('type'=>'select','label'=>'Group','options'=>$aros)); ?>
								</div>
								<div class="col-lg-12">
									<?php echo $this->Form->input(__('acos'), array('type'=>'select','empty' => '-- All --','options'=>$acos_list)); ?>
								</div>
								
				            </div>
				            <div class="modal-footer">
				                <?php echo $this->Form->button('Reset',array('class' => 'btn btn-success')) ?>
				                <div class="hidden"><?php echo $this->Form->end(); ?></div>
				            </div>
				        </div>
				    </div>
				</div>
				<div class="table-responsive">
					<table class="table table-limit-width">
						<thead>
							<tr>
								<th class="">Controller/Action</th>
								<?php foreach ($aros as $key => $aro): ?>
									<th class="first-letter"><?php echo $aro ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($acos as $key => $parent): ?>
							<tr style="background-color: #3cc8de;">
								<td class="parent" id="<?php echo $parent['id'] ?>"> 
									<b><?php echo $parent['alias']; ?></b>
								</td>
								<?php foreach ($aros as $aro_id => $aro): ?>
								<td>
									<?php $CbxParent = $this->MyHtml->_GetCbxParent($parent, $aro_id); ?>
									<input type="checkbox" aro_id="<?php echo $aro_id ?>" aco_id="<?php echo $parent['id'] ?>" <?php echo $CbxParent; ?> class="ChboxPA">
								</td>
								<?php endforeach ?>
							</tr>
							<?php foreach ($parent['children'] as $key => $children): ?>
								<tr class="hidden1 children-<?php echo $parent['id'] ?>">
									<td> <span style="margin-left: 30px;" class="children-alias"><?php echo $children['alias']; ?></span> </td>
									<?php foreach ($aros as $aro_id => $aro): ?>
									<td> 
										<?php $CbxParent   = $this->MyHtml->_GetCbxParent($parent, $aro_id); ?>
										<?php $CbxChildren = $this->MyHtml->_GetCbxChildren($children, $aro_id, $CbxParent); ?>
										<input type="checkbox" aro_id="<?php echo $aro_id ?>" aco_id="<?php echo $children['id']; ?>" <?php echo $CbxChildren; ?> class="ChboxPA"> 
										<?php echo ($CbxChildren == 'unchecked')? '<i class="fa fa-info-circle" title="-1"></i>' : ""; ?>
									</td>
									<?php endforeach; ?>
								</tr>
							<?php endforeach ?>
						<?php endforeach ?>
						</tbody>
					</table>
 				</div>
	        </div>
	    </div>
    </div>
</div>