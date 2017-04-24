
<div class="row" id="inquiry" value="<?= $inquiry->id;?>">
	<div class=" panel panel-white">
		<div class="panel-body">
		<?php echo $this->Html->link('Next Stage',['controller' =>'inquiries','action' =>'InquiriesSuppliers', $inquiry->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'inquiries'],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
					<!-- <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Price"); ?></a></li> -->
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tab-content-lx">
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
						<div class="panel-body">
							<?= $this->Form->create(null, ['url' => [ 'action' => 'edit',  $inquiry->id]]); ?>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiry->id) ?>">
								<div class="col-md-12">
									<?= $this->Form->input('pic_id',['class'=>'our_ref','label' => 'PIC','options' => $user_id,'default'=>$inquiry->pic_id]) ?>
								</div>
								<div class="col-md-12">
									<?= $this->Form->input('our_ref',['class'=>'our_ref','label' => 'Our REF','disabled','value' => $inquiry->id]) ?>
								</div>
								<div class="col-md-12">
									<?php $date = new DateTime($inquiry->created); ?>
									<?= $this->Form->input('created',['class'=>'created onlydate2','label' => 'Inquiry date','value' => $date->format('Y-m-d')]) ?>
								</div>
							</div>
							<div class="col-md-6 item-unavailable" id="<?= h($inquiry->id) ?>">
								
								<?= $this->Form->input('id',['class'=>'hidden','label' => false, 'value' => $inquiry->id]) ?>
								<?= $this->Form->input('status',['class'=>'hidden','label' => false, 'value' => $inquiry->status]) ?>
								<div class="col-md-6">
									<?= $this->Form->input('username',['label'=>'Customer PIC','class'=>'username','value' => $inquiry->user['fullname']]) ?>
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
						<div class="col-md-12"><?= $this->Form->button('submit',['class'=>'btn btn-primary float-right margin-top10']); ?></div>
						<?= $this->Form->end(); ?>
						<div class="clearfix"></div>
					</div>
					<!-- <div role="tabpanel" class="tab-pane fade" id="tab2">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Commission</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Percent</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">%</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'class' => 'percent-commission-lx', 'value' => 0]) ?>
									</div>
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'class' => 'price-commission-lx', 'value' => 0 ]);?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Discount</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Percent</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">%</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'class' => 'percent-discount-lx', 'value' => 0]) ?>
									</div>
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'class' => 'price-discount-lx', 'value' => 0 ]);?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Extra</span><button class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
								<div class="clearfix"></div>
								<div class="line"></div>
								<div class="panel-body2">
									
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Profit</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Percent</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">%</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'class' => 'input-xps','value' => 0]) ?>
									</div>
									
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'class' => 'input-xps','value' => 0 ]);?>
									</div>										
									<label class="control-label" for="total">Total</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'class' => 'input-xps','value' => 0]) ?>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Commission</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'disabled','class' => 'total-price','value'=>$total ]);?>
									</div>
									
									<label class="control-label" for="total">Percent</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">%</span>
										</span>
										<?= $this->Form->input('percent',['type'=>'number','max'=>100,'min'=>0,'label'=>false,'class'=>'input-xps percent-profit-lx']) ?>
									</div>
									
									<label class="control-label" for="total">Total</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'class' => 'grand-total']) ?>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Discount</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'disabled','class' => 'total-price','value'=>$total ]);?>
									</div>
									
									<label class="control-label" for="total">Percent</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">%</span>
										</span>
										<?= $this->Form->input('percent',['type'=>'number','max'=>100,'min'=>0,'label'=>false,'class'=>'input-xps percent-profit-lx']) ?>
									</div>
									
									<label class="control-label" for="total">Total</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'class' => 'grand-total']) ?>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Profit</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Percent</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">%</span>
										</span>
										<?= $this->Form->input('percent',['type'=>'number','max'=>100,'min'=>0,'value'=>0,'label'=>false,'class'=>'input-xps percent-profit-lx']) ?>
									</div>
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('text',['label'=>false,'value'=>0,'class' => 'price-profit-lx']) ?>
									</div>
								</div>
							</div>
						</div> 
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="panel-head panel-head-lx">
								<span class="title-panel">Grand total</span><div class="line"></div>
								<div class="panel-body2">
									<label class="control-label" for="total">Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'disabled','class' => 'grand-total','value'=>$total ]);?>
									</div>
									<label class="control-label" for="total">Final Price</label>
									<div class="input-group m-b-sm">
										<span class="input-group-btn">
											<span class="btn btn-default lbel-input">$</span>
										</span>
										<?= $this->Form->input('total',['label' => false,'disabled','class' => 'final-price','value'=> $total ]);?>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button class="btn btn-primary float-right margin-right15">Submit</button>
						<div class="clearfix"></div>
					</div> -->
				</div>
				<div class="clearfix"></div><br>
				<?php if (!empty($inquiry->inquirie_products)): ?>
					<div id="grid" data-room='<?= ($data);?>'></div>
				<?php endif; ?>
			</div>
		</div>
		
	</div><!-- panel panel-white -->
</div> <!-- row -->
<!--  -->
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