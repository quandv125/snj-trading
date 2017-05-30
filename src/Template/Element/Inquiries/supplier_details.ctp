
<div class="panel-heading clearfix" id="inqSuppliers" count="<?= $count ?>" val="<?= $inqSuppliers->id?>">
	Suppliers: <?= $inqSuppliers->supplier['name'] ?>
</div> <!-- panel-heading -->
<div class="panel-body "> 
	<div role="tabpanel">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" id="presentation1" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
			<li role="presentation" id="presentation2"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Inquiries"); ?></a></li>
		</ul>
		<div class="tab-content tab-content-lx">
			<div role="tabpanel" class="tab-pane active fade in" id="tab1">
				<?= $this->Form->create(null, ['id' => 'SuppsInfo']); ?>
				<?= $this->Form->input('id',['class'=>'hidden','label'=>false,'value' => $inqSuppliers->id]) ?>
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<span class="col-md-6"><?= $this->Form->input('created',['disabled','label'=>'Inquiry Date','value'=>$inqSuppliers->inquiry['created']]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('supplier_ref',['label' => 'Suppliers Ref','value' => $inqSuppliers->supplier_ref]) ?></span>
					<span class="col-md-6" ><?= $this->Form->input('total',['class'=>'supps-total-'.$inqSuppliers->id,'value' => number_format($total, 2)]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('Subject',['value'=>'Spare Part']) ?></span>
					<span class="col-md-6"><?= $this->Form->input('currency',['label'=>'Currency','options' => CURR ,'value' => $inqSuppliers->currency]) ?></span>
				</div>
				<div class="col-md-5">
					<span class="col-md-6"><?= $this->Form->input('delivery_terms',['type'=>'textarea','value' => $inqSuppliers->delivery_terms]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('payment_terms',['type'=>'textarea','value' => $inqSuppliers->payment_terms]) ?></span>
					<span class="col-md-12"><?= $this->Form->input('remark',['label' => 'Remark from supplier','type'=>'textarea','value' => $inqSuppliers->remark]) ?></span>
				</div>
				<div class="col-md-1"></div>
				<div class="clearfix"> </div>
				<?= $this->Form->button("Update",['class'=>'btn btn-success float-right margin-right15']) ?>
				<div class="clearfix"></div>
				<?= $this->Form->end(); ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<?php echo $this->Html->tag('span', __('Choose All'),['class'=>'btn btn-success', 'id'=>'choose-all-inquiries' ,'inquiry'=>$inqSuppliers->inquiry['id'],'supplier'=>$inqSuppliers->id]);   ?>
						</div>
						<div class="col-lg-3 col-md-3"></div>
						<div class="col-lg-6"> 
							<label class="margin-left15"><b>Main</b></label>
							<?= $this->Form->create(NULL, ['id' => 'form-choose-main','supplier'=>$inqSuppliers->id,'inquiry'=>$inqSuppliers->inquiry['id']]); ?>
							<span class="col-md-9"><?= $this->Form->input('main',['label'=>false, 'options' => $main_id]) ?></span>
							<span class="col-md-2"><?= $this->Form->button("Submit",['class'=>'btn btn-success float-right']) ?></span>
							<?= $this->Form->end(); ?>
							<div class="clearfix"></div>
							<label class="margin-left15"><b>S.Number</b></label>
							<?= $this->Form->create(NULL, ['id' => 'form-choose-number','supplier'=>$inqSuppliers->id,'inquiry'=>$inqSuppliers->inquiry['id']]); ?>
							<div class="col-md-9"><?= $this->Form->input('num',['label'=>false,'placeholder'=>" Number"]) ?></div>
							<div class="col-md-2"><?= $this->Form->button("Submit",['class'=>'btn btn-success float-right']) ?></div>
							<?= $this->Form->end(); ?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="divider10 clearfix"></div><br/>
			<?php if (!empty($inqSuppliers->inquirie_supplier_products)): ?>
				<div id="grid" data-room='<?= ($data);?>'></div>
			<?php endif ?>
		</div>
	</div>
	
</div>