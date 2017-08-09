
<div class="row" id="inquiry" value="<?= $inquiry->id;?>">
	<div class=" panel panel-white">
		<div class="panel-body">
		<?php if ($inquiry->type == 1): ?>
			<?php echo $this->Html->link('Next Stage',['controller' =>'inquiries','action' =>'InquiriesSuppliers', $inquiry->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		<?php else: ?>
			<?php echo $this->Html->link('Next Stage',['controller' =>'inquiries','action' =>'quotations', $inquiry->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		<?php endif ?>
		<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'inquiries'],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
					<!-- <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"> <?= __("Price"); ?></a></li> -->
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tab-content-lx">
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
						<div class="panel-body">
							<?= $this->Form->create(null, ['id' => 'form-inquiries-info']); ?>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiry->id) ?>">
								<div class="col-md-6">
									<?php $date = new DateTime($inquiry->created); ?>
									<?= $this->Form->input('created',['class'=>'created onlydate2','label' => 'Inquiry date','value' => $date->format('Y-m-d')]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('pic_id',['label' => 'PIC','options' => $user_id,'default'=>$inquiry->pic_id]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('our_ref',['label' => 'Our REF','disabled','value' => $inquiry->id]) ?>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-6">
									<div class="form-group text">
										<label class="control-label" for="created">Files:</label><div class="clearfix"></div>
										<div class="file-attachment margin-left15">
											<?php if (isset($inquiry->attachments)): ?>
											<table class="table">
												<?php foreach ($inquiry->attachments as $key => $attachment): ?>
												<tr id="attachments-<?= $attachment->id;?>">
													<td><?php echo $this->Html->link(basename($attachment->path),['controller'=>'inquiries','action'=>'download',$attachment->id]) ?></td>
													<td>
														<span class="cursor-point remove-file-att" id="<?= $attachment->id;?>">
															<i class="fa fa-trash-o"></i>
														</span>
													</td>
												</tr>
												<?php endforeach ?>
											</table>
											<?php endif ?>
										</div>
									</div>								
								</div>
							</div>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiry->id) ?>">
								<?= $this->Form->input('id',['class'=>'hidden','label' => false, 'value' => $inquiry->id]) ?>
								<?= $this->Form->input('status',['class'=>'hidden','label' => false, 'value' => $inquiry->status]) ?>
								<div class="col-md-6">
									<?= $this->Form->input('username',['label'=>'Customer PIC','class'=>'username','value' => $inquiry->user['username']]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('username',['label'=>'Customer Name','class'=>'username','value' => $inquiry->user['fullname']]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('ref',['class'=>'ref','label'=>'Cus Ref', 'value' => $inquiry->ref]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('vessel',['class'=>'vessel','label' => 'Vessel Name', 'value' => $inquiry->vessel]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('subject',['class'=>'subject','label'=>'Subject','value' => 'Spare Part']) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('imo_no',['class'=>'imo_no', 'label' => 'IMO No','value' => $inquiry->imo_no]) ?>
								</div>
								
								<div class="col-md-6">
									<?= $this->Form->input('hull_no',['class'=>'hull_no', 'label' => 'HULL No','value' => $inquiry->hull_no]) ?>
								</div>
								<div class="col-md-12">
									<?= $this->Form->input('description',['type'=>'textarea','class'=>'description','label' => 'Remark','value'=>$inquiry->description])?>
								</div>
							</div>
						</div>
						<div class="col-md-12"><?= $this->Form->button('Update',['class'=>'btn btn-primary float-right margin-top10']); ?></div>
						<?= $this->Form->end(); ?>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div><br>
				<?php if (!empty($inquiry->inquirie_products)): ?>
					<div id="grid" inquiry_id="<?php echo $inquiry->id ?>" data-room='<?= ($data);?>'></div>
				<?php endif; ?>
			</div>
		</div>
		
	</div><!-- panel panel-white -->
</div> <!-- row -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-center">
        <div class="modal-content" style=" margin-top: 50px; ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Extra") ?></h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->input('code',['id' => 'supplier-code']);?> 
                <?= $this->Form->input('name',['id' => 'supplier-name']);?> 
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-right" id="btn-add-supplier">Submit</button>
            </div>
        </div>
    </div>
</div>  <!-- End -->