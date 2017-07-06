
<div id="inqSuppliers" val=""></div> <!-- panel-heading -->
<div class="panel-body "> 
	<div role="tabpanel">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" id="presentation1" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
			<li role="presentation" id="presentation2"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Inquiries"); ?></a></li>
		</ul>
		<div class="tab-content tab-content-lx">
			<div role="tabpanel" class="tab-pane active fade in" id="tab1">
				<?= $this->Form->create(null, ['id' => 'SuppsInfo']); ?>
				<?= $this->Form->input('id',['class'=>'hidden','label'=>false,'value' => '']) ?>
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<span class="col-md-6"><?= $this->Form->input('created',['disabled','label'=>'Inquiry Date','value'=> '']) ?></span>
					<span class="col-md-6"><?= $this->Form->input('supplier_ref',['label' => 'Suppliers Ref','value' => '']) ?></span>
					<span class="col-md-6"><?= $this->Form->input('total',['class'=>'supps-total-','value' => '']) ?></span>
					<span class="col-md-6"><?= $this->Form->input('Subject',['value'=>'Spare Part']) ?></span>
					<span class="col-md-6"><?= $this->Form->input('currency',['label'=>'Currency','options' => CURR ,'value' => '']) ?></span>
				</div>
				<div class="col-md-5">
					<span class="col-md-6"><?= $this->Form->input('delivery_terms',['type'=>'textarea','value' => '']) ?></span>
					<span class="col-md-6"><?= $this->Form->input('payment_terms',['type'=>'textarea','value' => '']) ?></span>
					<span class="col-md-12"><?= $this->Form->input('remark',['label' => 'Remark from supplier','type'=>'textarea','value' => '']) ?></span>
				</div>
				<div class="col-md-1"></div>
				<div class="clearfix"> </div>
				<?= $this->Form->button("Update",['class'=>'btn btn-success float-right margin-right15']) ?>
				<div class="clearfix"></div>
				<?= $this->Form->end(); ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab2">
				
			</div>
			
			<div class="divider10 clearfix"></div><br/>
			
				<div id="grid" data-room='<?= ($data);?>'></div>
			
		</div>
	</div>
	
</div>