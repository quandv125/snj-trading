
<div class="row">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			O.A
			<?php echo $this->Html->link('Next.Stage',['controller' =>'inquiries','action' =>'PurchaseOrder',$inquiries->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
			<?php echo $this->Html->link('Pre.Stage',['controller' =>'inquiries','action' =>'quotations',$inquiries->id],['class'=>'btn btn-primary float-right margin-right10','escape' => false]) ?>
		</div> <!-- panel-heading -->
		<div class="panel-body"> 
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
					<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Price"); ?></a></li>
				</ul>
				<div class="tab-content tab-content-lx">
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
					<?php echo $this->Form->create(null); ?>
						<div class="panel-body">
						<div class="col-sm-6">
							<div class="col-sm-6">
								<?php echo $this->Form->input('delivery_time',['value'=>$inquiries->delivery_time]); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('our_pic',['value'=>$inquiries->Pic['fullname']]); ?>
							</div>
							<div class="col-sm-6">
								<?php $order_date = new DateTime($inquiries->created); ?>
								<?php echo $this->Form->input('order_date',['value'=>$order_date->format('Y-m-d'),'class'=>'onlydate2']); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('terms_of_payment',['value'=>$inquiries->terms_of_payment]); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('oa_date',['value'=>'','label'=>'OA Date','class'=>'onlydate2']); ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-6">
								<?php echo $this->Form->input('ref_no',['value'=>$inquiries->ref]); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('attn',['value'=>$inquiries->user['fullname'],'label'=>'ATTN',]); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('subject',['value'=>'Spare Part']); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('delivery_term',['value'=>$inquiries->delivery_terms]); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('vessel',['value'=>$inquiries->vessel,'label'=>'Vessel Name']); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Form->input('order_no',['value'=>'']); ?>
							</div>
						</div>
						<div class="divider10 clearfix"></div>
						<?php echo $this->Form->button('Update',['class'=>'btn btn-success float-right']) ?>
						</div>
					<?php echo $this->Form->end(); ?>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="tab2">
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
			<div id="grid_quotation"  data-room='<?php echo $data; ?>'></div>
		</div>
	</div> <!-- panel-body -->
</div> <!-- row -->