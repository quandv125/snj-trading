
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
				Quotation
				<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'comparing',$inquiry->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
					
		</div> <!-- panel-heading -->
		<div class="panel-body"> 
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
					<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Price"); ?></a></li>
					
				</ul>
				<div class="tab-content tab-content-lx">
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
						<div class="panel-body">
							
							<div class="col-md-6 item-unavailable" id="<?= h($inquiry->id) ?>">
								<div class="col-md-12">
									<?= $this->Form->input('pic',['class'=>'our_ref','label' => 'PIC','options' => $user_id]) ?>
								</div>
								<div class="col-md-12">
									<?= $this->Form->input('our_ref',['class'=>'our_ref','label' => 'Our REF','value' => $inquiry->id]) ?>
								</div>
								
								
								<div class="col-md-12">
									<?php $date = new DateTime($inquiry->created); ?>
									<?= $this->Form->input('created',['class'=>'created onlydate2','label' => 'Inquiry date','value' => $date->format('Y-m-d')]) ?>
								</div>
								
							</div>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiry->id) ?>">
								<?= $this->Form->create(null, ['url' => [ 'action' => 'edit',  $inquiry->id]]); ?>
								<?= $this->Form->input('id',['class'=>'hidden','label' => false, 'value' => $inquiry->id]) ?>
								<?= $this->Form->input('status',['class'=>'hidden','label' => false, 'value' => $inquiry->status]) ?>
								<div class="col-md-6">
									<?= $this->Form->input('username',['label'=>'Customer PIC','class'=>'username','value' => $inquiry->user['username']]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('username',['label'=>'Customer Name','class'=>'username']) ?>
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
						<div class="col-md-12">
						<!-- <?= $this->Form->button('submit',['class'=>'btn btn-primary float-right margin-top10']); ?></div> -->
						<?= $this->Form->end(); ?>
						<div class="clearfix"></div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab2">
						
					</div>
					
				</div>
			</div>
		</div> <!-- panel-body -->
		<div class="panel-body"> 
		</div>
	</div><!-- panel panel-white -->

	<div class="panel panel-white">
		<div class="panel-body"> 
			<?php if (!empty($inquiries->inquirie_products)): ?>
				<div id="grid" data-room='<?= ($data);?>'></div>
			<?php endif ?>
		</div>
	</div> <!-- panel-body -->
</div> <!-- row -->