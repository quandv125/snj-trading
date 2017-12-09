
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading1 clearfix">
				<div class="col-md-12">
				   <!--  <div class="myFile" style="float:left; margin-right: 3px;">
						<?php// echo $this->Form->create(false,array('url'=>array('action'=>'ImportExcel'),'enctype'=>'multipart/form-data'));?>
						<?php// echo $this->Form->file('files',['class' => 'hidden']); ?>
						<span class="btn btn-success btn-addon m-b-sm "><i class="fa fa-download" aria-hidden="true"></i> Import</span>
						<?php //echo $this->Form->end() ?>
					</div> -->
					<!-- <?php// echo $this->Html->link('<i class="fa fa-upload"></i> Export',array('controller'=>'users','action'=>'exportexcel'),array('escape' => false,'class'=>'btn btn-success btn-addon m-b-sm  waves-effect waves-button waves-red')) ?>
					<?php// echo $this->Html->link('<i class="fa fa-file-pdf-o"></i> PDF',array('controller'=>'users','action'=>'createpdf'),array('escape' => false,'class'=>'btn btn-success btn-addon m-b-sm  waves-effect waves-button waves-red')) ?> -->
					<?php echo $this->Html->link('<i class="fa fa-flash"></i> Permission',array('controller'=>'users','action'=>'permission'),array('escape' => false,'class'=>'btn btn-success btn-addon m-b-sm  waves-effect waves-button waves-red')) ?>
					<div style="float:right;">
					<?php echo $this->Html->tag('button', '<i class="fa fa-plus"></i> Add', array('class' => 'btn btn-success m-b-sm btn-addon waves-effect waves-button waves-red',"data-toggle"=>"modal", "data-target" => "#myModal"));?>

							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
											<h4 class="modal-title" id="myModalLabel">Add User</h4>
										</div>
										<div class="modal-body1">
											<div role="tabpanel">
												<ul class="nav nav-tabs nav-justified" role="tablist">
													<li role="presentation" class="active">
														<a href="#tab1" class="bold" role="tab" data-toggle="tab"><?= __("Infomations") ?></a>
													</li>
													<li role="presentation">
														<a href="#tab2" class="bold" role="tab" data-toggle="tab"><?= __("Billing Address"); ?></a>
													</li>
													<li role="presentation">
														<a href="#tab3" class="bold" role="tab" data-toggle="tab"><?= __("Shipping Address"); ?></a>
													</li>
													
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
													<div role="tabpanel" class="tab-pane active fade in" id="tab1">
														<?= $this->Form->create('User',['url'=>['action'=>'add'],'enctype'=>'multipart/form-data']);?>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('username',['class' => 'username']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('password',['class' => 'password']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('fullname',['class' => 'fullname']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('email',['class' => 'email']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('address',['class' => 'address']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('tel',['class' => 'tel']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 fx-group-id">
															<?= $this->Form->input('group_id', [
																	'id' => 'UserGroupId',
																	'append' => [
																 		$this->Html->tag('span', '<i class="fa fa-plus"></i>', array('class' => 'btn btn-success waves-effect waves-button waves-red', 'data-toggle' => 'modal', 'data-target' => '#myModal2'))
																	]
																]);
															?>
														</div>
														 <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('date_of_birth',['class' => 'datetimepicker']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('avatars', ['type' => 'file', 'multiple']); ?>
														</div>
														<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
															<?= $this->Form->input('actived',['type' => 'checkbox']); ?>
														</div>
														<div class="clearfix"></div>
														<?= $this->Form->button(__('Submit'),['class' => 'btn btn-success float-right']) ?>
														<?= $this->Form->end() ?>
													</div>
													<div role="tabpanel" class="tab-pane fade" id="tab2">
														2
													</div>
													<div role="tabpanel" class="tab-pane fade" id="tab3">
														3
													</div>
													
												</div>
											</div>
											
										</div>
										<div class="modal-footer">
												
											
										</div>
									</div>
								</div>
							</div>  <!-- End -->
							<!--  -->
							<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
											<h4 class="modal-title" id="myModalLabel">Create Group</h4>
										</div>
										<div class="modal-body row">
												<div class="col-lg-2">
													<label for="GroupName" class="control-label">Name</label>
												</div>
												<div class="col-lg-10">
													<input class="form-control" maxlength="255" type="text" id="AddGroupName" required="required">
												</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-success btn-add-group float-right">Submit</button>
										</div>
									</div>
								</div>
							</div>  <!-- End -->
							<!--  -->
					</div>
				</div>
			</div>
			  <div class="clearfix"></div>
			<div class="panel-body">			
				<div class="table-responsive">
					<table class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center"><?= __('Username') ?></th>
								<th class="text-center"><?= __('Fullname') ?></th>
								<th class="text-center"><?= __('Group') ?></th>
								<th class="text-center"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($users as $key => $user): ?>
							<tr>
								<td class="text-center"><?= h($key+1) ?></td>
								<td class="text-center"><?= h($user->username) ?></td>
								<td class="text-center"><?= h($user->fullname) ?></td>
								<td class="text-center"><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
								<td class="actions text-center">
									<?= $this->Html->link(__('<span class="glyphicon glyphicon-flash" aria-hidden="true"></span>'),['action'=>'permissiondetails',$user->id],['class' => 'btn btn-success','escape' => false]) ?>
									<span class="btn btn-success" data-toggle="modal" data-target="#myModalEdit<?php echo $key?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
									<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'),
										['action' => 'delete', $user->id],
										['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class' => 'btn btn-success', 'escape' => false]
									)?>
								</td>
							</tr>
								<!-- Modal -->
									<div class="modal fade" id="myModalEdit<?php echo $key?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
														<h4 class="modal-title" id="myModalLabel">Edit User</h4>
													</div>
													<div class="modal-body row">
														<div role="tabpanel">
												<ul class="nav nav-tabs nav-justified" role="tablist">
													<li role="presentation" class="active">
														<a href="#tab_edit_1<?php echo $key?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Infomations") ?></a>
													</li>
													<li role="presentation">
														<a href="#tab_edit2<?php echo $key?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Billing Address"); ?></a>
													</li>
													<li role="presentation">
														<a href="#tab_edit3<?php echo $key?>" class="bold" role="tab" data-toggle="tab"><?php echo __("Shipping Address"); ?></a>
													</li>
												</ul>
												<!-- Tab panes -->
													<div class="tab-content">
														<div role="tabpanel" class="tab-pane active fade in" id="tab_edit_1<?php echo $key?>">
															<?= $this->Form->create(NULL,['url'=>['controller'=>'users','action'=>'edit',$user->id]]); ?>
															<?= $this->Form->input('id',array('value' => $user->id,'class'=>'hidden','label' => false)); ?>
															<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
																<?= $this->Form->input('username',['class' => 'username','value' => $user->username]); ?>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
																<?= $this->Form->input('fullname',['class' => 'fullname','value' => $user->fullname]); ?>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
																<?= $this->Form->input('email',['class' => 'email','value' => $user->email]); ?>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
																<?= $this->Form->input('address',['class' => 'address','value' => $user->address]); ?>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
																<?= $this->Form->input('tel',['class' => 'tel','value' => $user->tel]); ?>
															</div>
															<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
																<?= $this->Form->input('date_of_birth',['type' => 'text','class' => 'datetimepicker','data-date-format'=>'YYYY-MM-DD','value' => date('Y-m-d', strtotime($user->date_of_birth))]); ?>
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
																<?= $this->Form->input('group_id',['default'=>$user->group_id]); ?>
															</div>
															 <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 fx-user-actived">
																<?= $this->Form->input('actived',['checked'=>$user->actived]); ?>
															</div>
															<div class="clearfix"></div>
														</div>
														<div role="tabpanel" class="tab-pane fade" id="tab_edit2<?php echo $key?>">
															2
														</div>
														<div role="tabpanel" class="tab-pane fade" id="tab_edit3<?php echo $key?>">
															3
														</div>
													</div>
												</div>
													</div>
													<div class="modal-footer">
														<?= $this->Form->button(__('Submit'),['class' => 'btn btn-success']) ?>
														<?= $this->Form->end() ?>
													</div>
												</div>
											</div>
									</div>  
								<!-- End -->
							<?php endforeach; ?>
						</tbody>
				   </table>  
				</div>
			</div>
		</div>
	</div>
</div>

