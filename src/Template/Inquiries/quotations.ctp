<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			Quotation
			<?php echo $this->Html->link('Next.Stage',['controller' =>'inquiries','action' =>'OrderAcknowledgement',$inquiries->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
			<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'comparing',$inquiries->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		</div> <!-- panel-heading -->
		<div class="panel-body"> 
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Terms") ?></a></li>
					<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Infomations"); ?></a></li> 
					<li role="presentation"><a href="#tab3" role="tab" data-toggle="tab"><?= __("Price"); ?></a></li>
				</ul>
				<div class="tab-content tab-content-lx">
					
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
						<div class="panel-body">
							<?= $this->Form->create(null, ['id' => 'form-quotation']); ?>
							<?= $this->Form->input('id',['class'=>'hidden','label'=>false,'value' => $inquiries->id]) ?>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiries->id) ?>">
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">inquiries date</label></span>
									<span class="col-md-5">
										<?php $date = new DateTime($inquiries->created); ?>
										<?= $this->Form->input('created',['class'=>'created onlydate2','disabled','label' => false,'value' => $date->format('Y-m-d')]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Scope of Supply</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('scope_of_supply',['value'=> $inquiries->scope_of_supply ,'label' => false]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Delivery Terms</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('delivery_terms',['value'=> $inquiries->delivery_terms ,'label' => false]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Terms of Payment</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('terms_of_payment',['value'=> $inquiries->terms_of_payment ,'label' => false]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Others</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('others',['type'=>'textarea','value'=>$inquiries->others,'label' => false]) ?>
									</span>
								</div>
							</div>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiries->id) ?>">
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Quotation date</label></span>
									<span class="col-md-5">
										<?php $date = new DateTime($inquiries->quotation_date); ?>
										<?= $this->Form->input('quotation_date',['class'=>'created','id'=>'datepicker','value'=>$inquiries->quotation_date,'label' => false,'value' => $date->format('Y-m-d')]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Delivery Time</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('delivery_time',['value'=> $inquiries->delivery_time ,'label' => false]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Validity of the offer</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('validity_of_the_offer',['value'=> $inquiries->validity_of_the_offer ,'label' => false]) ?>
									</span>
								</div>
								<div class="clearfix divider10"></div>
								<div class="form-groups">
									<span class="col-md-3 margin-top5"><label class="control-label float-right">Remark</label></span>
									<span class="col-md-9">
										<?= $this->Form->input('remark',['type'=>'textarea','value' => $inquiries->remark,'label' => false]) ?>
									</span>
								</div>
							</div>
							<div class="clearfix"></div>
							<?= $this->Form->button("Update",['class'=>'btn btn-success float-right']) ?>
						</div>
						<?= $this->Form->end(); ?>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab2">
						<div class="panel-body">
							<div class="col-md-6 item-unavailable" id="<?= h($inquiries->id) ?>">
								<div class="col-md-12">
									<?= $this->Form->input('our_ref',['class'=>'our_ref','label' => 'Our REF','value' => $inquiries->id]) ?>
								</div>
								<div class="col-md-12">
									<?php $date = new DateTime($inquiries->created); ?>
									<?= $this->Form->input('created',['class'=>'created onlydate2','label' => 'inquiries date','value' => $date->format('Y-m-d')]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('subject',['class'=>'subject','label'=>'Subject','value' => 'Spare Part']) ?>
								</div>							
							</div>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiries->id) ?>">
								<?= $this->Form->create(null, ['url' => [ 'action' => 'edit',  $inquiries->id]]); ?>
								<?= $this->Form->input('id',['class'=>'hidden','label' => false, 'value' => $inquiries->id]) ?>
								<?= $this->Form->input('status',['class'=>'hidden','label' => false, 'value' => $inquiries->status]) ?>
								<div class="col-md-6">
									<?= $this->Form->input('customer_pic',['label'=>'Customer PIC','class'=>'username','value' => $inquiries->user['username']]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('customer_name',['label'=>'Customer Name','class'=>'username','value' => $inquiries->user['fullname']]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('ref',['class'=>'ref','label'=>'Cus Ref', 'value' => $inquiries->ref]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('vessel',['class'=>'vessel','label' => 'Vessel Name', 'value' => $inquiries->vessel]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('imo_no',['class'=>'imo_no', 'label' => 'IMO No','value' => $inquiries->imo_no]) ?>
								</div>
								<div class="col-md-6">
									<?= $this->Form->input('hull_no',['class'=>'hull_no', 'label' => 'HULL No','value' => $inquiries->hull_no]) ?>
								</div>
								<div class="col-md-12">
									<?= $this->Form->input('description',['type'=>'textarea','class'=>'description','label' => 'Remark','value'=>$inquiries->description])?>
									<?= $this->Form->end(); ?>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab3">
						<div class="panel-body">
							<?php echo $this->element('Inquiries/cost_price'); ?>
						</div>
					</div>
					
				</div>
			</div>
		</div> <!-- panel-body -->
		<div class="panel-body"> 
		</div>
	</div><!-- panel panel-white -->
	<div class="panel panel-white">
		<div class="panel-body"> 

			<div id="grid_quotation" inquiry_id="<?= $inquiries->id?>" data-type="<?= $inquiries->type?>" data-room='<?= ($data);?>'></div>
			
		</div>
	</div> <!-- panel-body -->
</div> <!-- row -->