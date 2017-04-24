<div class="panel-heading clearfix" id="inqSuppliers" val="<?= $inqSuppliers->id?>">
	Suppliers: <?= $inqSuppliers->supplier['name'] ?>
</div> <!-- panel-heading -->
<div class="panel-body "> 
	<div role="tabpanel">
				
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab"><?= __("Infomations") ?></a></li>
			<li role="presentation"><a href="#tab2" role="tab" data-toggle="tab"><?= __("Inquiries"); ?></a></li>
			<!-- <li role="presentation"><a href="#tab3" role="tab" data-toggle="tab"><?= __("Items(").$count.")"; ?></a></li> -->
		</ul>
		
		<div class="tab-content tab-content-lx">
			<div role="tabpanel" class="tab-pane active fade in" id="tab1">
				<?= $this->Form->create(); ?>
				<div class="col-md-6">
					<span class="col-md-6"><?= $this->Form->input('created',['disabled','label'=>'Inquiry Date','value'=>$inqSuppliers->inquiry['created']]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('user',['label'=>'PIC','value'=>$inqSuppliers->user['username']]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('imo_no',['label'=>'IMO NO','disabled','value'=>$inqSuppliers->inquiry['imo_no']]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('hull_no',['disabled','value'=>$inqSuppliers->inquiry['hull_no']]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('vessel',['label'=>'Vessel','disabled','value'=>$inqSuppliers->inquiry['vessel']]) ?></span>
				</div>
				<div class="col-md-6">
					<span class="col-md-6"><?= $this->Form->input('Suppliers',['value'=>$inqSuppliers->supplier['name']]) ?></span>
					<span class="col-md-6"><?= $this->Form->input('Suppliers Pic') ?></span>
					<span class="col-md-6"><?= $this->Form->input('Subject',['value'=>'Spare Part']) ?></span>
					<span class="col-md-12"><?= $this->Form->input('remark',['type'=>'textarea']) ?></span>
				</div>
				
				<div class="clearfix"> </div>
				<?= $this->Form->button("Update",['class'=>'btn btn-primary float-right margin-right15']) ?>
				<div class="clearfix"></div>
				<?= $this->Form->end(); ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="tab2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12"><?php echo $this->Html->link('Choose All',['controller' =>'inquiries','action' =>'ChooseAll',$inqSuppliers->inquiry['id'],$inqSuppliers->id],['class'=>'btn btn-success ','escape' => false]) ?> </div>
						<div class="col-lg-3 col-md-3"></div>
						<div class="col-lg-6"> 

							<label class="margin-left15"><b>Main</b></label>

							<?= $this->Form->create(null, ['url' => [ 'action' => 'AddSupProd',  $inqSuppliers->id, $inqSuppliers->inquiry['id']]],['class'=>'float-left margin-right15']); ?>
							<span class="col-md-9"><?= $this->Form->input('main',['label'=>false, 'options' => $main_id]) ?></span>
							<span class="col-md-2"><?= $this->Form->button("Submit",['class'=>'btn btn-success float-right']) ?></span>
							<?= $this->Form->end(); ?>
							<div class="clearfix"></div>
							<label class="margin-left15"><b>S.Number</b></label>
							<?= $this->Form->create(null, ['url' => [ 'action' => 'AddSupProd',  $inqSuppliers->id, $inqSuppliers->inquiry['id']]]); ?>
							<div class="col-md-9"><?= $this->Form->input('num',['label'=>false,'placeholder'=>" Number"]) ?></div>
							<div class="col-md-2"><?= $this->Form->button("Submit",['class'=>'btn btn-success float-right']) ?></div>
							<?= $this->Form->end(); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- <div role="tabpanel" class="tab-pane fade" id="tab3">
			
				
			</div> -->
			<div class="divider10 clearfix"></div><br/>
			<?php if (!empty($inqSuppliers->inquirie_supplier_products)): ?>
				<div id="grid" data-room='<?= ($data);?>'></div>
			<?php endif ?>
		</div>
	</div>
	
</div>